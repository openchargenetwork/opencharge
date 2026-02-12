@props([
    'variant' => 'primary',
    'size' => 'default',
    'href' => null,
])

@php
    $base = 'inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium rounded-md transition-colors focus-visible:outline-hidden focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 cursor-pointer [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0';

    $variants = [
        'primary' => 'bg-primary text-primary-foreground shadow-sm hover:bg-primary/90',
        'secondary' => 'border border-input bg-background shadow-xs hover:bg-accent hover:text-accent-foreground',
        'ghost' => 'hover:bg-secondary text-muted-foreground hover:text-foreground',
    ];

    $sizes = [
        'sm' => 'h-9 px-3 py-2 text-sm',
        'default' => 'h-10 px-8 text-base leading-[1.4]',
        'lg' => 'h-12 px-10 text-lg',
    ];

    $classes = $base . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['default']);

    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }}
    {{ $attributes->class([$classes])->merge($href ? ['href' => $href] : ['type' => 'button']) }}
>{{ $slot }}</{{ $tag }}>
