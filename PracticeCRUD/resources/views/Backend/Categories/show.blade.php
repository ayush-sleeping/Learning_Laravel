@extends('Layout.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8">
                <h4 class="card-title"> Category</h4>
            </div>
            <div class="col-md-4">
                <a href="{{ route('backend.categories.index') }}" class="btn btn-secondary float-end">Back to Category</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <h5>Category Details :</h5>
            <p><strong>Name: </strong>{{ $category->name }}</p>
        </div>
    </div>
</div>
@endsection
