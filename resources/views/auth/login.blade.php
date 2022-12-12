<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-inputs.input-label for="email" :value="__('Email')" />
                <x-inputs.text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                    :placeholder="'your email here...'" required autofocus />
                <x-inputs.input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-inputs.input-label for="password" :value="__('Password')" />

                <x-inputs.text-input id="password" class="block w-full mt-1" type="password" name="password" :placeholder="'your password here...'"
                    required autocomplete="current-password" />

                <x-inputs.input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-buttons.primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-buttons.primary-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
