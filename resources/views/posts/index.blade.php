<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            게시판
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-4 text-green-600">{{ session('success') }}</div>
                @endif

                <div class="mb-4">
                    <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">글쓰기</a>
                </div>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">번호</th>
                            <th class="py-2">제목</th>
                            <th class="py-2">작성일</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                        <tr class="border-b">
                            <td class="py-2">{{ $post->id }}</td>
                            <td class="py-2">
                                <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500">{{ $post->title }}</a>
                            </td>
                            <td class="py-2">{{ $post->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="py-4 text-center text-gray-500">게시글이 없습니다.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $posts->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
