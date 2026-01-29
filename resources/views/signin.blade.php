<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign In</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 350px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form input, form select {
            width: 100%;
            padding: 10px;
            margin: 6px 0 12px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            background-color: #007BFF;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .message {
            text-align: center;
            padding: 10px;
            margin-top: 15px;
            border-radius: 5px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Đăng ký</h2>

    <form method="POST" action="/signin">
        @csrf
        Username: <input name="username"><br>
        Password: <input type="password" name="password"><br>
        Repass: <input type="password" name="repass"><br>
        MSSV: <input name="mssv"><br>
        Lớp môn học: <input name="lopmonhoc"><br>
        Giới tính:
        <select name="gioitinh">
            <option value="nam">Nam</option>
            <option value="nu">Nữ</option>
        </select>
        <br>
        <button type="submit">Sign In</button>
    </form>

    @if(session('message'))
        <div class="message {{ session('status') ?? 'success' }}">
            <b>{{ session('message') }}</b>
        </div>
    @endif
</div>
</body>
</html>
