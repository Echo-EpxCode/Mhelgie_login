<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to bottom, #87CEEB, #E0F7FA);
        }
        .logo {
            color: #1877f2;
            font-size: 36px;
            font-weight: bold;
            font-family: Arial, sans-serif;
        }
        .dashboard-card {
            border-radius: 8px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand fw-bold">Mhelgie App</span>
    </div>
</nav>

<!-- Main Content -->
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-6 col-lg-5">

            <div class="card shadow-sm dashboard-card text-center">
                <div class="card-body p-4">

                    <div class="logo mb-3">Dashboard</div>

                    <h2 class="mb-3">
                        Welcome, <?= htmlspecialchars($_SESSION['username']); ?> 👋
                    </h2>

                    <p class="text-muted">
                        You are successfully logged in.  
                        Manage your account securely from here.
                    </p>

                    <div class="d-grid mt-4">
                        <a href="logout.php" class="btn btn-danger btn-lg">
                            Logout
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
