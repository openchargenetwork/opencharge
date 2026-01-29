@props(['type', 'size' => 'md'])

@php
    $colors = [
        'merchant' => 'green',
        'merchant-gateway' => 'blue',
        'payment-gateway' => 'cyan',
        'kyc-provider' => 'purple',
        'enduser' => 'zinc',
    ];

    $labels = [
        'merchant' => 'Merchant',
        'merchant-gateway' => 'Merchant Gateway',
        'payment-gateway' => 'Payment Gateway',
        'kyc-provider' => 'KYC Provider',
        'enduser' => 'End User',
    ];

    $color = $colors[$type] ?? 'zinc';
    $label = $labels[$type] ?? $type;
@endphp

<flux:badge :color="$color" :size="$size">{{ $label }}</flux:badge>
