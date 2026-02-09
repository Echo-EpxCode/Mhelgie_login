<?php
session_start();
include "config.php";

$error = "";

if (isset($_POST['login'])) {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f2f5;
        }
        .logo {
            color: #1877f2;
            font-size: 48px;
            font-weight: bold;
            font-family: Arial, sans-serif;
        }
        .login-card {
            border-radius: 8px;
        }
        .form-control {
            height: 50px;
            font-size: 16px;
        }
    </style>
</head>
<body style="background: linear-gradient(to bottom, #87CEEB, #E0F7FA);">

<div class="container">
    <div class="row align-items-center vh-100">
        

        <div class="col-md-6 d-none d-md-block">
            <div class="ms-5">
                <div class="logo">Mhelgie App</div>
                <p class="fs-4 mt-3">
                One-way hashing, zero-way leaks..
                </p>
            </div>
        </div>

        <!-- RIGHT SIDE (LOGIN CARD) -->
        <div class="col-md-6">
            <div class="card shadow-sm login-card mx-auto" style="max-width: 400px;">
                <div class="card-body p-4">

                    <?php if(!empty($error)): ?>
                        <div class="alert alert-danger text-center">
                            <?= htmlspecialchars($error); ?>
                        </div>
                    <?php endif; ?>
                        <h1 class="text-center text-primary fw-bold mb-4">Access Account</h1>
                    <form method="POST">
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email address" required>
                        </div>

                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" name="login" class="btn btn-primary btn-lg text-white">
                                Log In
                            </button>
                        </div>
                    </form>

                    <hr>

                    <div class="d-grid">
                        <a href="register.php" class="btn btn-success btn-lg">
                            Create New Account
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
