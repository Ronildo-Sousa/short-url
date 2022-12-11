<nav>
    @if (Route::has('login'))
        @if (!auth()->user())
            <div class="fixed top-0 right-0 flex items-center justify-between w-full px-6 py-2 mb-4 bg-gray-800">
                <a href="/">
                    <x-application-logo class="w-10 h-10 text-gray-500 fill-current hover:text-gray-600" />
                </a>
                <div>
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline hover:text-gray-600 dark:text-gray-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 underline hover:text-gray-600 dark:text-gray-500">Register</a>
                    @endif
                </div>
            </div>
        @endif
    @endif
</nav>
