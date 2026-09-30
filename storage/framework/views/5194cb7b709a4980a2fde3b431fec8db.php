<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Create account - AttendPro</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    <div class="auth-page">
        <div class="auth-card">
            <div class="auth-brand">
                <div class="brand-icon"><i class="fa-solid fa-calendar-check"></i></div>
                <h1>Create account</h1>
                <p>Register a teacher account to manage attendance.</p>
            </div>
            <form method="POST" action="<?php echo e(route('register.store')); ?>"><?php echo csrf_field(); ?><div class="field"><label>Full name</label><input class="input" name="name" value="<?php echo e(old('name')); ?>" required></div>
                <div class="field" style="margin-top:15px"><label>Email</label><input class="input" type="email" name="email" value="<?php echo e(old('email')); ?>" required></div>
                <div class="field" style="margin-top:15px"><label>Password</label><input class="input" type="password" name="password" required></div>
                <div class="field" style="margin-top:15px"><label>Confirm password</label><input class="input" type="password" name="password_confirmation" required></div><button class="btn btn-primary" style="width:100%;justify-content:center;margin-top:20px">Create account</button>
            </form>
            <p style="text-align:center;font-size:13px;color:#6b7280">Already have an account? <a style="color:#4f46e5;font-weight:700" href="<?php echo e(route('login')); ?>">Login</a></p>
        </div>
    </div>
</body>

</html><?php /**PATH C:\laragon\www\attendance_management_laravel13\resources\views/auth/register.blade.php ENDPATH**/ ?>