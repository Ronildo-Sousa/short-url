<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

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
