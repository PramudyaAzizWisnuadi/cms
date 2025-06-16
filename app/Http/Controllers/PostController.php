<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Event;
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

        $posts = $query->paginate(4); // Gunakan query builder yang sudah diinisialisasi
        $categories = Category::all(); // Ambil semua kategori
        $sosial = Sosial::first();
        $events = Event::whereDate('end_date', '>=', Carbon::today())->orderBy('created_at')->get();
        return view('blog.list', compact('posts', 'categories', 'sosial', 'events'));
    }

    public function show($slug)
    {
        $posts = Post::where('slug', $slug)->where('status', 'published')->firstOrFail(); // Tambahkan kondisi status published
        $sosial = Sosial::first();
        $events = Event::whereDate('end_date', '>=', Carbon::today())->orderBy('created_at')->get();
        return view('blog.detail', compact('posts', 'sosial', 'events'));
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
        $events = Event::whereDate('end_date', '>=', Carbon::today())->orderBy('created_at')->get();
        return view('blog.list', compact('posts', 'categories', 'sosial', 'events'));
    }
}
