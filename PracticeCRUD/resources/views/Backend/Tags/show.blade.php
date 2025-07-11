@extends('Layout.basicLayout')
@section('content')
<div>
    <h4> Tag </h4>
    <a href="{{ url('admin/tags') }}">Back to Tag</a>
    <h5>Tag Details :</h5>
    <p>
        <strong>Name: </strong>
        {{ $tag->name }}
    </p>
</div>
@endsection
