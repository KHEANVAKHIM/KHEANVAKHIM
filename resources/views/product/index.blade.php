<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/product-index.css') }}">

    <title>Document</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>

<a href="{{ route('product.add') }}">
    <button>Thêm sản phẩm mới</button>
</a>

<ul>
    @foreach($products as $p)
        <li>
            <a href="{{ route('product.detail', $p['id']) }}">
                {{ $p['name'] }} - {{ $p['price'] }}$
            </a>
        </li>
    @endforeach
</ul>

</body>
</html>