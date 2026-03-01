<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            게시글 수정
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('posts.update', $post->id) }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">제목</label>
                        <input type="text" name="title" value="{{ old('title', $post->title) }}"
                            class="w-full border rounded px-3 py-2">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">내용</label>
                        <textarea name="content" rows="10"
                            class="w-full border rounded px-3 py-2">{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">수정완료</button>
                        <a href="{{ route('posts.show', $post->id) }}" class="bg-gray-300 px-4 py-2 rounded">취소</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>