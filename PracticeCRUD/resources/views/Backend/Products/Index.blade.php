@extends('Layout.layout')
@section('content')
<!-- Products Listing page :: -->
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-9">
                <h4 class="card-title">Products List</h4>
            </div>
            <div class="col-md-3 text-end">
                <a href="{{ route('backend.products.create') }}" class="btn btn-primary">Create Product</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($products->count() > 0)
                @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        @if($product->image)
                        <img src="{{ asset('images/products/' . $product->image) }}" alt="Product Image"
                            style="width:40px; height:40px; object-fit:cover; border-radius:50%;">
                        @else
                        No image
                        @endif
                    </td>
                    <td>${{ $product->price }}</td>
                    <td>
                        <a href="{{ route('backend.products.show', $product->id) }}"
                            class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('backend.products.edit', $product->id) }}"
                            class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('backend.products.delete', $product->id) }}"
                            class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4" class="text-center">No products found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
