<?php

use App\Http\Controllers\TestController;
use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductsController;
use Psy\ManualUpdater\Checker;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Http\Controllers\AuthController;




Route::get('/home', function () {
    return "Chào mừng bạn!";
})->middleware('check.age');


Route::get('/signin', [AuthController::class, 'SignIn']);
Route::post('/signin', [AuthController::class, 'CheckSignIn']);
Route::get('/age', function () {
    return view('age');
});

Route::post('/age', function (Illuminate\Http\Request $request) {
    session(['age' => $request->age]);
    return redirect('/home');
});



//Product routes

Route::prefix('product')->group(function () {
    /*Route::get('/', [ProductsController::class, 'index'])
     ->middleware(CheckTimeAccess::class);
    */
    Route::get('/login', [ProductsController::class, 'showLoginForm'])->name('product.login');
    Route::post('/login', [ProductsController::class, 'login'])->name('product.login.submit');

    Route::get('/register', [ProductsController::class, 'showRegisterForm'])->name('product.register');
    Route::post('/register', [ProductsController::class, 'register'])->name('product.register.submit');
    
    Route::get('/logout', [ProductsController::class, 'logout'])->name('product.logout');

    
    Route::get('/list', [ProductsController::class, 'index'])->name('product.index');
    Route::get('/add', [ProductsController::class, 'create'])->name('product.add');
    Route::post('/add', [ProductsController::class, 'store'])->name('product.store');

    // Route dùng closure (đổi tên)
    Route::get('/demo', function () {
        $products = [
            ['id'=>1, 'name'=>'Sản phẩm 1', 'price'=>100],
            ['id'=>2, 'name'=>'Sản phẩm 2', 'price'=>200],
            ['id'=>3, 'name'=>'Sản phẩm 3', 'price'=>300],
        ];
        return view('product.index', compact('products'));
    })->name('product.demo');

    /*Route::get('/detail/{id}', function ($id) {
        return view('product.detail', ['id'=>$id]);
    })->name('product.detail');
    });
    */
    Route::get('/detail/{id}', [ProductsController::class, 'getDetail'])->name('product.detail');
    


    Route::get('/sinhvien/{name?}/{mssv?}', function ($name = "KHEAN VAKHIM", $mssv = "5001667") {
        return "Thông tin sinh viên: Name = $name, MSSV = $mssv";
    })->name('sinhvien.info');

    Route::get('/banco/{n}', function ($n) {
        return view('banco', compact('n'));
    })->name('banco');
    Route::resource('Test', TestController::class);

    Route::fallback(function () {
        return response()->view('error.404', [], 404);
    });
});