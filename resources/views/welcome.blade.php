<x-guest-layout>
    <div class="container px-8">
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

        <div class="mt-5 flex flex-row flex-wrap">
            <div class="container">
                <div class="w-1/3 px-3 mb-6 md:mb-0">
                    <form method="get">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-category">
                            Category
                        </label>
                        <select id="grid-category" name="category_id" onchange="this.form.submit()"
                            class="block mb-3 appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
            @foreach ($blogs as $blog)
                <div class="max-w-sm w-1/4 rounded overflow-hidden shadow-lg m-5 relative">
                    <a href="{{ route('single_blog_post', $blog->slug) }}" class="absolute top-0 left-0 h-full w-full"></a>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $blog->title }}</div>
                        <p class="text-gray-700 text-base">
                            {{ Str::limit($blog->content, 200) }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pb-20">
            {{ $blogs->withQueryString()->links() }}
        </div>
        </div>

    </x-guest-layout>
