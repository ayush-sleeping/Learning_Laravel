@extends('Layout.basicLayout')
@section('content')
<h4>Tag</h4>
<a href="{{ url('admin/tags/create') }}">Create New Tag</a>
<div>
    @if($tags->count())
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td>
                    <a href="{{ url('admin/tags/' . $tag->id . '/edit') }}">Edit</a>
                    <a href="{{ url('admin/tags/' . $tag->id) }}">Show</a>
                    <a href="{{ route('tags.delete', $tag->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No tags found.</p>
    @endif
</div>

</div>
@endsection
