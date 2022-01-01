<x-guest-layout>
    <div class="relative flex justify-center min-h-screen py-4 bg-gray-100 items-top dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="fixed top-0 right-0 hidden px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline dark:text-gray-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline dark:text-gray-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline dark:text-gray-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto text-center sm:px-6 lg:px-8">
            <h1 class="text-5xl"><a href="{{ route('dashboard') }}">VILEMAW</a></h1>

            <div class="inline-flex mt-4">
                <img class="w-32 border-2 shadow-xl" src="{{ \App\Models\Map::inRandomorder()->first()->image_path }}">
            </div>

            <p class="mt-4">
                <a href="https://developer.riotgames.com/docs/lol" target="_blank">Go to DOCS</a>
            </p>
        </div>
    </div>
</x-guest-layout>
