<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    
    public function index(): View
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    //create
    public function create(): View
    {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // dd('store');
        $validated = $request->validate([
            'title' => ['required', 'max:50'],
            'body' => ['required'],
        ]);
        $item = Post::create($validated);
        return redirect(route('posts.index'))->with('success', 'Post created.');
    }

    public function show(Post $post)
    {
        
    }

    //edit
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    //update
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:50'],
            'body' => ['required'],
        ]); 
        $post->update($validated);
        return redirect(route('posts.index'))->with('success', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('posts.index'))->with('success', 'Post deleted.');
    }
}
