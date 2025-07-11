@extends('Layout.basicLayout')
@section('content')
<form action="{{ url('admin/tags') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Type Name here ...">
    <button type="submit">Save</button>
</form>
@endsection
