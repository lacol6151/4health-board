<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // 게시글 목록
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    // 게시글 작성 폼
    public function create()
    {
        return view('posts.create');
    }

    // 게시글 저장
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', '게시글이 작성되었습니다.');
    }

    // 게시글 상세
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    // 게시글 수정 폼
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    // 게시글 수정 저장
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->only('title', 'content'));

        return redirect()->route('posts.show', $post->id)->with('success', '게시글이 수정되었습니다.');
    }

    // 게시글 삭제
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', '게시글이 삭제되었습니다.');
    }
}