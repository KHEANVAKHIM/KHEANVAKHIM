<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    
    /*public function index()
    {
        $products = [
            ['id'=>1, 'name'=>'product 1', 'price'=>100],
            ['id'=>2, 'name'=>'product 2', 'price'=>200],
        ];
        return view('product.index', compact('products'));
    } */
   public function index(Request $request)
{
    if (!session()->has('user')) {
        return redirect()->route('product.login')->with('error', 'Vui lòng đăng nhập để truy cập trang sản phẩm.');
    }
    $title = "Danh sách product";

    $products = [
        ['id'=>1, 'name'=>'product 1', 'price'=>100],
        ['id'=>2, 'name'=>'product 2', 'price'=>200],
        ['id'=>3, 'name'=>'product 3', 'price'=>300],
    ];

    return view('product.index', compact('title', 'products'));
    }

    public function getDetail(string $id = "123")
    {
        return view ('product.detail', ['id' => $id]);
    }
    public function create(Request $request)
{
    if (!$request->session()->has('user')) {
        return redirect()->route('product.login')->with('error', 'Vui lòng đăng nhập trước.');
    }
    return view('product.add');
}

    public function store (Request $request){
        dd($request);
    }
     public function showLoginForm()
{
    return view('product.login');
}

public function login(Request $request)
{
    $username = $request->input('username');
    $password = $request->input('password');

    if ($username === 'khim' && $password === '12345') {
        // em save session
        session(['user' => $username]);
        return redirect()->route('product.index')->with('success', 'Đăng nhập thành công!');
    }

    return redirect()->back()->with('error', 'Sai username hoặc password!');
}

public function showRegisterForm()
{
    return view('product.register');
}

public function register(Request $request)
{
    $username = $request->input('username');
    $email = $request->input('email');
    $adress = $request->input('address');
    $password = $request->input('password');

    session(['user' => $username]);

    return redirect()->route('product.index')->with('success', 'Đăng ký thành công!');
}
public function logout()
{
    session()->forget('user'); 
    return redirect()->route('product.login')->with('success', 'Bạn đã đăng xuất!');
}


       
}