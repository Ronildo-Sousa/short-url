<section>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current hover:text-gray-600" />
            </a>
        </x-slot>
   
        <div class="mt-4">
            <x-inputs.input-label for="url" :value="__('URL')" />
            <x-inputs.text-input wire:model='url' id="url" name="url" type="url" class="block w-full mt-1"
                :placeholder="__('your URL here...')" autofocus />
            <x-inputs.input-error :messages="$errors->get('url')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-inputs.input-label for="customCode" class="mb-2" :value="__('Custom Code (optional)')" />
            <div class="flex items-center">
                <p class="text-lg font-medium text-white">{{ config('app.url') . '/' }}</p>
                <x-inputs.text-input wire:model='customCode' id="customCode" name="customCode" type="text" class="w-full"
                    :placeholder="__('your-code')" autofocus />
            </div>
            <x-inputs.input-error :messages="$errors->get('customCode')" class="mt-2" />
        </div>

        <div class="mt-4 text-center">
            <x-buttons.primary-button wire:click='create'>
                {{ __('Short') }}
            </x-buttons.primary-button>
        </div>
            <div x-data="{shortUrl: @entangle('shortUrl'), copied: false }" class="flex items-center justify-between p-2 mt-5 mb-2 text-white bg-green-600 rounded">
                <div>
                    <p>
                        {{ $shortUrl }}
                    </p>

                </div>
                <p x-on:click="$clipboard(shortUrl)"  class="flex items-center justify-center w-10 p-1 border-2 border-green-700 border-solid rounded">
                    <x-icons.copy class="w-5 h-5 cursor-pointer hover:text-gray-600" />
                </p>
            </div>
    </x-auth-card>
</section>
