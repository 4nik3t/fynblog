<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex justify-center items-center">
                <form class="w-full max-w-lg p-8" action="{{ route('blog.update',$blog) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-first-name">
                                Title
                            </label>
                            <input name="title"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-first-name" type="text" placeholder="Jane" value="{{ $blog->title }}">
                        </div>
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-last-name">
                                Content
                            </label>
                            <textarea
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border 
                                border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                rows="10" name="content">{{ $blog->content }}</textarea>
                        </div>
                        <div class="w-full px-3 flex justify-center">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 mt-5 px-4 rounded">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
