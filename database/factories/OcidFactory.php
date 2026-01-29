<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ocid>
 */
class OcidFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = fake()->randomElement([
            'merchant',
            'merchant-gateway',
            'payment-gateway',
            'kyc-provider',
            'enduser',
        ]);

        return [
            'ocid' => (string) fake()->unique()->numberBetween(100, 9999),
            'type' => $type,
            'opencharge_version' => '0.1',
            'name' => fake()->company(),
            'profile' => fake()->sentence(),
            'icon' => fake()->optional()->imageUrl(200, 200),
            'config' => $this->configForType($type),
            'signature' => fake()->sha256(),
            'contact' => fake()->email(),
        ];
    }

    public function merchant(): static
    {
        return $this->state(fn (array $attributes): array => [
            'type' => 'merchant',
            'config' => $this->configForType('merchant'),
        ]);
    }

    public function merchantGateway(): static
    {
        return $this->state(fn (array $attributes): array => [
            'type' => 'merchant-gateway',
            'config' => $this->configForType('merchant-gateway'),
        ]);
    }

    public function paymentGateway(): static
    {
        return $this->state(fn (array $attributes): array => [
            'type' => 'payment-gateway',
            'config' => $this->configForType('payment-gateway'),
        ]);
    }

    public function kycProvider(): static
    {
        return $this->state(fn (array $attributes): array => [
            'type' => 'kyc-provider',
            'config' => $this->configForType('kyc-provider'),
        ]);
    }

    public function enduser(): static
    {
        return $this->state(fn (array $attributes): array => [
            'type' => 'enduser',
            'name' => fake()->name(),
            'profile' => fake()->optional()->sentence(),
            'config' => $this->configForType('enduser'),
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function configForType(string $type): array
    {
        $publicKey = fake()->sha256().fake()->sha256();

        $capabilities = match ($type) {
            'merchant' => ['orders.create', 'orders.status', 'transfer.webhook'],
            'merchant-gateway' => ['transfer.create', 'transfer.webhook', 'payment.create', 'payment.settle', 'verify.txid'],
            'payment-gateway' => ['checkout.create', 'orders.create.session', 'transfer.create', 'transfer.webhook'],
            'kyc-provider' => ['kyc.grant', 'kyc.validate', 'kyc.data'],
            default => [],
        };

        $config = ['publicKey' => $publicKey];

        if ($capabilities) {
            $config['capabilities'] = $capabilities;
            $config['endpoint'] = fake()->url();
        }

        if (in_array($type, ['merchant', 'merchant-gateway', 'payment-gateway'])) {
            $config['settlement'] = [
                'currencies' => fake()->randomElements(['USD', 'EUR', 'GBP', 'JPY'], fake()->numberBetween(1, 3)),
            ];
        }

        return $config;
    }
}
