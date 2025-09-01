<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Confirm Password</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f7f7f7; }
    .container { max-width: 400px; margin: 80px auto; background: #fff; padding: 20px; border-radius: 6px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
    h1 { text-align: center; margin-bottom: 20px; }
    label { display: block; margin-top: 10px; }
    input { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; }
    button { margin-top: 15px; width: 100%; background: #6c757d; color: #fff; border: none; padding: 10px; border-radius: 4px; cursor: pointer; }
    button:hover { background: #5a6268; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Confirm Password</h1>
    <form method="POST" action="{{ route('password.confirm') }}">
      @csrf
      <label>Password</label>
      <input type="password" name="password" required>
      <button type="submit">Confirm</button>
    </form>
  </div>
</body>
</html>
