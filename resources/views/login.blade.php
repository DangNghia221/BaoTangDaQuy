<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, rgba(6, 105, 212, 0.7), rgba(35, 213, 114, 0.7)), url('https://via.placeholder.com/1600x900');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"], input[type="password"], button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #218838;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .link {
            display: block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Đăng nhập</h1>
        <form action="{{ route('login.submit') }}" method="POST">
    @csrf <!-- Đừng quên thêm CSRF token để bảo mật form -->
    <div class="form-group">
        <input type="text" name="email" placeholder="Email" required>
    </div>
    <div class="form-group">
        <input type="password" name="password" placeholder="Mật khẩu" required>
    </div>
    <button type="submit">Đăng nhập</button>
</form>

        <a href="/register" class="link">Chưa có tài khoản? Đăng ký</a>
    </div>

</body>
</html>
