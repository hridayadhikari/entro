<?php

include "connection.php";

$login = false;
$loginw = false;
if (isset($_POST['Login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `useradmin` WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['Password'])) {
            $login = true;
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $row['Name'];
            header("Location: ../../../entro-admin/src/admin.php");
            exit();
        } else {
            $loginw = true;
        }
    } else {
        $loginw = true;
    }
};

?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5f5;
            height: 100vh;
        }

        .signup-box {
            max-width: 450px;
            width: 100%;
            border-radius: 15px;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">

        <div class="card shadow p-4 signup-box">

            <h2 class="text-center mb-4">Login Up</h2>

            <form method="post">

                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                </div>

                <button type="submit" name="Login" class="btn btn-primary w-100">
                    Login
                </button>

            </form>

            <!-- <p class="text-center mt-3 mb-0">
                Do not have a account?
                <a href="signup.php">Sign Up</a>
            </p> -->

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php
    if ($login) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Success!',
                    text: 'Logged in successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php';
                    }
                });
            });
        </script>";
    }

    if ($loginw) {
        echo "
<script>
            Swal.fire({
                title: 'Invalid!',
                text: 'Email or Password',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        </script>        ";
    }
    ?>
</body>

</html>