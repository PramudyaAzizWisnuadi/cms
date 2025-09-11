<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function index()
    {
        $logos = Logo::latest()->paginate(10);
        return view('admin.logos.index', compact('logos'));
    }

    public function create()
    {
        return view('admin.logos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'deskripsi' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_image_' . $file->getClientOriginalName();
            
            // Create directory if not exists
            $uploadPath = storage_path('app/public');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            
            // Move file to storage directory
            $file->move($uploadPath, $filename);
            $data['image'] = $filename;
        }

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_thumb_' . $file->getClientOriginalName();
            
            // Create directory if not exists
            $uploadPath = storage_path('app/public/thumbnails');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            
            // Move file to storage directory
            $file->move($uploadPath, $filename);
            $data['thumbnail'] = $filename;
        }

        Logo::create($data);

        return redirect()->route('admin.logos.index')->with('success', 'Logo berhasil dibuat!');
    }

    public function edit(Logo $logo)
    {
        return view('admin.logos.edit', compact('logo'));
    }

    public function update(Request $request, Logo $logo)
    {
        $request->validate([
            'name' => 'required|max:255',
            'deskripsi' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($logo->image && file_exists(storage_path('app/public/' . $logo->image))) {
                unlink(storage_path('app/public/' . $logo->image));
            }

            $file = $request->file('image');
            $filename = time() . '_image_' . $file->getClientOriginalName();
            
            // Create directory if not exists
            $uploadPath = storage_path('app/public');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            
            // Move file to storage directory
            $file->move($uploadPath, $filename);
            $data['image'] = $filename;
        }

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($logo->thumbnail && file_exists(storage_path('app/public/thumbnails/' . $logo->thumbnail))) {
                unlink(storage_path('app/public/thumbnails/' . $logo->thumbnail));
            }

            $file = $request->file('thumbnail');
            $filename = time() . '_thumb_' . $file->getClientOriginalName();
            
            // Create directory if not exists
            $uploadPath = storage_path('app/public/thumbnails');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            
            // Move file to storage directory
            $file->move($uploadPath, $filename);
            $data['thumbnail'] = $filename;
        }

        $logo->update($data);

        return redirect()->route('admin.logos.index')->with('success', 'Logo berhasil diupdate!');
    }

    public function destroy(Logo $logo)
    {
        // Delete image if exists
        if ($logo->image && file_exists(storage_path('app/public/' . $logo->image))) {
            unlink(storage_path('app/public/' . $logo->image));
        }

        // Delete thumbnail if exists
        if ($logo->thumbnail && file_exists(storage_path('app/public/thumbnails/' . $logo->thumbnail))) {
            unlink(storage_path('app/public/thumbnails/' . $logo->thumbnail));
        }

        $logo->delete();

        return redirect()->route('admin.logos.index')->with('success', 'Logo berhasil dihapus!');
    }
}
