@props([
    'type' => 'button',
    'size' => 'base',
    'variant' => 'primary',
    'icon' => null,
    'iconTrailing' => null,
    'href' => null,
    'disabled' => false,
])

@php
$tag = $href ? 'a' : 'button';

$classes = Flux::classes()
    ->add('inline-flex items-center justify-center gap-2 font-medium whitespace-nowrap transition-colors')
    ->add('border transistion-colors duration-200')
    ->add('disabled:opacity-50 disabled:cursor-not-allowed disabled:pointer-events-none')
    ->add('rounded-full cursor-pointer')
    ->add(match ($size) {
        'xs' => 'h-6 text-xs px-3',
        'sm' => 'h-8 text-sm px-4',
        'base' => 'h-10 text-sm px-5',
        'lg' => 'h-12 text-base px-6',
        'xl' => 'h-14 text-lg px-8',
    })->add(match ($variant) {
        'primary' => 'border-green-600 hover:bg-green-50/50 hover:text-green-700 text-green-600',
        'secondary' => 'border-zinc-400 hover:bg-zinc-50/50 hover:text-zinc-600 text-zinc-400',
        'warning' => 'border-amber-500 hover:bg-amber-50/50 hover:text-amber-600 text-amber-600',
        'danger' => 'border-red-500 hover:bg-red-50/50 hover:text-red-600 text-red-500',
        'flat' => 'border-zinc-300/50 bg-zinc-200 hover:bg-zinc-300 hover:text-zinc-700 text-zinc-500',
    });
@endphp

<{{ $tag }}
    {{ $attributes->class($classes) }}
    @if($tag === 'button')
        type="{{ $type }}"
        @if($disabled) disabled @endif
    @else
        href="{{ $href }}"
    @endif
>
    @if($icon)
        <flux:icon :icon="$icon" variant="micro" />
    @endif

    {{ $slot }}

    @if($iconTrailing)
        <flux:icon :icon="$iconTrailing" variant="micro" />
    @endif
</{{ $tag }}>
