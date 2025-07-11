@extends('Layout.basicLayout')

@section('content')
<h3>Articles</h3>
<a href="{{ route('articles.create') }}">Create New Article</a>
@if($articles->count())
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Tag</th>
            <th>Content</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($articles as $article)
        <tr>
            <td>{{ $article->id }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->tag->name }}</td>
            <td>{{ $article->content }}</td>
            <td>
                @if($article->image)
                <img src="{{ asset('images/articles/' . $article->image) }}" alt="Article Image"
                    style="width:40px; height:40px; object-fit:cover; border-radius:50%;">
                @else
                No image
                @endif
            </td>
            <td>
                <a href="{{ route('articles.edit', $article->id) }}">Edit</a>
                <a href="{{ route('articles.show', $article->id) }}">Show</a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No articles found.</p>
@endif
@endsection
