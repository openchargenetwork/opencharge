@props(['text', 'after' => false])

<div x-data="{
    text: @js($text),
    copied: false,
    hovered: false,
    async copy() {
        if (this.copied) return;
        try {
            await navigator.clipboard.writeText(this.text);
            this.copied = true;
            setTimeout(() => this.copied = false, 1000);
        } catch (e) {
            console.error('Failed to copy text: ', e);
        }
    }
}" @mouseenter="hovered = true" @mouseleave="hovered = false" @click.prevent="copy()"
    class="click-to-copy-wrapper flex items-center cursor-pointer relative" :class="{ 'copying': copied }">
    {{-- CSS for the Float Up Animation --}}
    <style>
        @keyframes floatup {
            20% {
                opacity: 0.999;
            }

            100% {
                transform: translate3d(-50%, -17px, 0);
            }
        }

        .ctc-label {
            color: #d16c25;
            display: inline-block;
            font-size: 13px;
            line-height: 100%;
            position: relative;
            opacity: 0.999;
            transition: opacity 0.2s ease-in-out;
            top: -1px;
        }

        /* Equivalent to .hidden in your Vue CSS modules */
        .ctc-label.invisible-label {
            opacity: 0.001;
        }

        .ctc-label::after {
            content: attr(data-label);
            color: #d16c25;
            display: inline-block;
            position: absolute;
            top: -2px;
            left: 50%;
            opacity: 0.001;
            text-align: center;
            transform: translate3d(-50%, 0, 0);
            backface-visibility: hidden;
            white-space: nowrap;
        }

        /* Trigger animation when parent has .copying class */
        .click-to-copy-wrapper.copying .ctc-label::after {
            animation: floatup 0.5s ease-in-out;
        }
    </style>

    {{-- Label: Before --}}
    @if (!$after)
        <div data-label="Copied" x-cloak class="ctc-label ml-1 mr-1" :class="{ 'invisible-label': !hovered }">
            Copy
        </div>
    @endif

    {{-- Content Slot --}}
    <div class="font-medium mr-1 click-to-copy-text">
        {{ $slot }}
    </div>

    {{-- Label: After --}}
    @if ($after)
        <div data-label="Copied" x-cloak class="ctc-label ml-1 mr-1 font-semibold"
            :class="{ 'invisible-label': !hovered }">
            Copy
        </div>
    @endif
</div>
