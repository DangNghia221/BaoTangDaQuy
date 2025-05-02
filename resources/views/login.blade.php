<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login & Register</title>
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
      background-color: #28a745;
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
      margin-top: 15px;
      color: #007bff;
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
    <h1>Đăng nhập</h1>
    <form action="{{ route('login.submit') }}" method="POST">
      @csrf
      <div class="form-group">
        <input type="text" name="email" placeholder="Email" required />
      </div>
      <div class="form-group">
        <input type="password" name="password" placeholder="Mật khẩu" required />
      </div>
      <button type="submit">Đăng nhập</button>
    </form>
    <a href="/register" class="link">Chưa có tài khoản? Đăng ký</a>
  </div>
</body>
</html>
