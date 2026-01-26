@extends('layouts.app')

@section('title', 'Thêm sản phẩm mới')

@section('content')

<h1 class="mb-4">Thêm sản phẩm mới</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('product.store') }}" method="POST" class="card p-4 shadow-sm" style="max-width: 500px">
    @csrf

    <div class="mb-3">
        <label class="form-label">Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Giá</label>
        <input type="number" name="price" class="form-control" required>
    </div>

    <button class="btn btn-primary">Thêm sản phẩm</button>
</form>

@endsection
