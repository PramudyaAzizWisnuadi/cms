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

class HomeController extends Controller
{
    public function index()
    {

        $data = Post::where('status', 'published')->latest()->paginate(4);
        $sosial = Sosial::first();
        $logo = Logo::all();
        $landingpage = LandingPage::first();
        $timelines = Timeline::all();
        $visi = VisiMisi::where('type', 'visi')->get();
        $misi = VisiMisi::where('type', 'misi')->get();
        $events = Event::whereDate('end_date', '>=', Carbon::today())->orderBy('created_at')->get();
        return view('welcome', compact('data', 'sosial', 'landingpage', 'logo', 'timelines', 'visi', 'misi', 'events'));
    }
}
