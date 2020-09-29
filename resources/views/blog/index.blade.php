<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl mx-auto sm:rounded-lg relative px-8">
                <a href="{{ route('blog.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded absolute top-10 right-10">
                    New Blog
                </a>
                <table class="table-fixed mx-auto m-32">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="w-1/4 px-4 py-2">Title</th>
                            <th class="w-1/4 px-4 py-2">Slug</th>
                            <th class="px-4 py-2">Views</th>
                            <th class="w-1/8 px-4 py-2">Created</th>
                            <th class="w-1/8 px-4 py-2">Published</th>
                            <th class="w-1/4 px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($blogs))
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td class="border px-4 py-2">{{ $blog->id }}</td>
                                    <td class="border px-4 py-2">{{ $blog->title }}</td>
                                    <td class="border px-4 py-2">{{ $blog->slug }}</td>
                                    <td class="border px-4 py-2">{{ $blog->user_id }}</td>
                                    <td class="border px-4 py-2">{{ $blog->created_at->diffForHumans() }}</td>
                                    <td class="border px-4 py-2">
                                        @if ($blog->published_at)
                                            {{ $blog->published_at->diffForHumans() }}
                                        @else
                                            Not Yet Published
                                        @endif

                                    </td>
                                    <td class="border px-4 py-4">
                                        <form action="{{ route('blog.publish', $blog) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ">Publish</button>
                                        </form>

                                        <a class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded "
                                            href=" {{ route('blog.edit', $blog) }}">Edit</a>
                                        <form action="{{ route('blog.destroy', $blog) }}" method="POST" class="inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        @else

                            <tr class="bg-yellow-100 p-8 text-center">
                                <td colspan="7"> You have not created any blogs.</td>
                            </tr>

                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
