<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Learnify Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
    body {
      background: linear-gradient(to right, #cce7ff, #fff8b5); /* pastel blue-yellow gradient */
      min-height: 100vh;
      display: flex;
      margin: 0;
      overflow-x: hidden;
      font-family: "Poppins", sans-serif;
    }

    /* Oval Side Panel */
    .side-panel {
      width: 280px;
      background: linear-gradient(180deg, #fff8b5, #cce7ff);
      height: 95vh;
      border-radius: 50px;
      padding: 30px 20px;
      position: fixed;
      left: 20px;
      top: 20px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      animation: fadeInLeft 1s ease;
      transition: all 0.4s ease;
    }

    .side-panel:hover {
      transform: scale(1.02);
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .side-panel h3 {
      text-align: center;
      font-weight: 700;
      color: #333;
      letter-spacing: 1px;
      margin-bottom: 25px;
    }

    .nav-link {
      color: #333;
      font-size: 1.05rem;
      padding: 12px 20px;
      border-radius: 30px;
      margin-bottom: 12px;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.6);
      color: #0056b3;
      transform: translateX(10px);
    }

    .nav-link i {
      font-size: 1.2rem;
    }

    /* Main Content */
    .main-content {
      margin-left: 340px;
      padding: 50px;
      width: 100%;
      animation: fadeInUp 1.2s ease;
    }

    .welcome-banner {
      background: #ffffffa8;
      backdrop-filter: blur(10px);
      padding: 2rem;
      border-radius: 25px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .welcome-banner:hover {
      transform: translateY(-5px);
    }

    .welcome-banner h1 {
      font-weight: 700;
      color: #004c8c;
    }

    .welcome-banner p {
      font-size: 1.1rem;
      color: #555;
    }

    /* Logout button */
    .logout {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      background-color: #fff;
      color: #333;
      border-radius: 30px;
      padding: 12px;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .logout:hover {
      background-color: #ffef8a;
      color: #0056b3;
      transform: scale(1.05);
    }

    /* Animations */
    @keyframes fadeInLeft {
      from { opacity: 0; transform: translateX(-50px); }
      to { opacity: 1; transform: translateX(0); }
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive */
    @media (max-width: 768px) {
      .side-panel {
        position: relative;
        width: 100%;
        height: auto;
        border-radius: 0;
        margin-bottom: 20px;
        flex-direction: row;
        align-items: center;
      }

      .main-content {
        margin-left: 0;
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="side-panel">
    <div>
      <h3>Learnify Portal</h3>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        </li>
        <li>
          <a class="nav-link" href="#"><i class="fas fa-users"></i> Manage Users</a>
        </li>
        <li>
          <a class="nav-link" href="#"><i class="fas fa-book"></i> Manage Courses</a>
        </li>
        <li>
          <a class="nav-link" href="<?= site_url('admin/create_announcement') ?>"><i class="fas fa-bullhorn"></i> Create Announcement</a>
        </li>
      </ul>
    </div>

    <a href="<?= site_url('logout') ?>" class="logout">
      <i class="fas fa-sign-out-alt"></i> Logout
    </a>
  </div>

  <div class="main-content">
    <div class="welcome-banner">
      <h1>Welcome, Admin!</h1>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
