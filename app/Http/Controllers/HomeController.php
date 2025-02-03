<?php

namespace App\Http\Controllers;

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

        $data = Post::latest()->paginate(4);
        $sosial = Sosial::first();
        $logo = Logo::all();
        $landingpage = LandingPage::first();
        $timelines = Timeline::all();
        $visi = VisiMisi::where('type', 'visi')->get();
        $misi = VisiMisi::where('type', 'misi')->get();
        return view('welcome', compact('data', 'sosial', 'landingpage', 'logo', 'timelines', 'visi', 'misi'));
    }
}
