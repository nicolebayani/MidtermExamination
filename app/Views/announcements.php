<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements - Learnify Portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f8ff; /* Pastel Blue */
        }
        .navbar, .list-group-item h5 {
            color: #333;
        }
        .container {
            background-color: #fff8dc; /* Pastel Yellow */
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Learnify Portal Announcements</h1>
        <ul class="list-group">
            <?php if (!empty($announcements)) : ?>
                <?php foreach ($announcements as $announcement) : ?>
                    <li class="list-group-item">
                        <h5><?= esc($announcement['title']) ?></h5>
                        <p><?= esc($announcement['content']) ?></p>
                        <small>Posted on: <?= esc($announcement['created_at']) ?></small>
                    </li>
                <?php endforeach; ?>
            <?php else : ?>
                <li class="list-group-item">No announcements yet.</li>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>