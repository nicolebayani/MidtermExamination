<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Announcements - Learnify Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
    body {
      background: linear-gradient(to right, #cce7ff, #fff8b5);
      font-family: "Poppins", sans-serif;
      min-height: 100vh;
      margin: 0;
      overflow-x: hidden;
    }

    /* Header / Navbar */
    .header {
      background: linear-gradient(90deg, #fff8b5, #cce7ff);
      border-radius: 50px;
      margin: 30px auto;
      width: 90%;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      padding: 20px 30px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      animation: fadeInDown 1s ease;
    }

    .header h1 {
      font-size: 1.8rem;
      font-weight: 700;
      color: #004c8c;
      margin: 0;
    }

    .logout-btn {
      background-color: #fff;
      color: #333;
      border-radius: 30px;
      padding: 10px 20px;
      border: none;
      text-decoration: none;
      transition: all 0.3s ease;
      font-weight: 500;
    }

    .logout-btn:hover {
      background-color: #ffef8a;
      color: #0056b3;
      transform: scale(1.05);
    }

    /* Announcements Container */
    .announcements-container {
      width: 90%;
      margin: 40px auto;
      animation: fadeInUp 1.3s ease;
    }

    /* Individual Cards */
    .announcement-card {
      background: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
      margin-bottom: 20px;
      padding: 25px;
      transition: all 0.3s ease;
    }

    .announcement-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .announcement-card h5 {
      color: #004c8c;
      font-weight: 600;
    }

    .announcement-card p {
      color: #333;
      margin-top: 10px;
    }

    .announcement-card small {
      color: #666;
      font-size: 0.9rem;
    }

    /* Animations */
    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <!-- Header -->
  <div class="header">
    <h1><i class="fas fa-bullhorn"></i> Learnify Portal Announcements</h1>
    <a href="<?= site_url('logout') ?>" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>

  <!-- Announcements -->
  <div class="announcements-container">
    <?php if (!empty($announcements)) : ?>
      <?php foreach ($announcements as $announcement) : ?>
        <div class="announcement-card">
          <h5><i class="fas fa-star"></i> <?= esc($announcement['title']) ?></h5>
          <p><?= esc($announcement['content']) ?></p>
          <small><i class="far fa-calendar-alt"></i> Posted on: <?= esc($announcement['created_at']) ?></small>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <div class="announcement-card text-center">
        <h5>No announcements yet.</h5>
        <p>Check back later for new updates and events!</p>
      </div>
    <?php endif; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
