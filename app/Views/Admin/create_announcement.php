<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Announcement - Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #cde7f0 0%, #fff9d9 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Poppins', sans-serif;
      overflow-x: hidden;
    }

    .card {
      background-color: #ffffffc9;
      border: none;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      animation: fadeInUp 0.8s ease forwards;
      width: 100%;
      max-width: 600px;
      padding: 30px;
      backdrop-filter: blur(10px);
    }

    .card h1 {
      text-align: center;
      color: #2a3d66;
      font-weight: 700;
      margin-bottom: 25px;
    }

    .form-label {
      font-weight: 600;
      color: #3d3d3d;
    }

    .form-control {
      border-radius: 10px;
      border: 1px solid #b2d8e0;
      box-shadow: none;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: #ffdf80;
      box-shadow: 0 0 8px rgba(255, 223, 128, 0.5);
    }

    .btn-primary {
      background-color: #a0c4ff;
      border: none;
      border-radius: 10px;
      transition: all 0.3s ease;
      font-weight: 600;
    }

    .btn-primary:hover {
      background-color: #89b4f8;
      transform: scale(1.05);
    }

    .btn-secondary {
      background-color: #ffd6a5;
      border: none;
      border-radius: 10px;
      transition: all 0.3s ease;
      font-weight: 600;
    }

    .btn-secondary:hover {
      background-color: #ffca8b;
      transform: scale(1.05);
    }

    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Subtle hover animation on card */
    .card:hover {
      transform: translateY(-5px);
      transition: transform 0.3s ease;
    }
  </style>
</head>
<body>

  <div class="card">
    <h1><i class="fas fa-bullhorn"></i> Create Announcement</h1>
    <form action="<?= site_url('admin/store_announcement') ?>" method="post">
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter announcement title" required>
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" id="content" name="content" rows="5" placeholder="Write your announcement here..." required></textarea>
      </div>
      <div class="d-flex justify-content-between mt-4">
        <button type="submit" class="btn btn-primary px-4">
          <i class="fas fa-paper-plane"></i> Create
        </button>
        <a href="<?= site_url('admin/dashboard') ?>" class="btn btn-secondary px-4">
          <i class="fas fa-times"></i> Cancel
        </a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
