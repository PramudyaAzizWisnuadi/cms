<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'published')->latest()->get();
        $categories = Category::where('status', 'active')->get();

        $content = view('sitemap.index', compact('posts', 'categories'))->render();

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}
