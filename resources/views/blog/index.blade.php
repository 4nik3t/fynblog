<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg relative">
                <a href="{{ route('blog.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded absolute top-10 right-10">
                    New Blog
                </a>
                <table class="table-auto mx-auto m-20">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Views</th>
                            <th class="px-4 py-2">Created At</th>
                            <th class="px-4 py-2">Published At</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                            <td class="border px-4 py-2">{{$blog->id}}</td>
                            <td class="border px-4 py-2">{{$blog->title}}</td>
                            <td class="border px-4 py-2">{{$blog->user_id}}</td>
                            <td class="border px-4 py-2">{{$blog->created_at->diffForHumans()}}</td>
                            <td class="border px-4 py-2">
                                @if ($blog->published_at)
                                    {{$blog->published_at->diffForHumans()}}
                                @else
                                    Not Yet Published
                                @endif
                                
                            </td>
                            <td class="border px-4 py-4">
                                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded " 
                                    href="{{route('blog.edit',$blog)}}">Edit</a>
                                <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded " 
                                    href="{{route('blog.destroy',$blog)}}">Delete</a>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>