<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Đăng ký</title>
  <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;600&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/png" href="{{ asset('storage/' . $setting->favicon) }}">
  <style>
    body {
      font-family: 'Figtree', sans-serif;
      background-color: #1c1c1c;
      color: white;
      margin: 0;
      padding: 20px;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      background-color: rgba(0, 0, 0, 0.8);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      width: 100%;
      max-width: 400px;
      box-sizing: border-box;
      text-align: center;
    }

    h1 {
      font-weight: 600;
      margin-bottom: 20px;
      color: #fff;
      font-size: 24px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    button {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #444;
      border-radius: 5px;
      font-size: 16px;
      background-color: #333;
      color: white;
      box-sizing: border-box;
    }

    button {
      background-color: #007bff;
      border: none;
      cursor: pointer;
      font-weight: bold;
    }

    button:hover {
      background-color: #0056b3;
    }

    .link {
      display: block;
      margin-top: 15px;
      color: #28a745;
      text-decoration: none;
      font-size: 14px;
    }

    .link:hover {
      text-decoration: underline;
    }

    @media (max-width: 480px) {
      .container {
        padding: 20px;
      }

      h1 {
        font-size: 20px;
      }

      input[type="text"],
      input[type="email"],
      input[type="password"],
      button {
        font-size: 14px;
        padding: 10px;
      }

      .link {
        font-size: 13px;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Đăng ký tài khoản</h1>
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <input type="text" name="name" placeholder="Họ tên" required value="{{ old('name') }}">
      <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
      <input type="text" name="phone" placeholder="Số điện thoại" required value="{{ old('phone') }}">
      <input type="password" name="password" placeholder="Mật khẩu" required>
      <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu" required>
      <button type="submit">Đăng ký</button>
    </form>
    <a href="/login" class="link">Đã có tài khoản? Đăng nhập</a>
  </div>

</body>
</html>
