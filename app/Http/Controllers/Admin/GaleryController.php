<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galery;
use App\Models\CategoryGalery;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index()
    {
        $galeries = Galery::with('category')->latest()->paginate(10);
        return view('admin.galeries.index', compact('galeries'));
    }

    public function create()
    {
        $categories = CategoryGalery::all();
        return view('admin.galeries.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:category_galeries,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Create directory if not exists
            $uploadPath = storage_path('app/public');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            
            // Move file to storage directory
            $file->move($uploadPath, $filename);
            $data['image'] = $filename;
        }

        Galery::create($data);

        return redirect()->route('admin.galeries.index')->with('success', 'Galeri berhasil dibuat!');
    }

    public function edit(Galery $galery)
    {
        $categories = CategoryGalery::all();
        return view('admin.galeries.edit', compact('galery', 'categories'));
    }

    public function update(Request $request, Galery $galery)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:category_galeries,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($galery->image && file_exists(storage_path('app/public/' . $galery->image))) {
                unlink(storage_path('app/public/' . $galery->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Create directory if not exists
            $uploadPath = storage_path('app/public');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            
            // Move file to storage directory
            $file->move($uploadPath, $filename);
            $data['image'] = $filename;
        }

        $galery->update($data);

        return redirect()->route('admin.galeries.index')->with('success', 'Galeri berhasil diupdate!');
    }

    public function destroy(Galery $galery)
    {
        // Delete image if exists
        if ($galery->image && file_exists(storage_path('app/public/' . $galery->image))) {
            unlink(storage_path('app/public/' . $galery->image));
        }

        $galery->delete();

        return redirect()->route('admin.galeries.index')->with('success', 'Galeri berhasil dihapus!');
    }
}
