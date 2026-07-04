<?php

include(__DIR__ . '/../../../connection.php');

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    // $key = "12345678901234567890123456789012";
    // $iv = "1234567890123456";

    // $encrypted_id = $_GET['deleteid'];

    // $id = openssl_decrypt(
    //     $encrypted_id,
    //     "AES-256-CBC",
    //     $key,
    //     0,
    //     $iv
    // );
    $sql = "DELETE  FROM `blog` WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location:blog-table.php');
    } else {
        die(mysqli_error($con));
    };
}
?>