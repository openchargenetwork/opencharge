<x-layouts::app.base :title="$title ?? null">
    <flux:main>
        {{ $slot }}
    </flux:main>
</x-layouts::app.base>
