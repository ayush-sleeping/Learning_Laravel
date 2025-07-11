<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('Backend.Tags.index', compact('tags'));
    }

    public function create()
    {
    return view('Backend.Tags.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
        ]);
        Tag::create($data);
        return redirect()->to('admin/tags')->with('success', 'Tag created successfully!');
    }

    public function show(Request $request, Tag $tag)
    {
        return view('Backend.Tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('Backend.Tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        $tag->update($data);
        return redirect()->to('admin/tags')->with('success', 'Tag updated successfully!');
    }

    public function delete(Tag $tag)
    {
        return view('Backend.Tags.delete', compact('tag'));
    }

    public function destroy(Request $request, Tag $tag)
    {
        $tag->delete();
        return redirect()->to('admin/tags')->with('success', 'Tag deleted successfully!');
    }
}
