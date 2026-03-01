<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JKP Admin &mdash; Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #0f1923 0%, #1b3a2d 60%, #0f1923 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-wrapper {
            width: 100%;
            max-width: 440px;
            padding: 20px;
        }

        .login-brand {
            text-align: center;
            margin-bottom: 32px;
        }

        .brand-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 64px;
            height: 64px;
            border-radius: 16px;
            background: #1b5e20;
            font-size: 26px;
            font-weight: 900;
            color: #fff;
            margin-bottom: 14px;
            box-shadow: 0 8px 24px rgba(27, 94, 32, .5);
        }

        .login-brand h4 {
            color: #fff;
            font-weight: 700;
            margin: 0 0 4px;
        }

        .login-brand p {
            color: rgba(255, 255, 255, .45);
            font-size: 13px;
            margin: 0;
        }

        .login-card {
            background: #fff;
            border-radius: 18px;
            padding: 36px 32px;
            box-shadow: 0 24px 64px rgba(0, 0, 0, .35);
        }

        .login-card h5 {
            font-weight: 700;
            color: #1a1a2e;
            font-size: 20px;
            margin-bottom: 4px;
        }

        .login-card .subtitle {
            font-size: 13px;
            color: #888;
            margin-bottom: 28px;
        }

        .form-floating .form-control {
            border-radius: 10px;
            border-color: #e2e6ea;
            font-size: 14px;
            height: 52px;
        }

        .form-floating .form-control:focus {
            border-color: #43a047;
            box-shadow: 0 0 0 3px rgba(67, 160, 71, .15);
        }

        .btn-login {
            background: #1b5e20;
            color: #fff;
            border: none;
            border-radius: 10px;
            height: 50px;
            font-size: 15px;
            font-weight: 600;
            width: 100%;
            margin-top: 8px;
            transition: background .2s;
        }

        .btn-login:hover {
            background: #2e7d32;
            color: #fff;
        }

        .alert-danger {
            background: #fdecea;
            color: #b71c1c;
            border: none;
            border-radius: 10px;
            font-size: 13px;
        }

        .login-footer {
            text-align: center;
            margin-top: 22px;
            color: rgba(255, 255, 255, .3);
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="login-wrapper">
        <div class="login-brand">
            <div class="brand-badge">JKP</div>
            <h4>Janhit Kishan Party</h4>
            <p>Content Management System</p>
        </div>
        <div class="login-card">
            <h5>Welcome back</h5>
            <p class="subtitle">Sign in to your admin account</p>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger d-flex gap-2 align-items-center mb-3">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <?= esc(session()->getFlashdata('error')) ?>
                </div>
            <?php endif; ?>
            <form method="post" action="<?= site_url('admin/login') ?>">
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatEmail"
                        placeholder="Email" value="<?= old('email') ?>" required autofocus>
                    <label for="floatEmail"><i class="bi bi-envelope me-1"></i>Email address</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" name="password" class="form-control" id="floatPass"
                        placeholder="Password" required>
                    <label for="floatPass"><i class="bi bi-lock me-1"></i>Password</label>
                </div>
                <button type="submit" class="btn btn-login">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                </button>
            </form>
        </div>
        <div class="login-footer">&copy; 2026 Janhit Kisan Party &mdash; All rights reserved</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>