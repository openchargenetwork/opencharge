@props(['capability', 'size' => 'md'])

@php
    $parts = explode('.', $capability);
    $category = $parts[0] ?? '';

    $colors = [
        'orders' => 'blue',
        'transfer' => 'green',
        'payment' => 'purple',
        'checkout' => 'cyan',
        'verify' => 'yellow',
        'kyc' => 'pink',
    ];

    $color = $colors[$category] ?? 'zinc';
@endphp

<flux:badge :color="$color" :size="$size" variant="outline">{{ $capability }}</flux:badge>
