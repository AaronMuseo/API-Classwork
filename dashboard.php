<?php
// dashboard.php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php"); // Redirect if not logged in
    exit();
}

// Example: get user details from session
$user_name = $_SESSION['name'] ?? "User";
$email = $_SESSION['email'] ?? "example@email.com";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BBIT Group E Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .sidebar {
      height: 100vh;
      background: #0d6efd;
      color: white;
      padding: 20px;
    }
    .sidebar h2 {
      font-size: 1.4rem;
      margin-bottom: 20px;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      margin: 10px 0;
      padding: 8px;
      border-radius: 8px;
    }
    .sidebar a:hover {
      background: rgba(255,255,255,0.2);
    }
    .content {
      padding: 30px;
    }
    .card {
      border-radius: 15px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 col-lg-2 sidebar">
        <h2>BBIT Group E</h2>
        <a href="#">🏠 Dashboard</a>
        <a href="#">📚 Courses</a>
        <a href="#">👥 Members</a>
        <a href="#">⚙️ Settings</a>
        <a href="signin.php">🚪 Logout</a>
      </div>

      <!-- Main Content -->
      <div class="col-md-9 col-lg-10 content">
        <h1 class="mb-4">Welcome, <?php echo htmlspecialchars($user_name); ?> 👋</h1>
        <p class="text-muted">You are logged in as <b><?php echo htmlspecialchars($email); ?></b></p>

        <div class="row">
          <div class="col-md-4">
            <div class="card shadow-sm p-3 mb-4">
              <h5 class="card-title">📊 Statistics</h5>
              <p class="card-text">View your group’s performance and activity summary.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card shadow-sm p-3 mb-4">
              <h5 class="card-title">📅 Schedule</h5>
              <p class="card-text">Check upcoming group meetings and deadlines.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card shadow-sm p-3 mb-4">
              <h5 class="card-title">💬 Messages</h5>
              <p class="card-text">Stay updated with announcements and group chats.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
