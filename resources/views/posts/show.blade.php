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
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h1 class="text-2xl font-medium mb-2">{{ $post->title }}</h1>
                        <h2 class="text-lg font-medium mb-4">{{ $post->subtitle }}</h2>
                        <div class="text-gray-600 mb-4">
                            {{ __('post.written_by') }} <span class="font-medium">{{ $post->user->name }}</span> {{ __('post.written_on') }} <span class="font-medium">{{ $post->created_at }}</span>
                        </div>
                        <p>{{ $post->content }}</p>

                        @if($post->user_id == Auth::user()->id)
                        <div class="flex mt-4">
                            <a href="{{ route('post.edit', $post->id) }}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded mr-2">{{ trans('post.modify')  }}</a>
                            <a href="#"
                               onclick="event.preventDefault();document.getElementById('delete-form-{{$post->id}}').submit();"
                               class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">{{ trans('post.delete') }}</a>
                        </div>

                        <form id="delete-form-{{$post->id}}" action="{{route('post.destroy', $post->id)}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
