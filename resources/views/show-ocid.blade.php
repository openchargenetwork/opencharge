<x-layouts.app>
    <div class="mx-auto w-full px-4 sm:px-6 lg:px-8 py-4 max-w-7xl pt-4">
        <div class="space-y-4">
            {{-- Header --}}
            <div class="pt-4">
                <div class="mb-3 shrink-0">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-start gap-3 min-w-0 flex-1">
                            @if ($ocid->icon)
                                <img alt="{{ $ocid->name }}" width="48" height="48"
                                    class="size-12 shrink-0 rounded-sm object-contain" src="{{ $ocid->icon }}">
                            @else
                                <div
                                    class="size-12 shrink-0 rounded-sm bg-primary/10 flex items-center justify-center text-primary font-bold text-lg">
                                    {{ str($ocid->name ?? '?')->substr(0, 1)->upper() }}
                                </div>
                            @endif
                            <div class="flex flex-col min-w-0 flex-1">
                                <h1 class="text-2xl font-bold flex items-center gap-2 min-w-0 flex-1 leading-tight">
                                    <span class="truncate">{{ $ocid->name ?? 'Unnamed OCID' }}</span>
                                    @if ($ocid->valid_signature)
                                        <flux:icon.check-badge class="size-5 text-primary shrink-0" />
                                    @endif
                                </h1>
                                <div
                                    class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2 text-sm text-muted-foreground leading-tight mt-1">
                                    <span>#{{ $ocid->token_id }}</span>
                                    <span class="hidden sm:inline">&middot;</span>
                                    <span>v{{ $ocid->opencharge_version }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Badges --}}
                    <div class="flex items-center gap-2 mt-4 flex-wrap">
                        {{-- Status --}}
                        <div
                            class="group inline-flex items-center gap-1.5 px-2 py-1 rounded-full bg-secondary text-xs font-medium text-muted-foreground select-none">
                            @if ($ocid->status === App\Enums\OcidStatus::Active)
                                <span class="size-2 rounded-full bg-green-500"></span>
                            @elseif ($ocid->status === App\Enums\OcidStatus::Offline)
                                <span class="size-2 rounded-full bg-zinc-400"></span>
                            @else
                                <span class="size-2 rounded-full bg-red-500"></span>
                            @endif
                            <span class="capitalize">{{ $ocid->status?->value }}</span>
                        </div>

                        {{-- Verified --}}
                        @if ($ocid->valid_signature)
                            <div
                                class="group inline-flex items-center gap-1 px-2 py-1 rounded-full bg-secondary text-xs font-medium text-muted-foreground select-none">
                                <flux:icon.check-badge class="size-3 text-green-500" />
                                <span>Verified</span>
                            </div>
                        @endif

                        {{-- Tags --}}
                        @if ($ocid->tags)
                            @foreach ($ocid->tags as $tagValue)
                                @php $tag = App\Enums\OcidTags::tryFrom($tagValue); @endphp
                                @if ($tag)
                                    <div
                                        class="group inline-flex items-center gap-1 px-2 py-1 rounded-full bg-secondary text-xs font-medium text-muted-foreground select-none">
                                        <flux:icon.tag class="size-3" />
                                        <span>{{ $tag->label() }}</span>
                                    </div>
                                @endif
                            @endforeach
                        @endif

                        {{-- Currencies --}}
                        @if ($ocid->settlement_currencies)
                            @foreach ($ocid->settlement_currencies as $currency)
                                <div
                                    class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-secondary text-xs font-medium text-muted-foreground select-none">
                                    <flux:icon.banknotes class="size-3" />
                                    <span>{{ $currency }}</span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            {{-- Main Content Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-[7fr_5fr] gap-6 w-full">
                {{-- Left Column --}}
                <section class="min-w-0 space-y-6 overflow-hidden">
                    {{-- About --}}
                    @if ($ocid->profile)
                        <div>
                            <h2 class="text-xl font-semibold flex items-center gap-2 mb-4">
                                <flux:icon.information-circle class="size-5" />
                                About
                            </h2>
                            <div class="text-foreground">
                                <p class="text-sm leading-relaxed">{{ $ocid->profile }}</p>
                            </div>
                        </div>
                    @endif

                    {{-- Capabilities --}}
                    @if ($ocid->capabilities && count($ocid->capabilities) > 0)
                        <div>
                            <h2 class="text-xl font-semibold flex items-center gap-2 mb-4">
                                <flux:icon.bolt class="size-5" />
                                Capabilities
                            </h2>
                            <div class="flex flex-col">
                                @foreach ($ocid->capabilities as $capabilityValue)
                                    @php $capability = App\Enums\OcidCapabilities::tryFrom($capabilityValue); @endphp
                                    <details class="group border rounded-md mb-3 transition-all hover:border-primary">
                                        <summary
                                            class="p-4 cursor-pointer list-none [&::-webkit-details-marker]:hidden [&::marker]:hidden">
                                            <div class="flex items-center justify-between">
                                                <h3 class="font-medium group-hover:text-primary transition-colors">
                                                    {{ $capabilityValue }}
                                                </h3>
                                                <div
                                                    class="text-muted-foreground group-hover:text-primary transition-colors">
                                                    <flux:icon.chevron-down
                                                        class="size-4 transition-transform duration-200 group-open:rotate-180" />
                                                </div>
                                            </div>
                                            @if ($capability)
                                                <p class="mt-1 text-sm text-muted-foreground">
                                                    {{ $capability->label() }}</p>
                                            @endif
                                        </summary>
                                        <div class="px-4 pb-4">
                                            @if ($capability && $ocid->endpoint)
                                                <div class="p-3 bg-secondary/50 rounded-lg border border-border/50 space-y-2">
                                                    <div class="flex items-center gap-2 font-mono text-xs">
                                                        <span class="shrink-0 px-1.5 py-0.5 rounded font-semibold {{ $capability->httpMethod() === 'GET' ? 'bg-emerald-500/15 text-emerald-600 dark:text-emerald-400' : 'bg-blue-500/15 text-blue-600 dark:text-blue-400' }}">{{ $capability->httpMethod() }}</span>
                                                        <span class="text-muted-foreground truncate">{{ rtrim($ocid->endpoint, '/') }}{{ $capability->endpointPath() }}</span>
                                                    </div>
                                                    <p class="text-xs text-muted-foreground">{{ $capability->shortDescription() }}</p>
                                                    <a href="{{ $capability->docsUrl() }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-xs text-primary hover:underline">
                                                        <flux:icon.arrow-top-right-on-square class="size-3" />
                                                        View full docs
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </details>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Settlement --}}
                    @if ($ocid->settlement_currencies && count($ocid->settlement_currencies) > 0)
                        <div>
                            <h2 class="text-xl font-semibold flex items-center gap-2 mb-4">
                                <flux:icon.banknotes class="size-5" />
                                Settlement
                            </h2>
                            <div class="p-4 bg-secondary/50 rounded-lg border border-border/50">
                                <h4 class="text-sm font-medium mb-2">Currencies</h4>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($ocid->settlement_currencies as $currency)
                                        <flux:badge size="sm" variant="pill">{{ $currency }}</flux:badge>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- OCID JSON --}}
                    <div>
                        <div class="space-y-3">
                            <x-we-copy :text="$ocid->toOcidJson()" :after="true">
                                <div
                                    class="group max-w-173.75 flex items-start rounded-lg text-xs font-mono border border-border text-card-foreground w-full text-left p-3 bg-secondary shadow-sm">
                                    <code class="flex-1 max-w-173.75  overflow-auto  break-all whitespace-pre wrap-break-word text-foreground text-[11px] leading-relaxed">{{ $ocid->toOcidJson() }}</code>
                                </div>
                            </x-we-copy>
                        </div>
                    </div>

                    

                    
                </section>

                {{-- Right Column (Sidebar) --}}
                <aside class="min-w-0 overflow-visible">
                    {{-- Endpoint --}}
                    @if ($ocid->endpoint)
                        <div class="mb-6">
                            <h2 class="text-xl font-semibold flex items-center gap-2 mb-4">
                                <flux:icon.link class="size-5" />
                                Connect
                            </h2>
                            <div class="flex flex-col space-y-4">
                                <div class="space-y-3">
                                    <div class="flex items-center gap-2">
                                        <div class="h-px bg-border/50 flex-1"></div>
                                        <h4 class="text-sm font-medium text-muted-foreground/80 px-3">API Endpoint</h4>
                                        <div class="h-px bg-border/50 flex-1"></div>
                                    </div>

                                    <div
                                        class="group flex items-center gap-2 rounded-lg text-xs font-mono border border-border text-card-foreground w-full text-left p-3 px-4 bg-secondary shadow-sm">
                                        <div class="flex-1 flex items-center overflow-x-auto whitespace-nowrap pr-2 text-foreground">
                                            <x-lucide-globe-2 class="size-4 inline-block mr-1" />
                                            <x-we-copy :text="$ocid->endpoint" :after="true">{{ $ocid->endpoint }}
                                            </x-we-copy>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                    @php
                        $acceptedOcids = App\Models\Ocid::whereIn('token_id', $ocid->settlement_accepts)->get();
                        $unmatchedIds = array_diff(
                            $ocid->settlement_accepts,
                            $acceptedOcids->pluck('token_id')->toArray(),
                        );
                    @endphp
                    @if(count($acceptedOcids) > 0)
                    <div class="flex gap-4 flex-col">
                        <div class="flex items-center gap-2">
                            <div class="h-px bg-border/50 flex-1"></div>
                            <h4 class="text-sm font-medium text-muted-foreground/80 px-3">Accepted Gateways</h4>
                            <div class="h-px bg-border/50 flex-1"></div>
                        </div>
                       
                        <div class="flex flex-col max-h-125 overflow-y-auto dark-scrollbar bg-secondary/75 p-4 rounded-lg border border-border">
                            <div class="w-full flex-1 flex flex-col gap-2 min-h-0">
                                <ul class="space-y-0.5 flex-1 min-h-0 overflow-y-auto dark-scrollbar">
                                     @foreach ($acceptedOcids as $acceptedOcid)
                                     <li  wire:navigate href="{{ route('ocid.show', $acceptedOcid) }}" class="flex items-center gap-3 px-2 py-1.5 cursor-pointer rounded-md hover:bg-primary/10">
                                        <div class="w-8 h-8 flex items-center justify-center shrink-0">
                                        @if ($acceptedOcid->icon)
                                                <img
                                                    alt="{{ $acceptedOcid->name }}"
                                                    loading="lazy"
                                                    width="28"
                                                    height="28"
                                                    class="size-5 shrink-0 rounded-sm object-contain shadow-xs ring-1 ring-black/5"
                                                    src="{{ $acceptedOcid->icon }}"
                                                >
                                            @else
                                                <div class="size-5 shrink-0 rounded-sm bg-primary/10 flex items-center justify-center text-primary font-bold text-xs">
                                                    {{ str($acceptedOcid->name ?? '?')->substr(0, 1)->upper() }}
                                                </div>
                                            @endif
                                        </div>
                                        <span class="grow">{{ $acceptedOcid->name }}</span>
                                        <div class="flex ml-auto items-center gap-1.5">
                                            @if ($acceptedOcid->status === App\Enums\OcidStatus::Active)
                                                <span class="size-2 rounded-full bg-green-500"></span>
                                            @elseif ($acceptedOcid->status === App\Enums\OcidStatus::Offline)
                                                <span class="size-2 rounded-full bg-zinc-400"></span>
                                            @else
                                                <span class="size-2 rounded-full bg-red-500"></span>
                                            @endif
                                            <span class="text-xs text-muted-foreground capitalize">{{ $acceptedOcid->status?->value }}</span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                     @php
                        $kycOcids = App\Models\Ocid::whereIn('token_id', $ocid->kyc)->get();
                        $unmatchedIds = array_diff(
                            $ocid->kyc,
                            $kycOcids->pluck('token_id')->toArray(),
                        );
                    @endphp
                    @if(count($kycOcids) > 0)
                    <div class="flex gap-4 mt-6 flex-col">
                        <div class="flex items-center gap-2">
                            <div class="h-px bg-border/50 flex-1"></div>
                            <h4 class="text-sm font-medium text-muted-foreground/80 px-3">Accepted KYC Providers</h4>
                            <div class="h-px bg-border/50 flex-1"></div>
                        </div>
                       
                        <div class="flex flex-col max-h-125 overflow-y-auto dark-scrollbar bg-secondary/75 p-4 rounded-lg border border-border">
                            <div class="w-full flex-1 flex flex-col gap-2 min-h-0">
                                <ul class="space-y-0.5 flex-1 min-h-0 overflow-y-auto dark-scrollbar">
                                     @foreach ($kycOcids as $kycOcid)
                                     <li wire:key="{{ $kycOcid->token_id }}" wire:navigate href="{{ route('ocid.show', $kycOcid) }}"  class="flex items-center gap-3 px-2 py-1.5 cursor-pointer rounded-md hover:bg-primary/10">
                                        <div class="w-8 h-8 flex items-center justify-center shrink-0">
                                        @if ($kycOcid->icon)
                                                <img
                                                    alt="{{ $kycOcid->name }}"
                                                    loading="lazy"
                                                    width="28"
                                                    height="28"
                                                    class="size-5 shrink-0 rounded-sm object-contain shadow-xs ring-1 ring-black/5"
                                                    src="{{ $kycOcid->icon }}"
                                                >
                                            @else
                                                <div class="size-5 shrink-0 rounded-sm bg-primary/10 flex items-center justify-center text-primary font-bold text-xs">
                                                    {{ str($kycOcid->name ?? '?')->substr(0, 1)->upper() }}
                                                </div>
                                            @endif
                                        </div>
                                        <span class="grow">{{ $kycOcid->name }}</span>
                                        <div class="flex ml-auto items-center gap-1.5">
                                            @if ($kycOcid->status === App\Enums\OcidStatus::Active)
                                                <span class="size-2 rounded-full bg-green-500"></span>
                                            @elseif ($kycOcid->status === App\Enums\OcidStatus::Offline)
                                                <span class="size-2 rounded-full bg-zinc-400"></span>
                                            @else
                                                <span class="size-2 rounded-full bg-red-500"></span>
                                            @endif
                                            <span class="text-xs text-muted-foreground capitalize">{{ $kycOcid->status?->value }}</span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="mt-2 space-y-0">
                        <div>
                            <div class="flex flex-col py-0.5"><span
                                    class="text-sm text-foreground mb-0.5">Published</span>
                                <div class="text-sm"><span
                                        class="inline-flex items-center gap-1.5 text-muted-foreground">
                                        <x-lucide-calendar class="lucide lucide-calendar h-3.5 w-3.5" />
                                        {{ $ocid->created_at->format('M j, Y') }}</span></div>
                            </div>
                            <div class="h-px bg-border my-0.5"></div>
                        </div>
                        @if ($ocid->contact)
                            <div>
                                <div class="flex flex-col py-0.5"><span
                                        class="text-sm text-foreground mb-0.5">Contact</span>
                                    <div class="text-sm inline-flex items-center gap-1.5 text-muted-foreground">
                                        <x-lucide-mail class=" h-3.5 w-3.5" />
                                        <span>{{ $ocid->contact }}</span>
                                    </div>
                                </div>
                                <div class="h-px bg-border my-0.5"></div>
                            </div>
                        @endif
                        @if ($ocid->public_key)
                            <div>
                                <div class="flex flex-col py-0.5"><span class="text-sm text-foreground mb-0.5">Public
                                        Key</span>
                                    <div class="text-sm inline-flex items-center gap-1.5 text-muted-foreground">
                                        <x-lucide-key class=" h-3.5 w-3.5" />
                                        <x-we-copy after
                                            :text="$ocid->public_key"><span>{{ \Illuminate\Support\Str::limit($ocid->public_key, 20) }}</span></x-we-copy>
                                    </div>
                                </div>
                                <div class="h-px bg-border my-0.5"></div>
                            </div>
                        @endif
                        @if ($ocid->address)
                            <div>
                                <div class="flex flex-col py-0.5"><span
                                        class="text-sm text-foreground mb-0.5">Creeators Address</span>
                                    <div class="text-sm inline-flex items-center gap-1.5 text-muted-foreground">
                                        <x-lucide-key class=" h-3.5 w-3.5" />
                                        <x-we-copy after
                                            :text="$ocid->address"><span>{{ \Illuminate\Support\Str::limit($ocid->address, 20) }}</span></x-we-copy>
                                    </div>
                                </div>
                                <div class="h-px bg-border my-0.5"></div>
                            </div>
                        @endif
                    </div>
                </aside>
            </div>
        </div>
    </div>
</x-layouts.app>
