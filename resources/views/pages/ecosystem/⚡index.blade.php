<?php

use App\Models\Ocid;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    #[Url]
    public string $search = '';

    #[Url]
    public string $type = '';

    #[Url]
    public string $capability = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedType(): void
    {
        $this->resetPage();
    }

    public function updatedCapability(): void
    {
        $this->resetPage();
    }

    public function getOcidsProperty()
    {
        return Ocid::query()
            ->when($this->search, fn (Builder $q) => $q->search($this->search))
            ->when($this->type, fn (Builder $q) => $q->ofType($this->type))
            ->when($this->capability, fn (Builder $q) => $q->withCapability($this->capability))
            ->with(['kycProviders', 'acceptedPartners'])
            ->latest()
            ->paginate(12);
    }

    public function getTypesProperty(): array
    {
        return [
            'merchant' => 'Merchant',
            'merchant-gateway' => 'Merchant Gateway',
            'payment-gateway' => 'Payment Gateway',
            'kyc-provider' => 'KYC Provider',
            'enduser' => 'End User',
        ];
    }

    public function getCapabilitiesProperty(): array
    {
        return Ocid::query()
            ->whereNotNull('config')
            ->get()
            ->pluck('capabilities')
            ->flatten()
            ->unique()
            ->sort()
            ->values()
            ->all();
    }

    public function getTagsProperty(): array
    {
        return [
            "Merchant",
            "Vending Machine",
            "Auto Parking Meters",
            "Auto Carwash",
            "Ev Charger",
            "Restaurant",
            "Delivery Service",
            "Power Bank Rental",
            "Money Transfer",
            "Currency Exchanger",
            "OCN Onboarding",
            "Payment Wallet",
            "Cash Agents App",
            "Metadata Indexing and api",
            "Orders cdn and api",
            "KYC Provider",
            "Settlement providers"
        ];
    }
}; ?>

<div class="w-full my-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <flux:heading size="xl">{{ __('Opencharge Ecosystem') }}</flux:heading>
        <flux:subheading>{{ __('See apps implementing the opencharge protocol') }}</flux:subheading>
    </div>
     <div class="flex items-center justify-end">
         
            <div class="flex items-center gap-3 flex-1 py-3 my-3 border-b">
                <x-flux::input 
                wire:model.live.debounce.300ms="search"
                placeholder="{{ __('Search by name or profile...') }}"
                    class:input="!shadow-none !rounded-full !border-zinc-200/60" class="sm:max-w-sm"
                    iconLeading="magnifying-glass" />
                <x-button.outline variant="flat" class="text-xs" size="sm">All</x-button.outline>
                <x-button.outline variant="secondary" class="text-xs" size="sm">Merchant</x-button.outline>
                <x-button.outline variant="secondary" class="text-xs" size="sm">Merchant Gateway</x-button.outline>
                <x-button.outline variant="secondary" class="text-xs" size="sm">Payment Gateway</x-button.outline>
                <x-button.outline variant="secondary" class="text-xs" size="sm">KYC Provider</x-button.outline>
                <x-button.outline variant="secondary" class="text-xs" size="sm">End User</x-button.outline>
            </div>
        </div>
        <div class="flex items-center justify-end">
         
            <div class="flex items-center gap-3 flex-1 flex-wrap mb-6">
                <x-button.outline wire:click="$set('capability', '')" variant="flat" class="text-xs" size="xs">All Tags</x-button.outline>
                @foreach( $this->tags as $cap)
                <x-button.outline wire:click="$set('capability', '{{ $cap }}')" variant="secondary" class="text-xs" size="xs">{{ $cap }}</x-button.outline>
                @endforeach
            </div>
        </div>


    

    @if ($this->ocids->isEmpty())
        <div class="flex flex-col items-center justify-center rounded-xl border border-dashed border-zinc-300 py-16 dark:border-zinc-700">
            <flux:icon.users class="mb-4 size-12 text-zinc-400" />
            <flux:heading size="lg">{{ __('No OCIDs found') }}</flux:heading>
            <flux:subheading>{{ __('Try adjusting your search or filters') }}</flux:subheading>
        </div>
    @else
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($this->ocids as $ocid)
                <x-ecosystem.ocid-card :ocid="$ocid" wire:key="ocid-{{ $ocid->id }}" />
            @endforeach
        </div>

        <div class="mt-8">
            {{ $this->ocids->links() }}
        </div>
    @endif
</div>
