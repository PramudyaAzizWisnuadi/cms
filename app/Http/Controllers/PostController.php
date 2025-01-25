<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Sosial;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::where('status', 'published')->latest(); // Tambahkan kondisi status published

        if ($request->has('category')) {
            $query->where('category_id', $request->input('category'));
        }

        $posts = $query->paginate(5); // Gunakan query builder yang sudah diinisialisasi
        $categories = Category::all(); // Ambil semua kategori
        $sosial = Sosial::first();
        return view('blog.list', compact('posts', 'categories', 'sosial'));
    }

    public function show($slug)
    {
        $posts = Post::where('slug', $slug)->where('status', 'published')->firstOrFail(); // Tambahkan kondisi status published
        $sosial = Sosial::first();
        return view('blog.detail', compact('posts', 'sosial'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = Post::where('status', 'published') // Tambahkan kondisi status published
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', "%$query%")
                    ->orWhere('body', 'like', "%$query%");
            })
            ->latest()
            ->paginate(5);
        $categories = Category::all(); // Ambil semua kategori
        $sosial = Sosial::first();
        return view('blog.list', compact('posts', 'categories', 'sosial'));
    }
}
