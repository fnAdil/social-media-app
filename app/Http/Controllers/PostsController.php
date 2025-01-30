<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Drivers\Gd\Driver;

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

        // Make images square
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