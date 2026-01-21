<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('/', function () {
    return view('hello');
})->name('hello');


Route::get('/test', function () {
    return response()->json("Hello, World!");
});


Route::prefix('product')->group(function () {

    
    Route::get('/', function () {
        $products = [
            ['id'=>1, 'name'=>'Sản phẩm 1', 'price'=>100],
            ['id'=>2, 'name'=>'Sản phẩm 2', 'price'=>200],
        ];
        return view('product.index', compact('products'));
    })->name('product.index');

   
    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');

    
    Route::post('/add', function (Request $request) {
        return redirect()->route('product.add')->with('success', 'Sản phẩm đã được thêm!');
    })->name('product.store');

    
    Route::get('/{id}', function ($id) {
        return view('product.detail', ['id'=>$id]);
    })->name('product.detail');
});


Route::get('/sinhvien/{name?}/{mssv?}', function ($name = "KHEAN VAKHIM", $mssv = "5001667") {
    return "Thông tin sinh viên: Name = $name, MSSV = $mssv";
})->name('sinhvien.info');


Route::get('/banco/{n}', function ($n) {
    return view('banco', compact('n'));
})->name('banco');


Route::fallback(function () {
    return response()->view('error.404', [], 404);
});
