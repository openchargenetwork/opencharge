@if ($paginator->hasPages())
    <nav aria-label="pagination" class="mx-auto flex w-full justify-center mt-12 mb-24">
        <ul class="flex flex-row items-center gap-1">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-9 px-4 py-2 gap-1 pl-2.5 pointer-events-none opacity-50 text-muted-foreground" aria-disabled="true" aria-label="Go to previous page">
                    <x-lucide-chevron-left class="size-4" aria-hidden="true" />
                    <span>Previous</span>
                </span>
            @else
                <button wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors cursor-pointer hover:bg-accent hover:text-accent-foreground h-9 px-4 py-2 gap-1 pl-2.5 focus-visible:outline-hidden focus-visible:ring-1 focus-visible:ring-ring" aria-label="Go to previous page" rel="prev">
                    <x-lucide-chevron-left class="size-4" aria-hidden="true" />
                    <span>Previous</span>
                </button>
            @endif

            {{-- Page Numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span aria-hidden="true" class="inline-flex h-9 w-9 items-center justify-center">
                        <x-lucide-ellipsis class="size-4" aria-hidden="true" />
                        <span class="sr-only">More pages</span>
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium h-9 w-9 bg-primary text-primary-foreground">
                                {{ $page }}
                            </span>
                        @else
                            <button wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors cursor-pointer hover:bg-accent hover:text-accent-foreground h-9 w-9 focus-visible:outline-hidden focus-visible:ring-1 focus-visible:ring-ring">
                                {{ $page }}
                            </button>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <button wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors cursor-pointer hover:bg-accent hover:text-accent-foreground h-9 px-4 py-2 gap-1 pr-2.5 focus-visible:outline-hidden focus-visible:ring-1 focus-visible:ring-ring" aria-label="Go to next page" rel="next">
                    <span>Next</span>
                    <x-lucide-chevron-right class="size-4" aria-hidden="true" />
                </button>
            @else
                <span class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-9 px-4 py-2 gap-1 pr-2.5 pointer-events-none opacity-50 text-muted-foreground" aria-disabled="true" aria-label="Go to next page">
                    <span>Next</span>
                    <x-lucide-chevron-right class="size-4" aria-hidden="true" />
                </span>
            @endif
        </ul>
    </nav>
@endif
