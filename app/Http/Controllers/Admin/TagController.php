<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::withCount('posts')->latest()->paginate(15);
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:tags,name',
        ]);

        Tag::create($request->all());

        return redirect()->route('admin.tags.index')->with('success', 'Tag berhasil dibuat!');
    }

    public function show(Tag $tag)
    {
        $posts = $tag->posts()->latest()->paginate(10);
        return view('admin.tags.show', compact('tag', 'posts'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|max:255|unique:tags,name,' . $tag->id,
        ]);

        $tag->update($request->all());

        return redirect()->route('admin.tags.index')->with('success', 'Tag berhasil diupdate!');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('success', 'Tag berhasil dihapus!');
    }
}
