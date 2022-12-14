<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @if (count($urls) > 0)
                    <div x-data="{ clicked: false }" @refresh-page="clicked = true"
                        class="flex justify-end mb-2 cursor-pointer">
                        <span wire:click="$emit('refresh-page')"
                            x-effect="if(clicked) { setTimeout(() => {clicked = false}, 2000)}"
                            x-on:click="$dispatch('refresh-page')">
                            <template x-if="!clicked">
                                <x-icons.refresh class="w-6 h-6 hover:text-gray-500" />
                            </template>
                            <template x-if="clicked">
                                <x-icons.refresh class="w-6 h-6 hover:text-gray-500 animate-refresh" />
                            </template>
                        </span>
                    </div>

                    <x-url-list :urls="$urls" />
                @else
                    <p>You don't have any url</p>
                @endif
            </div>
        </div>
    </div>
</div>
