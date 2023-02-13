<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('post.index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">{{ session('status') }}</strong>
                        </div>
                    @endif
                    <h1>Lista de posts</h1>
                    <div class="container mx-auto">
                        <div class="flex flex-col">
                        @foreach($posts as $post)
                            <a class="bg-white border-b-2 border-gray-500 hover:border-gray-300 rounded-lg p-6 m-4" href="{{ route('post.show', $post->id) }}">
                                <h2 class="text-lg font-medium mb-2">{{ $post->title }}</h2>
                                <div class="text-gray-600">Por <span class="font-medium">{{ $post->user->name }}</span> - <span class="font-medium">{{ $post->created_at }}</span></div>
                            </a>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
