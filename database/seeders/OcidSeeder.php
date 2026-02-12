<?php

namespace Database\Seeders;

use App\Enums\OcidStatus;
use App\Enums\OcidTags;
use App\Models\Ocid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class OcidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = database_path('data/metadata-examples.json');

        if (! File::exists($jsonPath)) {
            $this->command->warn('Metadata examples file not found: '.$jsonPath);

            return;
        }

        $json = File::get($jsonPath);
        $data = json_decode($json, true);

        if (! is_array($data)) {
            $this->command->error('Invalid JSON in metadata examples file.');

            return;
        }

        $tagMap = [
            'merchant' => [OcidTags::Merchant],
            'merchant-gateway' => [OcidTags::Gateway, OcidTags::PaymentProcessing],
            'payment-gateway' => [OcidTags::Wallet, OcidTags::Gateway],
            'kyc-provider' => [OcidTags::Compliance],
            'enduser' => [OcidTags::Wallet, OcidTags::PeerToPeer],
        ];

        foreach ($data as $key => $item) {
            $type = $item['type'] ?? $key;

            $this->command->info("Seeding OCID: {$item['OCID']} - {$item['name']}");

            $tags = array_map(
                fn (OcidTags $tag) => $tag->value,
                $tagMap[$type] ?? [],
            );

            Ocid::updateOrCreate(
                ['token_id' => $item['OCID']],
                [
                    'opencharge_version' => $item['opencharge'] ?? '0.1',
                    'name' => $item['name'] ?? null,
                    'profile' => $item['profile'] ?? null,
                    'icon' => $item['icon'] ?? null,
                    'public_key' => $item['config']['publicKey'] ?? null,
                    'endpoint' => $item['config']['endpoint'] ?? null,
                    'capabilities' => $item['config']['capabilities'] ?? [],
                    'settlement_currencies' => $item['config']['settlement']['currencies'] ?? [],
                    'settlement_accepts' => $item['config']['settlement']['accepts'] ?? [],
                    'kyc' => $item['kyc'] ?? [],
                    'signature' => $item['signature'] ?? null,
                    'contact' => $item['contact'] ?? null,
                    'status' => OcidStatus::Active,
                    'valid_signature' => true,
                    'tags' => $tags,
                ]
            );
        }
    }
}
