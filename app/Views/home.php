<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learnify Portal - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: linear-gradient(135deg, #f0f8ff 0%, #fff8dc 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif;
        }
        .home-container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 4rem;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, .08);
            max-width: 720px;
        }
        .home-container h1 { font-size: 2.6rem; color: #333; margin: 0 }
        .home-container p { color: #555; font-size: 1.1rem }
        .btn-login {
            background: linear-gradient(135deg, #6dd5ed 0%, #2193b0 100%);
            color: white;
            font-size: 1.1rem;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.25s ease;
            display: inline-block;
            margin-top: 1.25rem;
        }
        .btn-login:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(33, 147, 176, .2); }
    </style>
</head>
<body>
    <div class="home-container">
        <h1>Welcome to Learnify Portal</h1>
        <p>Your gateway to online learning and collaboration. Click the button below to sign in.</p>
        <a href="<?= base_url('login') ?>" class="btn-login">Login to Get Started</a>
    </div>
</body>
</html>
