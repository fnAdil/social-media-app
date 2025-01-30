<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'description' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image'],
        ]);

        $imagePath = $request->file('image')->store('uploads', 'public');

        auth()->user()->posts()->create([
            'description' => $data['description'],
            'image' => $imagePath,
        ]);

        return redirect()->route('profile.show', ['user' => auth()->user()]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
