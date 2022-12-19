<section>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current hover:text-gray-600" />
            </a>
        </x-slot>
        <div x-data="{ withCustomCode: false }">
            <div class="mt-4">
                <div class="flex justify-between">
                    <x-inputs.input-label for="url" :value="__('URL')" />
                    <div class="mb-2 text-white">
                        <input x-on:click="withCustomCode = !withCustomCode" type="checkbox" class="active:outline-none"
                            id="withCustomCode">
                        <label for="withCustomCode">{{ __('with custom code') }}</label>
                    </div>
                </div>
                <x-inputs.text-input wire:model='url' id="url" name="url" type="url"
                    class="block w-full mt-1" :placeholder="__('your URL here...')" autofocus />
                <x-inputs.input-error :messages="$errors->get('url')" class="mt-2" />
            </div>

            <div x-show="withCustomCode" class="mt-4">
                <div class="flex items-center">
                    <p class="text-lg font-medium text-white"> {{ config('app.url') . '/' }} </p>
                    <x-inputs.text-input wire:model='customCode' id="customCode" name="customCode" type="text"
                        class="w-full" :placeholder="__('your-code')" autofocus />
                </div>
                <x-inputs.input-error :messages="$errors->get('customCode')" class="mt-2" />
            </div>
        </div>

        <div class="mt-4 text-center">
            <x-buttons.primary-button wire:click='create'>
                {{ __('Short') }}
            </x-buttons.primary-button>
        </div>
        @if (!$shortUrl)
            <div x-data="{ shortUrl: @entangle('shortUrl'), copied: false }"
                class="flex items-center justify-between p-2 mt-5 mb-2 text-white bg-green-600 rounded">
                <div>
                    <p>
                        {{ $shortUrl }}
                    </p>

                </div>
                <p x-on:click="$clipboard(shortUrl)"
                    class="flex items-center justify-center w-10 p-1 border-2 border-green-700 border-solid rounded">
                    <x-icons.copy class="w-5 h-5 cursor-pointer hover:text-gray-600" />
                </p>
            </div>
            <div class="flex justify-center">
                <div class="flex justify-around w-1/2 p-2 bg-gray-100 rounded">
                    <p>{!! $qrCode !!}</p>
                    <div class="flex items-end">
                        <x-icons.download  />
                    </div>
                </div>
            </div>
        @endif
    </x-auth-card>
</section>
