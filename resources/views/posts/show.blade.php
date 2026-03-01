<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            게시글 상세
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-4 text-green-600">{{ session('success') }}</div>
                @endif

                <h3 class="text-xl font-bold mb-2">{{ $post->title }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ $post->created_at->format('Y-m-d H:i') }}</p>
                <div class="mb-6 whitespace-pre-line">{{ $post->content }}</div>

                <div class="flex gap-2">
                    <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-400 text-white px-4 py-2 rounded">수정</a>

                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded"
                            onclick="return confirm('삭제하시겠습니까?')">삭제</button>
                    </form>

                    <a href="{{ route('posts.index') }}" class="bg-gray-300 px-4 py-2 rounded">목록</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>