<!DOCTYPE html>
<html>

<head>
    <title>CRUD App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-3">
        <div class="row mb-4">
            <!-- Quick Navigation -->
            <div class="col-2">
                <div class="d-flex justify-content-center">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center mb-4">Practice CRUD Application</h3>
                        </div>
                        <div class="col-12 text-center">
                            <a href="/" class="btn btn-outline-primary">Home</a>
                        </div>
                        <div class="col-12 text-center mt-2">
                            <a href="{{ route('backend.categories.index') }}"
                                class="btn btn-outline-primary">Category</a>
                        </div>
                        <div class="col-12 text-center mt-2">
                            <a href="{{ route('backend.products.index') }}" class="btn btn-outline-primary">Products</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Whole CRUD CONTENT -->
            <div class="col-10">
                @yield('content')
            </div>
        </div>

    </div>
</body>

</html>
