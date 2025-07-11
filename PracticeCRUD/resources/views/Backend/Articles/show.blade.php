@extends('Layout.basicLayout')

@section('content')
<div>
    <h3>Show Article</h3>
    <a href="{{ route('articles.index') }}">Back to Articles</a>
</div>
<div>
    <h5>{{ $article->title }}</h5>
    <p>{{ $article->content }}</p>
    @if($article->image)
    <img src="{{ asset('images/articles/' . $article->image) }}" alt="Article Image"
        style="width:50%; height:auto; object-fit:cover; border-radius:25px;">
    @else
    <p>No image available.</p>
    @endif
</div>
@endsection
