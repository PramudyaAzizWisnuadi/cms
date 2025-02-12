<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sosial;
use App\Models\Promosi;
use Illuminate\Http\Request;
use App\Models\CategoryPromosi;

class PromosiController extends Controller
{
    public function index(Request $request)
    {
        $category_id = $request->query('category_id');
        $kategori = CategoryPromosi::all();

        // Set default category if not provided
        if (!$category_id && $kategori->isNotEmpty()) {
            $category_id = $kategori->first()->id;
            return redirect()->route('promosi.index', ['category_id' => $category_id]);
        }

        $currentDate = Carbon::now();

        if ($category_id) {
            $promosi = Promosi::where('category_id', $category_id)
                ->where('end_date', '>=', $currentDate)
                ->get();
        } else {
            $promosi = Promosi::where('end_date', '>=', $currentDate)->get();
        }
        $sosial = Sosial::first();
        return view('promosi.index', compact('promosi', 'kategori', 'category_id', 'sosial'));
    }
}
