<!DOCTYPE html>
<html>
<head>
    <title>CRUD App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h3 class="text-center mb-4">Practice CRUD Application</h3>

        <!-- Quick Navigation -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-center gap-2">
                    <a href="/" class="btn btn-outline-primary">Home</a>
                    <a href="{{ route('backend.categories.index') }}" class="btn btn-outline-primary">Category</a>
                    <a href="{{ route('backend.products.index') }}" class="btn btn-outline-primary">Products</a>
                </div>
            </div>
        </div>

        @yield('content')
    </div>
</body>
</html>
