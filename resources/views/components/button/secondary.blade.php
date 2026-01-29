@props([
    'type' => 'button',
    'size' => 'base',
    'icon' => null,
    'iconTrailing' => null,
    'href' => null,
    'disabled' => false,
])

@php
$tag = $href ? 'a' : 'button';

$classes = Flux::classes()
    ->add('inline-flex items-center justify-center gap-2 font-medium whitespace-nowrap transition-colors')
    ->add('bg-green-100 hover:bg-green-200 text-green-600')
    ->add('disabled:opacity-50 disabled:cursor-not-allowed disabled:pointer-events-none')
    ->add('rounded-full')
    ->add(match ($size) {
        'xs' => 'h-6 text-xs px-3',
        'sm' => 'h-8 text-sm px-4',
        'base' => 'h-10 text-sm px-5',
        'lg' => 'h-12 text-base px-6',
        'xl' => 'h-14 text-lg px-8',
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
