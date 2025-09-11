<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'tags'])
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['author_id'] = Auth::id(); // Add author_id from authenticated user

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Create directory if not exists
            $uploadPath = storage_path('app/public');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Move file to storage directory
            $file->move($uploadPath, $filename);
            $data['thumbnail'] = $filename;
        }

        $post = Post::create($data);

        // Attach tags to post
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil dibuat!');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($post->thumbnail && file_exists(storage_path('app/public/' . $post->thumbnail))) {
                unlink(storage_path('app/public/' . $post->thumbnail));
            }

            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Create directory if not exists
            $uploadPath = storage_path('app/public/');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Move file to storage directory
            $file->move($uploadPath, $filename);
            $data['thumbnail'] = $filename;
        }

        $post->update($data);

        // Sync tags to post
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil diupdate!');
    }

    public function destroy(Post $post)
    {
        // Delete thumbnail if exists
        if ($post->thumbnail && file_exists(storage_path('app/public/' . $post->thumbnail))) {
            unlink(storage_path('app/public/' . $post->thumbnail));
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil dihapus!');
    }
}
