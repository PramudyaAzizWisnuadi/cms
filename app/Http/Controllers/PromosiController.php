<?php

namespace App\Http\Controllers;

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

        if ($category_id) {
            $promosi = Promosi::where('category_id', $category_id)->get();
        } else {
            $promosi = Promosi::all();
        }
        $sosial = Sosial::first();
        return view('promosi.index', compact('kategori', 'promosi', 'sosial'));
    }
}
