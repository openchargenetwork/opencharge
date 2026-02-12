<x-layouts.app>
    <div class="min-h-screen">
        <div class="h-[calc(100vh-72px-260px)] flex flex-col justify-center">
            <div class="mx-auto w-full px-4 sm:px-6 lg:px-8 py-4 max-w-7xl pb-0">
                <section class="relative flex flex-col"><svg
                        class="lg:hidden pointer-events-none absolute left-1/2 top-25 h-[calc(100%-100px)] w-[200vw] -translate-x-1/2"
                        viewBox="0 0 100 26" preserveAspectRatio="none" aria-hidden="true">
                        <defs>
                            <radialGradient id="lightConeGradientMobile" cx="50%" cy="0%" r="100%"
                                fx="50%" fy="0%">
                                <stop offset="0%" stop-color="rgba(255, 140, 50, 0.72)"></stop>
                                <stop offset="15%" stop-color="rgba(255, 130, 45, 0.39)"></stop>
                                <stop offset="40%" stop-color="rgba(255, 120, 40, 0.13)"></stop>
                                <stop offset="70%" stop-color="rgba(255, 110, 35, 0.045)"></stop>
                                <stop offset="100%" stop-color="rgba(255, 100, 30, 0)"></stop>
                            </radialGradient>
                            <linearGradient id="lightConeTopFadeMobile" x1="0" y1="0" x2="0"
                                y2="26" gradientUnits="userSpaceOnUse">
                                <stop offset="0%" stop-color="white" stop-opacity="0"></stop>
                                <stop offset="8%" stop-color="white" stop-opacity="0.6"></stop>
                                <stop offset="18%" stop-color="white" stop-opacity="1"></stop>
                            </linearGradient>
                            <mask id="lightConeMaskMobile" maskUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="100" height="26" fill="url(#lightConeTopFadeMobile)">
                                </rect>
                            </mask>
                        </defs>
                        <polygon points="47,0 53,0 100,26 0,26" fill="url(#lightConeGradientMobile)"
                            mask="url(#lightConeMaskMobile)"></polygon>
                    </svg>
                    <div class="flex lg:hidden justify-center mb-6 relative">

                        <img alt="Smithery mascot" width="200" height="280" decoding="async" data-nimg="1"
                            class="relative z-10" src="/svgs/mascot-determined.svg" style="color: transparent;">
                    </div>
                    <div
                        class="w-full max-w-7xl mx-auto flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                        <div class="flex-1 flex flex-col items-center lg:items-start">
                            <header class="w-full flex flex-col items-center lg:items-start mb-2 md:mb-3">
                                <h1
                                    class="text-foreground text-4xl sm:text-5xl font-bold text-center lg:text-left leading-[1.1]">
                                    <span>The fastest way<br></span><span>to intergrate payments</span>
                                </h1>
                            </header>
                            <div class="flex w-full flex-col items-center lg:items-start">
                                <p
                                    class="text-muted-foreground text-lg text-center lg:text-left max-w-2xl leading-[1.6] text-balance">
                                    <span>Connect to any gateway, wallet or merchant instantly.</span><br>

                                    <span>Opencharge is an interoperable network of payment providers and
                                        consumers.</span>
                                    <span>It defines a set of api endpoints that can be implemented by any payment
                                        gateway, merchant or financial service </span>
                                </p>
                            </div>
                            <div class="w-full mt-4 flex justify-center lg:justify-start">
                                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-3"><a
                                        class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-hidden focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 cursor-pointer [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground shadow-sm hover:bg-primary/90 py-2 h-10.5 px-6"
                                        href="{{ route('create-ocid') }}" wire:navigate>Get Started</a>
                                    <div class="hidden sm:flex flex-col items-end">
                                        <div class="relative group max-w-70 sm:max-w-none">
                                            <a href="https://docs.opencharge.network" target="_blank" type="button"
                                                class="flex items-center gap-2 bg-muted/50 border border-border rounded-lg px-4 h-10.5 font-mono text-sm text-foreground overflow-hidden cursor-pointer hover:bg-muted/70 transition-colors">
                                                View the api documentation
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hidden lg:flex items-center justify-center shrink-0 relative"><svg
                                class="pointer-events-none absolute left-[74%] top-[90%] h-65 w-[200vw] -translate-x-1/2"
                                viewBox="0 0 100 26" preserveAspectRatio="none" aria-hidden="true">
                                <defs>
                                    <radialGradient id="lightConeGradient" cx="50%" cy="0%" r="100%"
                                        fx="50%" fy="0%">
                                        <stop offset="0%" stop-color="rgba(255, 140, 50, 0.72)"></stop>
                                        <stop offset="15%" stop-color="rgba(255, 130, 45, 0.39)"></stop>
                                        <stop offset="40%" stop-color="rgba(255, 120, 40, 0.13)"></stop>
                                        <stop offset="70%" stop-color="rgba(255, 110, 35, 0.045)"></stop>
                                        <stop offset="100%" stop-color="rgba(255, 100, 30, 0)"></stop>
                                    </radialGradient>
                                    <linearGradient id="lightConeTopFade" x1="0" y1="0" x2="0"
                                        y2="26" gradientUnits="userSpaceOnUse">
                                        <stop offset="0%" stop-color="white" stop-opacity="0"></stop>
                                        <stop offset="8%" stop-color="white" stop-opacity="0.6"></stop>
                                        <stop offset="18%" stop-color="white" stop-opacity="1"></stop>
                                    </linearGradient>
                                    <mask id="lightConeMask" maskUnits="userSpaceOnUse">
                                        <rect x="0" y="0" width="100" height="26"
                                            fill="url(#lightConeTopFade)"></rect>
                                    </mask>
                                </defs>
                                <polygon points="47,0 53,0 58,26 0,26" fill="url(#lightConeGradient)"
                                    mask="url(#lightConeMask)"></polygon>
                            </svg><img alt="Smithery mascot" width="550" height="355" decoding="async"
                                class="relative z-10" src="/svgs/mascot.svg" style="color: transparent;"></div>
                    </div>
                </section>
            </div>
        </div>
        <section class="py-20 px-6">
            <div class="mx-auto w-full max-w-7xl">
                <div class="text-center mb-14">
                    <h2 class="text-3xl sm:text-5xl mt-12 lg:mt-0 font-bold text-foreground leading-[1.1] mb-4">Why
                        Opencharge?</h2>
                    <p class="text-muted-foreground text-lg max-w-2xl mx-auto leading-[1.6]">
                        A shared opensource protocol that makes payment systems work together — without lock-in,
                        complexity, or compromise.
                    </p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="border border-border rounded-xl p-6 bg-card flex flex-col gap-3">
                        <div class="text-2xl font-bold text-primary">01</div>
                        <h3 class="text-lg font-semibold text-foreground">Implement once, connect everywhere</h3>
                        <p class="text-muted-foreground text-sm leading-[1.6]">
                            A single implementation gives you access to every service on the network. Add, switch, or
                            remove providers without changing a line of code.
                        </p>
                    </div>
                    <div class="border border-border rounded-xl p-6 bg-card flex flex-col gap-3">
                        <div class="text-2xl font-bold text-primary">02</div>
                        <h3 class="text-lg font-semibold text-foreground">It doesn't replace your API — it expands it
                        </h3>
                        <p class="text-muted-foreground text-sm leading-[1.6]">
                            Keep your existing API. Opencharge opens a fresh connection into a network of payment
                            providers and consumers. You choose which endpoints to implement and who to accept
                            connections from.
                        </p>
                    </div>
                    <div class="border border-border rounded-xl p-6 bg-card flex flex-col gap-3">
                        <div class="text-2xl font-bold text-primary">03</div>
                        <h3 class="text-lg font-semibold text-foreground">Radically simple</h3>
                        <p class="text-muted-foreground text-sm leading-[1.6]">
                            Under 6 endpoints covering discovery, authentication, transfers, orders, settlement,
                            KYC/AML, QR code workflows, and cross-gateway payments.
                        </p>
                    </div>
                    <div class="border border-border rounded-xl p-6 bg-card flex flex-col gap-3">
                        <div class="text-2xl font-bold text-primary">04</div>
                        <h3 class="text-lg font-semibold text-foreground">Free and open source</h3>
                        <p class="text-muted-foreground text-sm leading-[1.6]">
                            A collectively maintained open-source spec with SDKs, a sandbox, and plugins. No vendor
                            lock-in, no gatekeepers — just a community-owned standard.
                        </p>
                    </div>
                    <div class="border border-border rounded-xl p-6 bg-card flex flex-col gap-3">
                        <div class="text-2xl font-bold text-primary">05</div>
                        <h3 class="text-lg font-semibold text-foreground">Decentralized discovery</h3>
                        <p class="text-muted-foreground text-sm leading-[1.6]">
                            The network registry lives on the blockchain — a neutral database of Opencharge-compatible
                            services outside the control of any single organization. A meeting point for merchants,
                            banks, AML services, exchanges, and more.
                        </p>
                    </div>
                    <div class="border border-border rounded-xl p-6 bg-card flex flex-col gap-3">
                        <div class="text-2xl font-bold text-primary">06</div>
                        <h3 class="text-lg font-semibold text-foreground">Cross-gateway payments</h3>
                        <p class="text-muted-foreground text-sm leading-[1.6]">
                            Users of one wallet can pay merchants on another service — no new API routes, no bank
                            pipelines, no reserve accounts. A shared settlement arbiter in the network handles it.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="w-full">
            <div class="bg-secondary py-12 px-6">
                <div class="mx-auto w-full max-w-7xl">
                    <div
                        class="flex flex-col lg:flex-row items-center  gap-8 lg:gap-16  lg:items-start text-center lg:text-left">
                        <section class="flex flex-col flex-1 lg:self-stretch justify-center ">
                            <h2
                                class="text-3xl sm:text-5xl text-secondary-foreground text-center mb-4 flex items-center justify-center gap-3 leading-[0.9]">
                                Who needs opencharge?</h2>
                            <p class="text-secondary-foreground/90 text-sm md:text-lg text-center mb-4 leading-[1.3]">
                                Fintech is fragmented. Every api integration is a new silo. <br /> Opencharge attempts
                                to bring some comformity into the industry.</p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-8 max-w-5xl mx-auto">
                                <div class="border text-card-foreground border-dashed border-foreground backdrop-blur-sm shadow-none rounded-lg flex flex-col overflow-hidden bg-background"
                                    style="border-width: 1px; padding: 16px; box-sizing: border-box; max-height: 150px;">
                                    <div class="text-[16px] font-normal leading-4.5 wrap-break-word text-foreground">
                                        <span class="font-bold">Merchants.</span> Accept payments from any provider on
                                        the network — one integration, every wallet and gateway.
                                    </div>
                                    <div class="flex items-center justify-end mt-4 mr-2"><svg width="200"
                                            height="100" viewBox="0 0 200 100">
                                            <defs>
                                                <filter id="modalShadow" x="-20%" y="-20%" width="140%"
                                                    height="140%">
                                                    <feDropShadow dx="0" dy="4" stdDeviation="6"
                                                        flood-color="#000" flood-opacity="0.2"></feDropShadow>
                                                </filter>
                                            </defs>
                                            <rect x="0" y="10" width="200" height="90" rx="4"
                                                ry="4" fill="hsl(var(--foreground))" fill-opacity="0.15">
                                            </rect>
                                            <rect x="42" y="2" width="116" height="76" rx="6"
                                                ry="6" fill="#ffffff" stroke="hsl(var(--foreground))"
                                                stroke-width="1.5" filter="url(#modalShadow)"></rect>
                                            <rect x="52" y="12" width="12" height="12" rx="2"
                                                fill="hsl(var(--foreground))" fill-opacity="0.3"
                                                stroke="hsl(var(--foreground))" stroke-width="1"></rect>
                                            <line x1="72" y1="18" x2="120" y2="18"
                                                stroke="hsl(var(--foreground))" stroke-width="2"
                                                stroke-linecap="round">
                                            </line>
                                            <rect x="52" y="36" width="96" height="14" rx="2"
                                                fill="none" stroke="hsl(var(--foreground))" stroke-width="1"
                                                stroke-opacity="0.6"></rect>
                                            <rect x="52" y="56" width="96" height="14" rx="2"
                                                fill="hsl(var(--foreground))" fill-opacity="0.8"></rect>
                                        </svg></div>
                                </div>
                                <div class="border text-card-foreground border-dashed border-foreground backdrop-blur-sm shadow-none rounded-lg flex flex-col overflow-hidden bg-background"
                                    style="border-width: 1px; padding: 16px; box-sizing: border-box; max-height: 150px;">
                                    <div
                                        class="text-[16px] font-normal leading-4.5 wrap-break-word text-foreground mb-2">
                                        <span class="font-bold">Payment gateways.</span> Instantly connect to new
                                        merchants and services — no custom integrations required.
                                    </div>
                                    <div class="mt-2"><svg width="100%" height="32" viewBox="0 0 100 24"
                                            preserveAspectRatio="none" style="display: block;">
                                            <polyline fill="none" stroke="hsl(var(--foreground))" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                points="0,20 10,15 20,18 30,10 40,14 50,8 60,12 70,6 80,10 90,4 100,8">
                                            </polyline>
                                        </svg></div>
                                </div>
                                <div class="border text-card-foreground border-dashed border-foreground backdrop-blur-sm shadow-none rounded-lg flex flex-col overflow-hidden bg-background"
                                    style="border-width: 1px; padding: 16px; box-sizing: border-box; max-height: 150px;">
                                    <div class="text-[16px] font-normal leading-4.5 wrap-break-word text-foreground">
                                        <span class="font-bold">Remittance.</span> Collect and settle cross-border
                                        transfers worldwide through a single API connection.
                                    </div>
                                    <div class="flex flex-col items-start mt-4 gap-2">
                                        <div class="flex items-center gap-2">
                                            <div
                                                style="display: inline-flex; align-items: center; justify-content: center; padding: 6px 16px; height: 32px; border-radius: 16px; background-color: hsl(var(--foreground) / 0.1); backdrop-filter: blur(4px); border: 1px solid hsl(var(--foreground)); font-size: 14px; font-family: var(--font-sans); font-weight: bold; color: hsl(var(--foreground)); white-space: nowrap; pointer-events: none;">
                                                See the docs</div>
                                            <div class="flex items-center justify-center rounded-full"
                                                style="width: 24px; height: 24px; border: 1px solid hsl(var(--foreground)); background-color: hsl(var(--foreground) / 0.1); backdrop-filter: blur(4px);">
                                                <x-lucide-arrow-right stroke="hsl(var(--foreground))"
                                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                                    class="w-3.5 h-3.5" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border text-card-foreground border-dashed border-foreground backdrop-blur-sm shadow-none rounded-lg flex flex-col overflow-hidden bg-background"
                                    style="border-width: 1px; padding: 16px; box-sizing: border-box; max-height: 150px;">
                                    <div class="text-[16px] font-normal leading-4.5 wrap-break-word text-foreground">
                                        <span class="font-bold">Wallets.</span> Unlock cross-gateway payments so your
                                        users can transact with any merchant on the network.
                                    </div>
                                    <div class="flex items-center justify-end gap-0 mt-2 -mr-3">
                                        <svg width="50" height="60" viewBox="0 0 50 60">
                                            <line x1="0" y1="30" x2="50" y2="30"
                                                stroke="hsl(var(--foreground) / 0.3)" stroke-width="2"
                                                stroke-linecap="round" stroke-dasharray="4 4"></line>
                                        </svg>
                                        <div class="rounded-md p-3"
                                            style="background-color: hsl(var(--foreground) / 0.25); border: 1.5px solid hsl(var(--foreground)); box-shadow: rgba(0, 0, 0, 0.5) 0px 4px 6px;">
                                            <div
                                                style="width: 80px; height: 80px; position: relative; mask-image: url(&quot;/svgs/connect.svg&quot;); mask-size: contain; mask-repeat: no-repeat; mask-position: center center; background-color: hsl(var(--foreground)); opacity: 0.8;">
                                            </div>
                                        </div>
                                        <svg width="50" height="60" viewBox="0 0 50 60">
                                            <line x1="0" y1="30" x2="50" y2="30"
                                                stroke="hsl(var(--foreground) / 0.3)" stroke-width="2"
                                                stroke-linecap="round" stroke-dasharray="4 4"></line>
                                        </svg>
                                    </div>
                                </div>
                                <div class="border text-card-foreground border-dashed border-foreground backdrop-blur-sm shadow-none rounded-lg flex flex-col overflow-hidden bg-background"
                                    style="border-width: 1px; padding: 16px; box-sizing: border-box; max-height: 150px;">
                                    <div class="text-[16px] font-normal leading-4.5 wrap-break-word text-foreground">
                                        <span class="font-bold">AML services.</span> Plug into the network as a
                                        compliance provider — merchants and gateways discover and call your KYC/AML
                                        checks directly.
                                    </div>
                                    <div class="flex items-center justify-end mt-3 mr-2"><svg width="160"
                                            height="60" viewBox="0 0 160 60">
                                            <rect x="0" y="8" width="60" height="44" rx="6"
                                                ry="6" fill="none" stroke="hsl(var(--foreground))"
                                                stroke-width="1.5" stroke-opacity="0.6"></rect>
                                            <line x1="10" y1="22" x2="50" y2="22"
                                                stroke="hsl(var(--foreground))" stroke-width="1.5"
                                                stroke-linecap="round" stroke-opacity="0.4"></line>
                                            <line x1="10" y1="30" x2="40" y2="30"
                                                stroke="hsl(var(--foreground))" stroke-width="1.5"
                                                stroke-linecap="round" stroke-opacity="0.4"></line>
                                            <line x1="10" y1="38" x2="45" y2="38"
                                                stroke="hsl(var(--foreground))" stroke-width="1.5"
                                                stroke-linecap="round" stroke-opacity="0.4"></line>
                                            <line x1="68" y1="30" x2="92" y2="30"
                                                stroke="hsl(var(--foreground) / 0.3)" stroke-width="2"
                                                stroke-linecap="round" stroke-dasharray="4 4"></line>
                                            <circle cx="130" cy="30" r="22" fill="none"
                                                stroke="hsl(var(--foreground))" stroke-width="1.5"></circle>
                                            <polyline points="121,30 127,36 140,23" fill="none"
                                                stroke="hsl(var(--foreground))" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"></polyline>
                                        </svg></div>
                                </div>
                                <div class="border text-card-foreground border-dashed border-foreground backdrop-blur-sm shadow-none rounded-lg flex flex-col overflow-hidden bg-background"
                                    style="border-width: 1px; padding: 16px; box-sizing: border-box; max-height: 150px;">
                                    <div class="text-[16px] font-normal leading-4.5 wrap-break-word text-foreground">
                                        <span class="font-bold">AI agents.</span> Enable autonomous agents discover,
                                        negotiate, and execute payments across the network — machine-to-machine.
                                    </div>
                                    <div class="flex items-center justify-end mt-3 mr-2"><svg width="120"
                                            height="70" viewBox="0 0 120 70">
                                            <circle cx="35" cy="28" r="14" fill="none"
                                                stroke="hsl(var(--foreground))" stroke-width="1.5"></circle>
                                            <circle cx="31" cy="24" r="2" fill="hsl(var(--foreground))"
                                                fill-opacity="0.6"></circle>
                                            <circle cx="39" cy="24" r="2" fill="hsl(var(--foreground))"
                                                fill-opacity="0.6"></circle>
                                            <path d="M29 32 Q35 37 41 32" fill="none"
                                                stroke="hsl(var(--foreground))" stroke-width="1.5"
                                                stroke-linecap="round" stroke-opacity="0.6"></path>
                                            <line x1="35" y1="14" x2="35" y2="8"
                                                stroke="hsl(var(--foreground))" stroke-width="1.5"
                                                stroke-opacity="0.5"></line>
                                            <circle cx="35" cy="6" r="2" fill="hsl(var(--foreground))"
                                                fill-opacity="0.4"></circle>
                                            <line x1="49" y1="28" x2="71" y2="28"
                                                stroke="hsl(var(--foreground) / 0.3)" stroke-width="2"
                                                stroke-linecap="round" stroke-dasharray="4 4"></line>
                                            <circle cx="85" cy="28" r="14" fill="none"
                                                stroke="hsl(var(--foreground))" stroke-width="1.5"></circle>
                                            <circle cx="81" cy="24" r="2" fill="hsl(var(--foreground))"
                                                fill-opacity="0.6"></circle>
                                            <circle cx="89" cy="24" r="2" fill="hsl(var(--foreground))"
                                                fill-opacity="0.6"></circle>
                                            <path d="M79 32 Q85 37 91 32" fill="none"
                                                stroke="hsl(var(--foreground))" stroke-width="1.5"
                                                stroke-linecap="round" stroke-opacity="0.6"></path>
                                            <line x1="85" y1="14" x2="85" y2="8"
                                                stroke="hsl(var(--foreground))" stroke-width="1.5"
                                                stroke-opacity="0.5"></line>
                                            <circle cx="85" cy="6" r="2" fill="hsl(var(--foreground))"
                                                fill-opacity="0.4"></circle>
                                        </svg></div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="flex flex-col sm:flex-row items-center justify-center gap-3 ">
                                    <a class="inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium transition-colors focus-visible:outline-hidden focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 cursor-pointer [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground shadow-sm hover:bg-primary/90 h-10 rounded-md px-8 text-base leading-[1.4]"
                                        href="{{ route('create-ocid') }}" wire:navigate>Publish your Api endpoints</a>
                                    <a class="inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium transition-colors focus-visible:outline-hidden focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 cursor-pointer [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background shadow-xs hover:bg-accent hover:text-accent-foreground h-10 rounded-md px-8 text-base leading-[1.4]"
                                        href="https://docs.opencharge.network" target="_blank">Documentation</a>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>
