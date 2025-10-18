<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Learnify Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; background: #f6f8fb; display:flex; align-items:center; justify-content:center; height:100vh; margin:0 }
        .card { background: #fff; padding:2.5rem; border-radius:10px; box-shadow:0 8px 30px rgba(23,24,32,.08); width:360px }
        h1 { margin:0 0 0.5rem 0; font-size:1.5rem }
        p { margin:0 0 1rem 0; color:#666 }
        .form-group { margin-bottom:1rem }
        label { display:block; font-size:.9rem; margin-bottom:.25rem }
        input[type=text], input[type=password] { width:100%; padding:.6rem .75rem; border:1px solid #e3e6ee; border-radius:6px }
        .btn { display:inline-block; background:#3b82f6; color:#fff; padding:.6rem 1.2rem; border-radius:8px; text-decoration:none; border:none; cursor:pointer }
        .btn:disabled { opacity:.6 }
        .error { background:#fff5f5; border:1px solid #ffd2d2; color:#8b1a1a; padding:.5rem .75rem; border-radius:6px; margin-bottom:1rem }
        .links { margin-top:1rem; font-size:.9rem; color:#555 }
    </style>
</head>
<body>
    <div class="card">
        <h1>Sign in</h1>
        <p>Enter your credentials to continue.</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="error"><?= esc(session()->getFlashdata('error')) ?></div>
        <?php endif ?>

        <?php $errors = session()->getFlashdata('errors') ?? [] ?>
        <?php if (! empty($errors)): ?>
            <div class="error">
                <ul style="margin:0;padding-left:1.2rem">
                <?php foreach ($errors as $e): ?>
                    <li><?= esc($e) ?></li>
                <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <form method="post" action="<?= base_url('login') ?>">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" value="<?= esc(old('username')) ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" required>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center">
                <button class="btn" type="submit">Login</button>
                <a href="<?= base_url('/') ?>" style="color:#555;text-decoration:none">Back</a>
            </div>
        </form>

        <div class="links">
            <p>Demo credentials: <strong>admin / password</strong> or <strong>teacher / password</strong></p>
        </div>
    </div>
</body>
</html>
