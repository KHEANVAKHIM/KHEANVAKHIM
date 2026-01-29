<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function SignIn()
    {
        return view('signin');
    }

    public function CheckSignIn(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $repass = $request->repass;
        $mssv = $request->mssv;
        $lopmonhoc = $request->lopmonhoc;
        $gioitinh = $request->gioitinh;

     if (
    $username == 'Khim' &&
    $password == '123abc' &&
    $repass == '123abc' &&
    $mssv == '5001667' &&
    $lopmonhoc == '67PM1' &&
    $gioitinh == 'nam'
    ) {
    return redirect('/signin')->with('message', 'Đăng ký thành công!');
      }

    if ($password != $repass) {
    return redirect('/signin')->with('message', 'Đăng ký thất bại: mật khẩu không khớp');
    }

    return redirect('/signin')->with('message', 'Đăng ký thất bại');

    }
}
