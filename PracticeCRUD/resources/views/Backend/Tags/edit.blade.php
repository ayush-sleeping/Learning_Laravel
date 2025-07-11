@extends('Layout.basicLayout')
@section('content')
<form action="{{ url('admin/tags', ['tag' => $tag->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" placeholder="Type Name here ..." value="{{ old('name', $tag->name) }}">
    <button type="submit">Save</button>
</form>
@endsection
