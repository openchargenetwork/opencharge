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
}; ?>

<div class="w-full my-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <flux:heading size="xl">{{ __('OCID Ecosystem') }}</flux:heading>
        <flux:subheading>{{ __('Browse registered OpenCharge identities') }}</flux:subheading>
    </div>

    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center">
        <div class="flex-1">
            <flux:input
                wire:model.live.debounce.300ms="search"
                placeholder="{{ __('Search by name or profile...') }}"
                icon="magnifying-glass"
            />
        </div>

        <div class="flex gap-4">
            <flux:select wire:model.live="type" placeholder="{{ __('All Types') }}">
                <flux:select.option value="">{{ __('All Types') }}</flux:select.option>
                @foreach ($this->types as $value => $label)
                    <flux:select.option value="{{ $value }}">{{ $label }}</flux:select.option>
                @endforeach
            </flux:select>

            @if (count($this->capabilities) > 0)
                <flux:select wire:model.live="capability" placeholder="{{ __('All Capabilities') }}">
                    <flux:select.option value="">{{ __('All Capabilities') }}</flux:select.option>
                    @foreach ($this->capabilities as $cap)
                        <flux:select.option value="{{ $cap }}">{{ $cap }}</flux:select.option>
                    @endforeach
                </flux:select>
            @endif
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
