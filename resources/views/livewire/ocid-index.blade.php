<?php

use App\Models\Ocid;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    /** @var string[] */
    public array $selectedTags = [];

    /** @var string[] */
    public array $selectedStatuses = [];

    /** @var string[] */
    public array $selectedCapabilities = [];

    #[Computed]
    public function ocids()
    {
        return Ocid::query()
            ->whereNotNull('name')
            ->when($this->selectedStatuses, function ($query) {
                $query->whereIn('status', $this->selectedStatuses);
            })
            ->when($this->selectedTags, function ($query) {
                $query->where(function ($q) {
                    foreach ($this->selectedTags as $tag) {
                        $q->orWhereJsonContains('tags', $tag);
                    }
                });
            })
            ->when($this->selectedCapabilities, function ($query) {
                $query->where(function ($q) {
                    foreach ($this->selectedCapabilities as $capability) {
                        $q->orWhereJsonContains('capabilities', $capability);
                    }
                });
            })
            ->orderBy('name')
            ->paginate(21);
    }

    public function toggleTag(string $tag): void
    {
        if (in_array($tag, $this->selectedTags)) {
            $this->selectedTags = array_values(array_diff($this->selectedTags, [$tag]));
        } else {
            $this->selectedTags[] = $tag;
        }

        $this->resetPage();
    }

    public function toggleStatus(string $status): void
    {
        if (in_array($status, $this->selectedStatuses)) {
            $this->selectedStatuses = array_values(array_diff($this->selectedStatuses, [$status]));
        } else {
            $this->selectedStatuses[] = $status;
        }

        $this->resetPage();
    }

    public function toggleCapability(string $capability): void
    {
        if (in_array($capability, $this->selectedCapabilities)) {
            $this->selectedCapabilities = array_values(array_diff($this->selectedCapabilities, [$capability]));
        } else {
            $this->selectedCapabilities[] = $capability;
        }

        $this->resetPage();
    }

    public function clearFilters(): void
    {
        $this->selectedTags = [];
        $this->selectedStatuses = [];
        $this->selectedCapabilities = [];
        $this->resetPage();
    }

    public function hasActiveFilters(): bool
    {
        return count($this->selectedTags) > 0
            || count($this->selectedStatuses) > 0
            || count($this->selectedCapabilities) > 0;
    }
}; ?>

<div class="flex gap-8">
    {{-- Sidebar Filters --}}
    <aside class="w-52 shrink-0 hidden md:block mt-4">
        <div class="space-y-6">
            {{-- Tags --}}
            <div class="space-y-1">
                <h3 class="text-sm font-semibold text-foreground mb-3">Tags</h3>
                @foreach (App\Enums\OcidTags::cases() as $tag)
                    <x-filter-button
                        :active="in_array($tag->value, $selectedTags)"
                        wire:click="toggleTag('{{ $tag->value }}')"
                        wire:key="tag-{{ $tag->value }}"
                        target="toggleTag('{{ $tag->value }}')"
                    >
                        <flux:icon.tag class="size-4 shrink-0" />
                        <span class="truncate">{{ $tag->label() }}</span>
                    </x-filter-button>
                @endforeach
            </div>

            {{-- Status --}}
            <div class="space-y-1">
                <h3 class="text-sm font-semibold text-foreground mb-3">Api Status</h3>
                @foreach (App\Enums\OcidStatus::cases() as $status)
                    <x-filter-button
                        :active="in_array($status->value, $selectedStatuses)"
                        wire:click="toggleStatus('{{ $status->value }}')"
                        wire:key="status-{{ $status->value }}"
                        target="toggleStatus('{{ $status->value }}')"
                    >
                        @if ($status === App\Enums\OcidStatus::Active)
                            <span class="size-2 rounded-full bg-green-500 shrink-0"></span>
                        @elseif ($status === App\Enums\OcidStatus::Offline)
                            <span class="size-2 rounded-full bg-zinc-400 shrink-0"></span>
                        @else
                            <span class="size-2 rounded-full bg-red-500 shrink-0"></span>
                        @endif
                        <span class="truncate capitalize">{{ $status->value }}</span>
                    </x-filter-button>
                @endforeach
            </div>

            {{-- Capabilities --}}
            <div class="space-y-1">
                <h3 class="text-sm font-semibold text-foreground mb-3">Api Capabilities</h3>
                @foreach (App\Enums\OcidCapabilities::cases() as $capability)
                    <x-filter-button
                        :active="in_array($capability->value, $selectedCapabilities)"
                        wire:click="toggleCapability('{{ $capability->value }}')"
                        wire:key="cap-{{ $capability->value }}"
                        target="toggleCapability('{{ $capability->value }}')"
                    >
                        <flux:icon.bolt class="size-4 shrink-0" />
                        <span class="truncate">{{ $capability->label() }}</span>
                    </x-filter-button>
                @endforeach
            </div>

            {{-- Clear Filters --}}
            @if ($this->hasActiveFilters())
                <flux:button variant="subtle" size="sm" wire:click="clearFilters" class="w-full">
                    Clear all filters
                </flux:button>
            @endif
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 min-w-0">
        <div class="mt-4 space-y-4">
            <div class="flex items-center gap-2 min-h-5 flex-wrap">
                @if ($this->hasActiveFilters())
                    <span class="text-sm text-muted-foreground">&middot;</span>
                    <button wire:click="clearFilters" class="text-sm text-primary hover:underline">Clear filters</button>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse ($this->ocids as $ocid)
                    <x-ocid-card :ocid="$ocid" wire:key="ocid-{{ $ocid->id }}" />
                @empty
                    <div class="col-span-full py-12 text-center">
                        <p class="text-muted-foreground">No Apps match your filters.</p>
                        @if ($this->hasActiveFilters())
                            <flux:button variant="subtle" size="sm" wire:click="clearFilters" class="mt-3">
                                Clear all filters
                            </flux:button>
                        @endif
                    </div>
                @endforelse
            </div>

            {{ $this->ocids->links() }}

            
        </div>
    </div>
</div>
