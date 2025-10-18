<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Learnify Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
</head>
<body>
    <div class="container">
        <div class="layout">
            <div class="brand-panel">
                <div style="display:flex;align-items:center;gap:0.75rem">
                    <div class="logo">L</div>
                    <div>
                        <h2>Learnify Portal</h2>
                        <p class="small">Secure access to your learning dashboard</p>
                    </div>
                </div>

                <p>Fast, friendly, and secure — sign in to continue where you left off.</p>

                <div style="margin-top:auto" class="small">If you don't have an account, contact your administrator to get access.</div>
            </div>

            <div class="card" role="region" aria-label="Login form">
                <div class="bg-blob" aria-hidden="true"></div>
                <div class="bg-blob2" aria-hidden="true"></div>

                <div class="form-title">
                    <h1>Sign in</h1>
                </div>
                <div class="form-sub">Enter your username and password to access your account.</div>

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
                        <input id="username" name="username" class="form-control" type="text" value="<?= esc(old('username')) ?>" required autocomplete="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" name="password" class="form-control" type="password" required autocomplete="current-password">
                    </div>

                    <div class="actions">
                        <button class="btn-primary" type="submit">Sign in</button>
                        <a href="<?= base_url('/') ?>" class="link-muted">Back</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/login.js') ?>"></script>
</body>
</html>
