<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use App\Models\Logo;
use App\Models\Post;
use App\Models\Sosial;
use App\Models\Timeline;
use App\Models\VisiMisi;
use App\Models\LandingPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        // Optimized database queries with caching and eager loading
        $data = Cache::remember('homepage_posts', 300, function () {
            return Post::select('id', 'title', 'slug', 'body', 'thumbnail', 'created_at')
                ->where('status', 'published')
                ->with(['category:id,name', 'tags:id,name'])
                ->latest()
                ->take(4)
                ->get()
                ->map(function ($post) {
                    $post->body = Str::limit(strip_tags($post->body), 100);
                    return $post;
                });
        });

        $sosial = Cache::remember('homepage_sosial', 1800, function () {
            return Sosial::first();
        });

        $logo = Cache::remember('homepage_logos', 1800, function () {
            return Logo::select('id', 'name', 'image', 'thumbnail', 'deskripsi', 'facebook', 'wa', 'instagram', 'tiktok', 'maps')->get();
        });

        $landingpage = Cache::remember('homepage_landing', 1800, function () {
            return LandingPage::first();
        });

        $timelines = Cache::remember('homepage_timelines', 1800, function () {
            return Timeline::orderBy('created_at', 'desc')->get();
        });

        $visi = Cache::remember('homepage_visi', 1800, function () {
            return VisiMisi::where('type', 'visi')->get();
        });

        $misi = Cache::remember('homepage_misi', 1800, function () {
            return VisiMisi::where('type', 'misi')->get();
        });

        $events = Cache::remember('homepage_events', 600, function () {
            return Event::select('id', 'title', 'link', 'end_date')
                ->whereDate('end_date', '>=', Carbon::today())
                ->orderBy('end_date')
                ->take(5)
                ->get();
        });

        return view('welcome', compact('data', 'sosial', 'landingpage', 'logo', 'timelines', 'visi', 'misi', 'events'));
    }
}
