@props(['active' => false, 'target' => null])
<button
    {{ $attributes->class([
        'w-full flex items-center gap-2 px-2 py-1.5 rounded-md text-sm transition-colors cursor-pointer',
        'bg-primary/10 text-primary font-medium' => $active,
        'text-muted-foreground hover:text-foreground hover:bg-muted/50' => ! $active,
    ]) }}
>
    {{ $slot }}
    @if ($target)
        <x-lucide-loader-2 wire:loading wire:target="{{ $target }}" class="size-3.5 shrink-0 animate-spin ml-auto" />
    @endif
</button>
