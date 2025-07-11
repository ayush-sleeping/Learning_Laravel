@extends('Layout.basicLayout')
@section('content')
<div>
    <h4>Delete Tag</h4>
    <a href=" {{ url('admin/tags') }}">Back to Tag</a>
    <h5>Tag Details :</h5>
    <p><strong>Name: </strong>{{ $tag->name }}</p>
</div>

<div>
    <form action="{{ url('admin/tags/' . $tag->id) }}" method="Post">
        @csrf
        @method('DELETE')
        <button type="submit"> Yes, Delete Tag</button>
        <a href="{{ url('admin/tags') }}">Cancel</a>
    </form>
</div>
@endsection
