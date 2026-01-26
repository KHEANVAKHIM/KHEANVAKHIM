@extends('layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<h3>{{ $title }}</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
        <tr>
            <td>{{ $p['id'] }}</td>
            <td>{{ $p['name'] }}</td>
            <td>{{ $p['price'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
