<x-guest-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-4 lg:px-6">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex flex-col items-center">
                    <a href="{{ route('home') }}">
                        <img src="/logo.png" alt="Fyntune Logo" class="h-16 p-2">
                    </a>
                </div>
            </div>
        </div>
    </div>
    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
        @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
        @endif
        @endif
    </div>
    @endif
</x-guest-layout>