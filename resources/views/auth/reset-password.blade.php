<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Reset Password</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f7f7f7; }
    .container { max-width: 400px; margin: 80px auto; background: #fff; padding: 20px; border-radius: 6px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
    h1 { text-align: center; margin-bottom: 20px; }
    label { display: block; margin-top: 10px; }
    input { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; }
    button { margin-top: 15px; width: 100%; background: #17a2b8; color: #fff; border: none; padding: 10px; border-radius: 4px; cursor: pointer; }
    button:hover { background: #117a8b; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Reset Password</h1>
    <form method="POST" action="{{ route('password.update') }}">
      @csrf
      <input type="hidden" name="token" value="{{ $request->route('token') }}">
      <label>Email</label>
      <input type="email" name="email" required autofocus>
      <label>New Password</label>
      <input type="password" name="password" required>
      <label>Confirm Password</label>
      <input type="password" name="password_confirmation" required>
      <button type="submit">Reset Password</button>
    </form>
  </div>
</body>
</html>
