<?php

use App\Models\Ocid;
use Livewire\Attributes\Locked;
use Livewire\Component;

new class extends Component {
    #[Locked]
    public Ocid $record;

    public function mount(string $ocid): void
    {
        $this->record = Ocid::query()
            ->where('ocid', $ocid)
            ->with(['kycProviders', 'acceptedPartners', 'acceptedBy'])
            ->firstOrFail();
    }
}; ?>

<div class="w-full mt-12 max-w-4xl mx-auto">
    <div class="mb-6">
        <flux:link href="{{ route('ecosystem.index') }}" class="inline-flex items-center gap-1 text-sm">
            <flux:icon.arrow-left class="size-4" />
            {{ __('Back to Ecosystem') }}
        </flux:link>
    </div>

    <div class="rounded-xl border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-800">
        <div class="flex items-start gap-6">
            @if ($record->icon)
                <img
                    src="{{ $record->icon }}"
                    alt="{{ $record->name }}"
                    class="size-20 rounded-xl object-cover"
                />
            @else
                <div class="flex size-20 items-center justify-center rounded-xl bg-zinc-100 dark:bg-zinc-700">
                    <flux:icon.user class="size-10 text-zinc-400" />
                </div>
            @endif

            <div class="flex-1">
                <div class="mb-2 flex items-center gap-3">
                    <flux:heading size="xl">{{ $record->name }}</flux:heading>
                    <x-ecosystem.type-badge :type="$record->type" />
                </div>

                @if ($record->profile)
                    <flux:text class="text-zinc-600 dark:text-zinc-400">
                        {{ $record->profile }}
                    </flux:text>
                @endif
            </div>
        </div>

        <flux:separator class="my-6" />

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <flux:heading size="sm" class="mb-3">{{ __('Details') }}</flux:heading>
                <dl class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <dt class="text-zinc-500">{{ __('OCID') }}</dt>
                        <dd class="font-mono">{{ $record->ocid }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-zinc-500">{{ __('Protocol Version') }}</dt>
                        <dd>{{ $record->opencharge_version }}</dd>
                    </div>
                    @if ($record->contact)
                        <div class="flex justify-between">
                            <dt class="text-zinc-500">{{ __('Contact') }}</dt>
                            <dd>{{ $record->contact }}</dd>
                        </div>
                    @endif
                </dl>
            </div>

            @if ($record->config && isset($record->config['publicKey']))
                <div>
                    <flux:heading size="sm" class="mb-3">{{ __('Public Key') }}</flux:heading>
                    <code class="block break-all rounded bg-zinc-100 p-2 text-xs dark:bg-zinc-900">
                        {{ $record->config['publicKey'] }}
                    </code>
                </div>
            @endif
        </div>

        @if (count($record->capabilities) > 0)
            <flux:separator class="my-6" />

            <div>
                <flux:heading size="sm" class="mb-3">{{ __('Capabilities') }}</flux:heading>
                <div class="flex flex-wrap gap-2">
                    @foreach ($record->capabilities as $capability)
                        <x-ecosystem.capability-badge :capability="$capability" />
                    @endforeach
                </div>
            </div>
        @endif

        @if (count($record->currencies) > 0)
            <flux:separator class="my-6" />

            <div>
                <flux:heading size="sm" class="mb-3">{{ __('Settlement Currencies') }}</flux:heading>
                <div class="flex flex-wrap gap-2">
                    @foreach ($record->currencies as $currency)
                        <flux:badge color="zinc">{{ $currency }}</flux:badge>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($record->kycProviders->isNotEmpty())
            <flux:separator class="my-6" />

            <div>
                <flux:heading size="sm" class="mb-3">{{ __('Verified By') }}</flux:heading>
                <div class="flex flex-wrap gap-2">
                    @foreach ($record->kycProviders as $kyc)
                        <flux:link href="{{ route('ecosystem.show', $kyc->ocid) }}">
                            <flux:badge color="purple">{{ $kyc->name }}</flux:badge>
                        </flux:link>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($record->acceptedPartners->isNotEmpty())
            <flux:separator class="my-6" />

            <div>
                <flux:heading size="sm" class="mb-3">{{ __('Accepts Payments From') }}</flux:heading>
                <div class="flex flex-wrap gap-2">
                    @foreach ($record->acceptedPartners as $partner)
                        <flux:link href="{{ route('ecosystem.show', $partner->ocid) }}">
                            <flux:badge color="blue">{{ $partner->name }}</flux:badge>
                        </flux:link>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($record->acceptedBy->isNotEmpty())
            <flux:separator class="my-6" />

            <div>
                <flux:heading size="sm" class="mb-3">{{ __('Accepted By') }}</flux:heading>
                <div class="flex flex-wrap gap-2">
                    @foreach ($record->acceptedBy as $acceptor)
                        <flux:link href="{{ route('ecosystem.show', $acceptor->ocid) }}">
                            <flux:badge color="green">{{ $acceptor->name }}</flux:badge>
                        </flux:link>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
