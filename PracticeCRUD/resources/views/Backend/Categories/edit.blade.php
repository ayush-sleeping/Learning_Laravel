@extends('Layout.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title"> Edit Category</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.categories.update', ['category' => $category->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
            <a href="{{ route('backend.categories.index') }}" class="btn btn-secondary">Back to Category</a>
        </form>
    </div>
</div>
@endsection
