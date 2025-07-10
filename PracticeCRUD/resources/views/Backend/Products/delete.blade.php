@extends('Layout.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Delete Product</h4>
    </div>
    <div class="card-body">
        <div class="alert alert-warning">
            <strong>Warning!</strong> Are you sure you want to delete this product? This action cannot be undone.
        </div>

        <div class="mb-3">
            <h5>Product Details:</h5>
            <p><strong>Name:</strong> {{ $product->name }}</p>
            <p><strong>Category:</strong> {{ $product->category }}</p>
            <p><strong>Price:</strong> ${{ $product->price }}</p>
            <p><strong>Stock:</strong> {{ $product->stock }}</p>
            @if($product->description)
                <p><strong>Description:</strong> {{ $product->description }}</p>
            @endif
        </div>

        <form action="{{ route('backend.products.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Yes, Delete Product</button>
            <a href="{{ route('backend.products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
