<?php

include "connection.php";

$success = false;
$alert = false;

if (isset($_POST['Signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpass'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);



    if ($password == $cpassword) {
        $sql = "INSERT INTO `useradmin`( `Name`, `Email`, `Password`) VALUES ('$name ','$email','$hashed_password')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $success = true;
            header('location:login.php');
        } else {
            die(mysqli_error($con));
        };
    } else {
        $alert = true;
    };
};


?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

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

            <h2 class="text-center mb-4">Sign Up</h2>

            <form method="post">

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="cpass" class="form-control" placeholder="Confirm password">
                </div>
                <?php
                if ($alert) {
                    echo '<div class="alert alert-danger" role="alert">
                       Make sure the password it same
                        </div>';
                };

                ?>



                <button type="submit" name="Signup" class="btn btn-primary w-100">
                    Create Account
                </button>

            </form>

            <p class="text-center mt-3 mb-0">
                Already have an account?
                <a href="login.php">Login</a>
            </p>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php
    if ($success) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Success!',
                    text: 'Signed Up successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                })
            });
        </script>";
    }
    ?>
</body>

</html>