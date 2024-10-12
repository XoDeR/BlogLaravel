@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="mb-4">
                <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

                @auth
                    <form action="{{ route('posts.edit', $post) }}" method="post" class="mb-4">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="body" class="sr-only">Body</label>
                            <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                            placeholder="">{{ $post->body }}</textarea>

                            @error('body')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Save</button>
                        </div>
                    </form>
                @endauth

                <div class="flex items-center">
                    <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection