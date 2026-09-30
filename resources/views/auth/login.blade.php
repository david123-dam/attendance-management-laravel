<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Welcome back - AttendPro</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    <div class="auth-page">
        <div class="auth-card">
            <div class="auth-brand">
                <div class="brand-icon"><i class="fa-solid fa-calendar-check"></i></div>
                <h1>Welcome back</h1>
                <p>Sign in to manage student attendance.</p>
            </div>
            <form method="POST" action="{{ route('login.store') }}">@csrf<div class="field"><label>Email</label><input class="input" type="email" name="email" value="{{ old('email') }}" required autofocus></div>
                <div class="field" style="margin-top:15px"><label>Password</label><input class="input" type="password" name="password" required></div><label style="display:flex;gap:8px;align-items:center;margin-top:14px;font-size:12px"><input type="checkbox" name="remember"> Remember me</label><button class="btn btn-primary" style="width:100%;justify-content:center;margin-top:20px">Login</button>
            </form>
            <div class="demo"><strong>Demo account</strong><br>admin@attendance.test / password</div>
            <p style="text-align:center;font-size:13px;color:#6b7280">No account? <a style="color:#4f46e5;font-weight:700" href="{{ route('register') }}">Register</a></p>
        </div>
    </div>
</body>

</html>