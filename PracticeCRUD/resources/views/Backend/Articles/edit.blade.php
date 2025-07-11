@extends('Layout.basicLayout')

@section('content')
<div>
    <h3>Edit Article</h3>
    <a href="{{ route('articles.index') }}">Back to Articles</a>
</div>
<form method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ old('title', $article->title) }}" id="title">
    </div>
    <div class="mb-3">
        <label for="tag_id">Article Tag</label>
        <select id="tag_id" name="tag_id">
            <option value="">Select Tag</option>
            @foreach($tags as $tag)
            <option value="{{ $tag->id }}" {{ old('tag_id', $article->tag_id) == $tag->id ?
                'selected' : '' }}>
                {{ $tag->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="content">Content</label>
        <textarea name="content" id="content" rows="5">{{ old('content', $article->content) }}</textarea>
    </div>
    <div>
        <label for="image">Image</label>
        <input type="file" name="image" id="image">
        @if($article->image)
        <img src="{{ asset('images/articles/' . $article->image) }}" alt="Article Image"
            style="width:40px; height:40px; object-fit:cover; border-radius:50%;">
        @endif
    </div>
    <button type="submit">Update</button>

    @endsection
