<?php
include "config.php";

$error = "";
$success = "";

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if user exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Email already exists!";
    } else {
        mysqli_query($conn, "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')");
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to bottom, #87CEEB, #E0F7FA);
        }
        .logo {
            color: #1877f2;
            font-size: 48px;
            font-weight: bold;
            font-family: Arial, sans-serif;
        }
        .register-card {
            border-radius: 8px;
        }
        .form-control {
            height: 50px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row align-items-center vh-100">

        <!-- LEFT SIDE (BRANDING) -->
        <div class="col-md-6 d-none d-md-block">
            <div class="ms-5">
                <div class="logo">Mhelgie App</div>
                <p class="fs-4 mt-3">
                    Create your account and get started securely.
                </p>
            </div>
        </div>

        <!-- RIGHT SIDE (REGISTER CARD) -->
        <div class="col-md-6">
            <div class="card shadow-sm register-card mx-auto" style="max-width: 400px;">
                <div class="card-body p-4">

                    <h1 class="text-center text-primary fw-bold mb-4">
                        Create Account
                    </h1>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger text-center">
                            <?= htmlspecialchars($error); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($success)): ?>
                        <div class="alert alert-success text-center">
                            <?= $success; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email address" required>
                        </div>

                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" name="register" class="btn btn-success btn-lg">
                                Sign Up
                            </button>
                        </div>
                    </form>

                    <hr>

                    <div class="text-center">
                        <span>Already have an account?</span>
                        <a href="login.php" class="fw-semibold text-primary ms-1">
                            Log In
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
