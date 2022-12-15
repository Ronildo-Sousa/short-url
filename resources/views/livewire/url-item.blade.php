<div x-data="{ open: false }" class="flex flex-col mb-5 text-green-500 bg-gray-700 rounded hover:bg-gray-600">
    <div class="flex items-center justify-between p-3 ">
        <div>
            <span class="font-semibold text-white">Short URL: </span>
            <a href="{{ config('app.url') . '/' . $url->code }}" target="_blank" class="hover:text-blue-500">
                {{ config('app.url') . '/' . $url->code }}
            </a>
        </div>
        <div>
            <span class="font-semibold text-white">Full URL: </span>
            <a href="{{ $url->target_url }}" class="hover:text-blue-500">
                {{ $this->formatedURL($url->target_url) }}
            </a>
        </div>
        <p>
            <span class="font-semibold text-white">Total views: </span>{{ $url->totalViews() }}
        </p>

        <div class="flex">
            <x-buttons.secondary-button x-on:click="open = !open" class="mr-2">
                <x-icons.open-eye x-show="!open" class="w-5 h-5" />
                <x-icons.closed-eye x-show="open" class="w-5 h-5" />
            </x-buttons.secondary-button>

            <x-buttons.secondary-button class="mr-2">
                <a href="{{ route('history',$url->id)}}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                    </svg>
                </a>
            </x-buttons.secondary-button>

            <x-buttons.danger-button wire:click='deleteURL'>
                <x-icons.trash class="w-5 h-5" />
            </x-buttons.danger-button>
        </div>
    </div>
    <div x-show="open" class="flex justify-around p-2">
        <p>
            <span class="font-semibold text-white">{{ __('Last view: ') }} </span>
            {{ $this->getLatestView() ?? __('No views') }}
        </p>
        <p>
            <span class="font-semibold text-white">{{ __("Today's views: ") }} </span>
            {{ $url->todayViews() }}
        </p>
        <p>
            <span class="font-semibold text-white">{{ __("This week's views: ") }} </span>
            {{ $url->weekViews() }}
        </p>
        <p>
            <span class="font-semibold text-white">{{ __("This month's views: ") }} </span>
            {{ $url->monthViews(now()->month) }}
        </p>
    </div>
</div>
