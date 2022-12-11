<section>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current hover:text-gray-600" />
            </a>
        </x-slot>
      
        <div class="mt-4">
            <x-input-label for="url" :value="__('URL')" />
            <x-text-input wire:model='url' id="url" name="url" type="url" class="block w-full mt-1"
                :placeholder="'your URL here...'" autofocus />
            <x-input-error :messages="$errors->get('url')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="customCode" class="mb-2" :value="__('Custom Code (optional)')" />
            <div class="flex items-center">
                <p class="text-lg font-medium text-white">{{ config('app.url') . '/' }}</p>
                <x-text-input wire:model='customCode' id="customCode" name="customCode" type="text" class="w-full"
                    :placeholder="'your-code'" autofocus />
            </div>
            <x-input-error :messages="$errors->get('customCode')" class="mt-2" />
        </div>

        <div class="mt-4 text-center">
            <x-primary-button wire:click='create'>
                {{ __('Short') }}
            </x-primary-button>
        </div>

        @if ($shortUrl)
            <div class="flex items-center justify-between p-2 mt-5 mb-2 text-white bg-green-600 rounded">
                <div class="overflow-x-scroll ">
                    <p>
                        {{ $shortUrl }}
                    </p>

                </div>
                <p class="flex items-center justify-center w-10 p-1 border-2 border-green-700 border-solid rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 cursor-pointer hover:text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
                    </svg>
                </p>
            </div>
        @endif
    </x-auth-card>
</section>
