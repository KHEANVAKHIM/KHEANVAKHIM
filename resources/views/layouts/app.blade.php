<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <a class="navbar-brand" href="{{ route('product.index') }}">
            <img src="{{ asset('images/logo.png') }}" height="50" class="me-2">
        
        </a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product.add') }}">Add Product</a>
                </li>
            </ul>

            <!-- BÊN PHẢI NAVBAR -->
            <ul class="navbar-nav">
                @if(session()->has('user'))
                    <li class="nav-item">
                        <span class="navbar-text me-3">
                            Hello, {{ session('user') }}
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route('product.logout') }}">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.register') }}">Register</a>
                    </li>
                @endif
            </ul>

        </div>
    </div>
</nav>


    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
