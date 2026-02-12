<?php

use Livewire\Component;
use App\Models\Ocid;

new class extends Component {
    public string $search = '';

    /**
     * @return \Illuminate\Database\Eloquent\Collection<int, Ocid>
     */
    public function results(): \Illuminate\Database\Eloquent\Collection
    {
        if (strlen($this->search) < 2) {
            return new \Illuminate\Database\Eloquent\Collection;
        }

        $term = $this->search;

        return Ocid::query()
            ->where(function ($query) use ($term) {
                $query->where('name', 'like', "%{$term}%")
                    ->orWhere('profile', 'like', "%{$term}%")
                    ->orWhere('token_id', 'like', "%{$term}%")
                    ->orWhere('capabilities', 'like', "%{$term}%")
                    ->orWhere('settlement_currencies', 'like', "%{$term}%");
            })
            ->limit(10)
            ->get();
    }
}; ?>

<div class="relative w-full" x-data="{ open: false }" @click.outside="open = false">
    <div class="relative w-full">
        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-muted-foreground">
            <x-lucide-search class="size-5" />
        </span>
        <input
            wire:model.live.debounce.300ms="search"
            @focus="open = true"
            @keydown.escape="open = false"
            type="text"
            role="combobox"
            aria-expanded="false"
            aria-autocomplete="list"
            autocomplete="off"
            placeholder="Search Opencharge Apps..."
            class="pl-10 py-2.5 text-sm h-10 w-full text-foreground border border-muted rounded-lg bg-secondary focus:outline-hidden focus:border-primary pr-3"
        >
        <span wire:loading wire:target="search" class="absolute right-3 top-1/2 -translate-y-1/2 text-muted-foreground">
            <x-lucide-loader-2 class="size-4 animate-spin" />
        </span>
    </div>

    @if (strlen($search) >= 2)
        <div
            x-show="open"
            x-cloak
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 -translate-y-1"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-1"
            class="absolute left-0 right-0 z-9999 mt-2 bg-secondary/75 backdrop-blur-xl border rounded-xl overflow-hidden shadow-2xl"
        >
            <div class="py-2 max-h-72 overflow-y-auto">
                @forelse ($this->results() as $ocid)
                    <a
                        href="#"
                        wire:key="ocid-{{ $ocid->id }}"
                        class="w-full px-4 py-3 flex items-start gap-3 text-left text-sm transition-all duration-200 hover:bg-secondary-foreground/5 active:bg-secondary-foreground/10"
                    >
                        <div class="shrink-0 mt-0.5 flex items-center justify-center h-8 w-8 rounded-md bg-primary/10 text-primary font-bold text-xs">
                            #{{ $ocid->token_id }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2">
                                <span class="font-medium truncate text-secondary-foreground">{{ $ocid->name ?? 'Unnamed App' }}</span>
                                @if ($ocid->status)
                                    <span class="inline-flex items-center rounded-full bg-primary/10 px-2 py-0.5 text-[10px] font-medium text-primary">
                                        {{ $ocid->status->label() }}
                                    </span>
                                @endif
                            </div>
                            @if ($ocid->profile)
                                <div class="text-xs text-secondary-foreground/60 mt-0.5 truncate">{{ $ocid->profile }}</div>
                            @endif
                            @if ($ocid->capabilities)
                                <div class="flex flex-wrap gap-1 mt-1">
                                    @foreach (array_slice($ocid->capabilities, 0, 3) as $capability)
                                        <span class="inline-flex items-center rounded bg-muted px-1.5 py-0.5 text-[10px] text-muted-foreground">{{ $capability }}</span>
                                    @endforeach
                                    @if (count($ocid->capabilities) > 3)
                                        <span class="text-[10px] text-muted-foreground">+{{ count($ocid->capabilities) - 3 }} more</span>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </a>
                @empty
                    <div class="px-4 py-6 text-center text-sm text-muted-foreground">
                        No Apps found for "{{ $search }}"
                    </div>
                @endforelse
            </div>
        </div>
    @endif
</div>
