<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
</head>
<body>
    <h1>Thêm sản phẩm mới</h1>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<form action="{{ route('product.store') }}" method="POST">
    @csrf
    <label>Tên sản phẩm:</label>
    <input type="text" name="name" required>
    <label>Giá:</label>
    <input type="number" name="price" required>
    <button type="submit">Thêm sản phẩm</button>
</form>

</body>
</html>
