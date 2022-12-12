<div class="flex items-center justify-between p-3 mb-4 bg-gray-700 rounded hover:bg-gray-600">
    <a href="{{ config('app.url') . '/' . $url->code }}" target="_blank" class="hover:text-blue-500">
        {{ config('app.url') . '/' . $url->code }}
    </a>

    <a href="{{ $url->target_url }}" class="hover:text-blue-500">
        {{ $this->formatedURL($url->target_url) }}
    </a>

    <p>{{ $this->getNumViews() }}</p>

    <x-buttons.danger-button wire:click='deleteURL'>
        <x-icons.trash class="w-5 h-5" />
    </x-buttons.danger-button>
</div>
