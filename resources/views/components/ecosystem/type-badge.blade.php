
@php
    $labels = [
        'merchant' => 'Merchant',
        'merchant-gateway' => 'Merchant Gateway',
        'payment-gateway' => 'Payment Gateway',
        'kyc-provider' => 'KYC Provider',
        'enduser' => 'End User',
    ];
    $label = $labels[$type] ?? $type;
@endphp

<div>
  <span class="inline-flex items-center border border-solid rounded px-1.5 py-0.5 text-[11px]  leading-3 bg-gradient-to-br bg-clip-text bg-white-950 text-transparent border-accent-pink-200 from-gradient-vibrant-pink-100 to-gradient-vibrant-pink-200">{{ $label }}</span></div>
