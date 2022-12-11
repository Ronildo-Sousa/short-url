<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-end mb-2 cursor-pointer">
                    <span wire:click="$emit('refresh-page')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </span>
                </div>
                @if (count(Auth::user()->urls) > 0)
                    <div class="flex justify-between w-4/5 mb-2 font-semibold">
                        <p>{{ __('Short URL') }}</p>
                        <p class="ml-5">{{ __('Full URL') }}</p>
                        <p class="ml-5">{{ __('Views') }}</p>
                    </div>

                    @foreach ($urls as $url)
                        <livewire:url-item :key="time() . $url->id" :url="$url" />
                    @endforeach
                @else
                    <p>You don't have any url</p>
                @endif
            </div>
        </div>
    </div>
</div>
