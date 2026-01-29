@props(['ocid'])

<a
    href="{{ route('directory.show', $ocid->ocid) }}"
    {{ $attributes->merge(['class' => 'group block rounded-xl border border-zinc-200 bg-white p-5 transition-all duration-300 hover:-translate-y-1 hover:border-blue-300 hover:shadow-lg dark:border-zinc-700 dark:bg-zinc-800 dark:hover:border-blue-600']) }}
>
    <div class="mb-4 flex items-start gap-4">
        @if ($ocid->icon)
            <img
                src="{{ $ocid->icon }}"
                alt="{{ $ocid->name }}"
                class="size-12 rounded-lg object-cover transition-transform group-hover:scale-105"
            />
        @else
            <div class="flex size-12 items-center justify-center rounded-lg bg-zinc-100 transition-transform group-hover:scale-105 dark:bg-zinc-700">
                <flux:icon.user class="size-6 text-zinc-400" />
            </div>
        @endif

        <div class="min-w-0 flex-1">
            <h3 class="truncate font-semibold text-zinc-900 dark:text-white">
                {{ $ocid->name }}
            </h3>
            <x-directory.type-badge :type="$ocid->type" size="sm" />
        </div>
    </div>

    @if ($ocid->profile)
        <p class="mb-4 line-clamp-2 text-sm text-zinc-600 dark:text-zinc-400">
            {{ $ocid->profile }}
        </p>
    @endif

    @if (count($ocid->capabilities) > 0)
        <div class="flex flex-wrap gap-1">
            @foreach (array_slice($ocid->capabilities, 0, 3) as $capability)
                <x-directory.capability-badge :capability="$capability" size="sm" />
            @endforeach
            @if (count($ocid->capabilities) > 3)
                <span class="inline-flex items-center rounded px-2 py-0.5 text-xs text-zinc-500">
                    +{{ count($ocid->capabilities) - 3 }} more
                </span>
            @endif
        </div>
    @endif
</a>
