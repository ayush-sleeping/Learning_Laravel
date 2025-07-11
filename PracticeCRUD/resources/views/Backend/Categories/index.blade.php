@extends('Layout.layout')
@section('content')
<!-- Categories Listing page :: -->
 <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-9">
                <h4 class="card-title"> Category Listing Page</h4>
            </div>
            <div class="col-md-3 text-end">
                <a href="{{ route('backend.categories.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <th>No.</th>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @if($categories->count() > 0)
                @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{  route('backend.categories.show', $category->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{  route('backend.categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{  route('backend.categories.delete', $category->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td>
                        <td class="text-center" colspan="4">No Products</td>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
 </div>
@endsection
