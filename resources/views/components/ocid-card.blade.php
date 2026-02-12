@props(['ocid'])

<a href="{{ route('ocid.show', $ocid) }}" wire:navigate {{ $attributes->class([
    'group w-full bg-card rounded-lg border border-border px-6 py-4 lg:p-4',
    'hover:border-primary/50 transition-all duration-200 h-[160px] flex flex-col',
    'relative z-10 overflow-hidden cursor-pointer no-underline',
]) }}>
    <div class="flex-1 space-y-3">
        {{-- Header: Icon + Name + Status --}}
        <div class="flex items-center gap-3">
            @if ($ocid->icon)
                <img
                    alt="{{ $ocid->name }}"
                    loading="lazy"
                    width="28"
                    height="28"
                    class="size-7 shrink-0 rounded-sm object-contain shadow-xs ring-1 ring-black/5"
                    src="{{ $ocid->icon }}"
                >
            @else
                <div class="size-7 shrink-0 rounded-sm bg-primary/10 flex items-center justify-center text-primary font-bold text-xs">
                    {{ str($ocid->name ?? '?')->substr(0, 1)->upper() }}
                </div>
            @endif
            <div class="min-w-0 flex-1 overflow-hidden">
                <div class="flex items-center gap-1 min-w-0">
                    <h3 class="text-base font-semibold text-foreground group-hover:text-primary transition-colors truncate flex-1 min-w-0 leading-[1.1]">
                        {{ $ocid->name ?? 'Unnamed OCID' }}
                    </h3>
                    @if ($ocid->valid_signature)
                        <div class="shrink-0">
                            <flux:icon.check-badge class="size-4 text-primary" />
                        </div>
                    @endif
                </div>
                <div class="mt-0.75 min-w-0">
                    <div class="text-muted-foreground text-sm truncate leading-[1.3]">
                        #{{ $ocid->token_id }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Profile Description --}}
        @if ($ocid->profile)
            <p class="text-muted-foreground text-sm leading-[1.3] line-clamp-2">
                {{ $ocid->profile }}
            </p>
        @endif
    </div>

    {{-- Footer: Tags + Status --}}
    <div class="mt-3 pt-3 border-t border-border/50 flex items-center justify-between">
        <div class="flex items-center gap-1.5 overflow-hidden">
            @if ($ocid->tags)
                @foreach (array_slice($ocid->tags, 0, 2) as $tagValue)
                    @php $tag = App\Enums\OcidTags::tryFrom($tagValue); @endphp
                    @if ($tag)
                        <flux:badge size="sm" variant="pill" color="zinc" class="text-[10px]! text-muted-foreground!">{{ $tag->label() }}</flux:badge>
                    @endif
                @endforeach
                @if (count($ocid->tags) > 2)
                    <span class="text-[10px] text-muted-foreground">+{{ count($ocid->tags) - 2 }}</span>
                @endif
            @endif
        </div>
        <div class="flex items-center gap-1.5">
            @if ($ocid->status === App\Enums\OcidStatus::Active)
                <span class="size-2 rounded-full bg-green-500"></span>
            @elseif ($ocid->status === App\Enums\OcidStatus::Offline)
                <span class="size-2 rounded-full bg-zinc-400"></span>
            @else
                <span class="size-2 rounded-full bg-red-500"></span>
            @endif
            <span class="text-xs text-muted-foreground capitalize">{{ $ocid->status?->value }}</span>
        </div>
    </div>
</a>
