<?php

namespace Database\Seeders;

use App\Models\Ocid;
use Illuminate\Database\Seeder;

class OcidSeeder extends Seeder
{
    public function run(): void
    {
        // Create KYC providers first (they'll be referenced by others)
        $kycProvider = Ocid::factory()->kycProvider()->create([
            'ocid' => '540',
            'name' => 'TrustVerify KYC',
            'profile' => 'Global KYC verification provider',
        ]);

        $kycProvider2 = Ocid::factory()->kycProvider()->create([
            'ocid' => '737',
            'name' => 'SecureID',
            'profile' => 'Enterprise identity verification',
        ]);

        $kycProvider3 = Ocid::factory()->kycProvider()->create([
            'ocid' => '2836',
            'name' => 'VerifyNow',
            'profile' => 'Instant KYC verification service',
        ]);

        // Create gateways
        $merchantGateway = Ocid::factory()->merchantGateway()->create([
            'ocid' => '100',
            'name' => 'PayFlow Gateway',
            'profile' => 'Hosted checkout for online merchants',
        ]);

        $paymentGateway = Ocid::factory()->paymentGateway()->create([
            'ocid' => '101',
            'name' => 'QuickPay Wallet',
            'profile' => 'Mobile wallet for fast payments',
        ]);

        $paymentGateway2 = Ocid::factory()->paymentGateway()->create([
            'ocid' => '102',
            'name' => 'CryptoFlow',
            'profile' => 'Cryptocurrency payment gateway',
        ]);

        // Create merchants
        $merchant = Ocid::factory()->merchant()->create([
            'ocid' => '1001',
            'name' => 'Coffee Shop',
            'profile' => 'Local coffee shop accepting Opencharge payments',
        ]);

        $merchant2 = Ocid::factory()->merchant()->create([
            'ocid' => '1002',
            'name' => 'TechStore Online',
            'profile' => 'Electronics retailer with global shipping',
        ]);

        // Create end users
        $enduser = Ocid::factory()->enduser()->create([
            'ocid' => '5001',
            'name' => 'Zomboko',
            'profile' => 'Best superhero in the world',
        ]);

        Ocid::factory()->enduser()->count(5)->create();

        // Set up KYC relationships
        $merchantGateway->kycProviders()->attach([$kycProvider->id, $kycProvider2->id, $kycProvider3->id]);
        $paymentGateway->kycProviders()->attach([$kycProvider->id, $kycProvider2->id, $kycProvider3->id]);
        $paymentGateway2->kycProviders()->attach([$kycProvider->id]);
        $merchant->kycProviders()->attach([$kycProvider->id, $kycProvider2->id]);
        $merchant2->kycProviders()->attach([$kycProvider->id]);
        $enduser->kycProviders()->attach([$kycProvider->id]);

        // Set up accepts relationships (which gateways merchants accept)
        $merchant->acceptedPartners()->attach([$merchantGateway->id, $paymentGateway->id, $paymentGateway2->id]);
        $merchant2->acceptedPartners()->attach([$merchantGateway->id, $paymentGateway->id]);

        // Create more random OCIDs
        Ocid::factory()->merchant()->count(5)->create()->each(function (Ocid $ocid) use ($kycProvider, $merchantGateway, $paymentGateway) {
            $ocid->kycProviders()->attach($kycProvider->id);
            $ocid->acceptedPartners()->attach([$merchantGateway->id, $paymentGateway->id]);
        });

        Ocid::factory()->paymentGateway()->count(3)->create()->each(function (Ocid $ocid) use ($kycProvider) {
            $ocid->kycProviders()->attach($kycProvider->id);
        });
    }
}
