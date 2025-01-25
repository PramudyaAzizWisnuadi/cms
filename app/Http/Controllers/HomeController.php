<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use App\Models\Post;
use App\Models\Sosial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $data = Post::latest()->paginate(4);
        $sosial = Sosial::first();
        $landingpage = LandingPage::first();
        return view('welcome', compact('data', 'sosial', 'landingpage'));
    }
}
