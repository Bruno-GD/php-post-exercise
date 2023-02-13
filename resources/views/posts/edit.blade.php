<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('post.post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="bg-white p-6 rounded-lg" method="POST" action="{{ route('post.update', $post->id) }}">
                        @csrf
                        @method('PUT')

                        <label class="block font-medium mb-2" for="title"> {{ __('post.title') }} </label>
                        <input class="w-full border border-gray-400 p-2 rounded-lg"
                               type="text" name="title" id="title" value="{{ $post->title }}"
                               placeholder="{{ __('post.ph_title') }}">

                        <label class="block font-medium mb-2 mt-4" for="subtitle"> {{ __('post.subtitle') }} </label>
                        <input class="w-full border border-gray-400 p-2 rounded-lg"
                               type="text" name="subtitle" id="subtitle" value="{{ $post->subtitle }}"
                               placeholder="{{ __('post.ph_subtitle') }}">

                        <label class="block font-medium mb-2 mt-4" for="content"> {{ __('post.content') }} </label>
                        <textarea class="w-full border border-gray-400 p-2 rounded-lg"
                                  name="content" id="content"
                                  placeholder="{{ __('post.ph_content') }}">{{ $post->content }}</textarea>

                        <div class="flex items-center mt-4">
                            @if($post->commentable)
                                <input type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600" id="commentable" name="commentable" checked>
                            @else
                                <input type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600" id="commentable" name="commentable">
                            @endif
                            <label for="commentable" class="ml-2 text-gray-700">{{ __('post.cb_commentable') }}</label>
                        </div>
                        <div class="flex items-center">
                            @if($post->expirable)
                                <input type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600" id="expirable" name="expirable" checked>
                            @else
                                <input type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600" id="expirable" name="expirable">
                            @endif
                            <label for="expirable" class="ml-2 text-gray-700">{{ __('post.cb_expirable') }}</label>
                        </div>

                        <div class="relative mt-1">
                            <label for="access">{{ __('post.access') }}</label>
                            <select id="access" name="access" value="{{ $post->private ? __('post.private') : __('post.public') }}" class="form-select w-48 py-2 px-3 text-base leading-4 rounded-md bg-white border border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                <option>{{ __('post.private') }}</option>
                                <option>{{ __('post.public') }}</option>
                            </select>
                        </div>

                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold mt-2 py-2 px-4 rounded"> {{ __('post.update') }} </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
