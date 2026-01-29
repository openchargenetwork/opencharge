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
            'icon'=>'/logos/Alchemy.avif',
            'profile' => 'TrustVerify is a Global KYC verification provider',
        ]);

        $kycProvider2 = Ocid::factory()->kycProvider()->create([
            'ocid' => '737',
            'name' => 'SecureID',
            'icon'=>'/logos/Blast.avif',
            'profile' => 'One ID now linked to your OCID - Enterprise identity verification',
        ]);

        $kycProvider3 = Ocid::factory()->kycProvider()->create([
            'ocid' => '2836',
            'name' => 'VerifyNow',
            'icon'=>'/logos/Coinflow.avif',
            'profile' => 'Fastest KYC Process, complete KYC in under one minute - Instant KYC verification service',
        ]);

        // Create gateways
        $merchantGateway = Ocid::factory()->merchantGateway()->create([
            'ocid' => '100',
            'name' => 'PayFlow Gateway',
            'icon'=>'/logos/Octane.avif',
            'profile' => 'Merhants love us, PayFlow the number one Hosted checkout for online merchants',
        ]);

        $paymentGateway = Ocid::factory()->paymentGateway()->create([
            'ocid' => '101',
            'name' => 'QuickPay Wallet',
            'icon'=>'/logos/Pantera20Capital.avif',
            'profile' => 'Fast and secure payment gateway for all your transaction needs',
        ]);

        $paymentGateway2 = Ocid::factory()->paymentGateway()->create([
            'ocid' => '102',
            'name' => 'CryptoFlow',
            'icon'=>'/logos/Spearbit.avif',
            'profile' => 'We are proud to join the OCN. Cryptocurrency payment and settlement at your fingertips',
        ]);

        // Create merchants
        $merchant = Ocid::factory()->merchant()->create([
            'ocid' => '1001',
            'name' => 'Coffee Shop',
            'icon'=>'/logos/Magic.avif',
            'profile' => 'Best coffer in NewYork. Enjoy a coffee using over 12 Opencharge payment gateways',
        ]);

        $merchant2 = Ocid::factory()->merchant()->create([
            'ocid' => '1002',
            'name' => 'TechStore Online',
            'icon'=>'/logos/SynFutures.avif',
            'profile' => 'Shop online for the best Electronics. OCN compliant retailer with global shipping',
        ]);

        // Create end users
        $enduser = Ocid::factory()->enduser()->create([
            'ocid' => '5001',
            'name' => 'Zomboko',
            'icon'=>'/logos/Apillon20Embedded20Wallet20Service.avif',
            'profile' => 'My name is Zomboko, Glad to meet you all. Iam a full stack opencharge api developer',
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
