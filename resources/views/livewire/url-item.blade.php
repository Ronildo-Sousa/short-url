<div x-data="{ open: true }" class="flex flex-col mb-5 text-green-500 bg-gray-700 rounded hover:bg-gray-600">
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
            <span class="font-semibold text-white">Total views: </span>{{ $this->getNumViews() }}
        </p>

        <div class="flex">
            <x-buttons.secondary-button x-on:click="open = !open" class="mr-2">
                <x-icons.open-eye x-show="!open" class="w-5 h-5" />
                <x-icons.closed-eye x-show="open" class="w-5 h-5" />
            </x-buttons.secondary-button>

            <x-buttons.danger-button wire:click='deleteURL'>
                <x-icons.trash class="w-5 h-5" />
            </x-buttons.danger-button>
        </div>
    </div>
    <div x-show="open" class="flex justify-around p-2">
        <p>
            <span class="font-semibold text-white">{{ __('Last view: ') }} </span>
            20/08/2002 13:80
        </p>
        <p>
            <span class="font-semibold text-white">{{ __("Today's views: ") }} </span>
            20
        </p>
        <p>
            <span class="font-semibold text-white">{{ __("This week's views: ") }} </span>
            20
        </p>
    </div>
</div>
