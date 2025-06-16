<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Logo;
use App\Models\Post;
use App\Models\Galery;
use App\Models\Sosial;
use App\Models\Timeline;
use App\Models\LandingPage;
use Illuminate\Http\Request;
use App\Models\CategoryGalery;
use App\Models\Event;
use App\Models\GaleryCategory;

class GaleryController extends Controller
{
    // public function index()
    // {
    //     $sosial = Sosial::first();
    //     $galerycategory = CategoryGalery::latest()->get();
    //     $galery = Galery::latest()->get();
    //     return view('galery.index', compact('sosial', 'galery', 'galerycategory'));
    // }
    public function index(Request $request)
    {
        $category_id = $request->query('category_id');
        $galerycategory = CategoryGalery::all();
        $sosial = Sosial::first();
        $events = Event::whereDate('end_date', '>=', Carbon::today())->orderBy('created_at')->get();
        if ($category_id) {
            $galery = Galery::where('category_id', $category_id)->get();
        } else {
            $galery = Galery::paginate(12);
        }

        return view('galery.index', compact('galery', 'galerycategory', 'category_id', 'sosial', 'events'));
    }
}
