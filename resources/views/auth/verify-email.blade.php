<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Verify Email</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f7f7f7; }
    .container { max-width: 400px; margin: 80px auto; background: #fff; padding: 20px; border-radius: 6px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); text-align: center; }
    h1 { margin-bottom: 20px; }
    button { margin-top: 15px; width: 100%; background: #007bff; color: #fff; border: none; padding: 10px; border-radius: 4px; cursor: pointer; }
    button:hover { background: #0056b3; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Email Verification</h1>
    <p>Please check your email for a verification link. If you didn’t receive it, you can request another.</p>
    <form method="POST" action="{{ route('verification.send') }}">
      @csrf
      <button type="submit">Resend Verification Email</button>
    </form>
  </div>
</body>
</html>
