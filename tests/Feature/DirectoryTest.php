<?php

namespace Tests\Feature;

use App\Models\Ocid;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DirectoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_directory_index_is_accessible_without_auth(): void
    {
        $response = $this->get(route('directory.index'));

        $response->assertStatus(200);
    }

    public function test_directory_index_displays_ocids(): void
    {
        $ocid = Ocid::factory()->merchant()->create([
            'name' => 'Test Merchant',
        ]);

        $response = $this->get(route('directory.index'));

        $response->assertStatus(200);
        $response->assertSee('Test Merchant');
    }

    public function test_directory_index_can_search_by_name(): void
    {
        Ocid::factory()->merchant()->create(['name' => 'Coffee Shop']);
        Ocid::factory()->merchant()->create(['name' => 'Tech Store']);

        Livewire::test('pages::directory.index')
            ->set('search', 'Coffee')
            ->assertSee('Coffee Shop')
            ->assertDontSee('Tech Store');
    }

    public function test_directory_index_can_filter_by_type(): void
    {
        Ocid::factory()->merchant()->create(['name' => 'Test Merchant']);
        Ocid::factory()->kycProvider()->create(['name' => 'Test KYC']);

        Livewire::test('pages::directory.index')
            ->set('type', 'merchant')
            ->assertSee('Test Merchant')
            ->assertDontSee('Test KYC');
    }

    public function test_directory_index_can_filter_by_capability(): void
    {
        Ocid::factory()->merchant()->create([
            'name' => 'Merchant With Orders',
            'config' => ['capabilities' => ['orders.create']],
        ]);
        Ocid::factory()->kycProvider()->create([
            'name' => 'TrustVerify KYC Service',
            'config' => ['capabilities' => ['kyc.grant']],
        ]);

        Livewire::test('pages::directory.index')
            ->set('capability', 'orders.create')
            ->assertSee('Merchant With Orders')
            ->assertDontSee('TrustVerify KYC Service');
    }

    public function test_directory_show_displays_ocid_details(): void
    {
        $ocid = Ocid::factory()->merchant()->create([
            'ocid' => '1234',
            'name' => 'Test Merchant',
            'profile' => 'A great merchant',
        ]);

        $response = $this->get(route('directory.show', $ocid->ocid));

        $response->assertStatus(200);
        $response->assertSee('Test Merchant');
        $response->assertSee('A great merchant');
        $response->assertSee('1234');
    }

    public function test_directory_show_displays_kyc_providers(): void
    {
        $kycProvider = Ocid::factory()->kycProvider()->create([
            'name' => 'TrustVerify',
        ]);

        $merchant = Ocid::factory()->merchant()->create([
            'ocid' => '5678',
            'name' => 'Verified Merchant',
        ]);

        $merchant->kycProviders()->attach($kycProvider->id);

        $response = $this->get(route('directory.show', $merchant->ocid));

        $response->assertStatus(200);
        $response->assertSee('TrustVerify');
    }

    public function test_directory_show_displays_accepted_partners(): void
    {
        $gateway = Ocid::factory()->paymentGateway()->create([
            'name' => 'PayFlow',
        ]);

        $merchant = Ocid::factory()->merchant()->create([
            'ocid' => '9012',
            'name' => 'Partner Merchant',
        ]);

        $merchant->acceptedPartners()->attach($gateway->id);

        $response = $this->get(route('directory.show', $merchant->ocid));

        $response->assertStatus(200);
        $response->assertSee('PayFlow');
    }

    public function test_directory_show_returns404_for_non_existent_ocid(): void
    {
        $response = $this->get(route('directory.show', 'nonexistent'));

        $response->assertStatus(404);
    }

    public function test_ocid_model_search_scope(): void
    {
        Ocid::factory()->create(['name' => 'Coffee Shop', 'profile' => 'Great coffee']);
        Ocid::factory()->create(['name' => 'Tech Store', 'profile' => 'Electronics']);

        $results = Ocid::query()->search('coffee')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Coffee Shop', $results->first()->name);
    }

    public function test_ocid_model_of_type_scope(): void
    {
        Ocid::factory()->merchant()->create();
        Ocid::factory()->kycProvider()->create();

        $merchants = Ocid::query()->ofType('merchant')->get();

        $this->assertCount(1, $merchants);
        $this->assertEquals('merchant', $merchants->first()->type);
    }

    public function test_ocid_model_with_capability_scope(): void
    {
        Ocid::factory()->create(['config' => ['capabilities' => ['orders.create']]]);
        Ocid::factory()->create(['config' => ['capabilities' => ['kyc.grant']]]);

        $results = Ocid::query()->withCapability('orders.create')->get();

        $this->assertCount(1, $results);
    }

    public function test_ocid_model_capabilities_accessor(): void
    {
        $ocid = Ocid::factory()->create([
            'config' => ['capabilities' => ['orders.create', 'orders.status']],
        ]);

        $this->assertEquals(['orders.create', 'orders.status'], $ocid->capabilities);
    }

    public function test_ocid_model_currencies_accessor(): void
    {
        $ocid = Ocid::factory()->create([
            'config' => ['settlement' => ['currencies' => ['USD', 'EUR']]],
        ]);

        $this->assertEquals(['USD', 'EUR'], $ocid->currencies);
    }

    public function test_ocid_kyc_providers_relationship(): void
    {
        $kycProvider = Ocid::factory()->kycProvider()->create();
        $merchant = Ocid::factory()->merchant()->create();

        $merchant->kycProviders()->attach($kycProvider->id);

        $this->assertCount(1, $merchant->kycProviders);
        $this->assertEquals($kycProvider->id, $merchant->kycProviders->first()->id);
    }

    public function test_ocid_accepted_partners_relationship(): void
    {
        $gateway = Ocid::factory()->paymentGateway()->create();
        $merchant = Ocid::factory()->merchant()->create();

        $merchant->acceptedPartners()->attach($gateway->id);

        $this->assertCount(1, $merchant->acceptedPartners);
        $this->assertEquals($gateway->id, $merchant->acceptedPartners->first()->id);
    }

    public function test_ocid_accepted_by_relationship(): void
    {
        $gateway = Ocid::factory()->paymentGateway()->create();
        $merchant = Ocid::factory()->merchant()->create();

        $merchant->acceptedPartners()->attach($gateway->id);

        $this->assertCount(1, $gateway->acceptedBy);
        $this->assertEquals($merchant->id, $gateway->acceptedBy->first()->id);
    }
}
