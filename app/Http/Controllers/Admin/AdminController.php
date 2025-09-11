<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Galery;
use App\Models\Logo;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'posts' => Post::count(),
            'categories' => Category::count(),
            'galleries' => Galery::count(),
            'logos' => Logo::count(),
            'tags' => Tag::count(),
            'users' => User::count(),
            'recent_posts' => Post::latest()->take(5)->get(),
            'recent_galleries' => Galery::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
