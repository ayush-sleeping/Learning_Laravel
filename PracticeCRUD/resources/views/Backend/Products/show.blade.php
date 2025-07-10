@extends('Layout.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8">
                <h4 class="card-title">Product</h4>
            </div>
            <div class="col-4">
                <a href="{{ route('backend.products.index') }}" class="btn btn-secondary float-end">Back to Products</a>
            </div>
        </div>
    </div>
    <div class="card-body">
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
    </div>
</div>
@endsection
