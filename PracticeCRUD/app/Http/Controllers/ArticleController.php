<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /* Display a listing of the resource. */
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        $tags = Tag::all();
        return view('Backend.Articles.index', compact('articles', 'tags'));
    }

    /* Show the form for creating a new resource. */
    public function create()
    {
        $tags = Tag::all();
        return view('Backend.Articles.create', compact('tags'));
    }

    /* Store a newly created resource in storage. */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required|string',
            'slug' => 'nullable|string|unique:articles,slug',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'tag_id' => 'required|exists:tags,id',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->content = $request->content;
        $article->tag_id = $request->tag_id;
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $name = Str::slug($request->title) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $detainationPath = public_path('/images/articles');
            $imagePath = $detainationPath . '/' . $name;
            $image->move($detainationPath, $name);
            $article->image = $name;
        }
        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    /* Display the specified resource. */
    public function show(Article $article)
    {
        return view('Backend.Articles.show', compact('article'));
    }

    /* Show the form for editing the specified resource. */
    public function edit(Article $article)
    {
        $tags = Tag::all();
        return view('Backend.Articles.edit', compact('article', 'tags'));
    }

    /* Update the specified resource in storage. */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'nullable|string|unique:articles,slug,' . $article->id,
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'tag_id' => 'required|exists:tags,id',
        ]);

        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->content = $request->content;
        $article->tag_id = $request->tag_id;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($article->image) {
                $oldImagePath = public_path('/images/articles/' . $article->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('image');
            $name = Str::slug($request->title) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $detainationPath = public_path('/images/articles');
            $imagePath = $detainationPath . '/' . $name;
            $image->move($detainationPath, $name);
            $article->image = $name;
        }

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }

    /* Remove the specified resource from storage. */
    public function destroy(Article $article)
    {
        // Delete image if exists
        if ($article->image) {
            $imagePath = public_path('/images/articles/' . $article->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
