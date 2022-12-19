<div x-data="{ open: false }" class="flex flex-col mb-5 text-green-500 bg-gray-700 rounded hover:bg-gray-600">
    <div class="flex items-center justify-between p-3">
        <div class="flex flex-col w-full sm:p-2 sm:flex-row sm:justify-around">
            <div>
                <span class="font-semibold text-white">Short URL: </span>
                <a href="{{ config('app.url') . '/' . $url->code }}" target="_blank" class="hover:text-blue-500">
                    {{ $shortUrl }}
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
        </div>
        <div class="flex flex-col items-center justify-center md:flex-row">
            <x-buttons.secondary-button x-on:click="open = !open" class="mb-2 md:mb-0 md:mr-2">
                <x-icons.open-eye x-show="!open" class="w-5 h-5" />
                <x-icons.closed-eye x-show="open" class="w-5 h-5" />
            </x-buttons.secondary-button>

            <x-buttons.secondary-button class="mb-2 md:mb-0 md:mr-2">
                <a href="{{ route('history', $url->id) }}">
                    <x-icons.graph />
                </a>
            </x-buttons.secondary-button>

            <x-buttons.secondary-button class="mb-2 md:mb-0 md:mr-2">
                <a href="{{ $qrCode }}" download>
                    <x-icons.qrcode />
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
