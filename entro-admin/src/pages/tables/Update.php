<?php

include(__DIR__ . '/../../../connection.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'];
    $status = $_POST['status'];

    $sql = "UPDATE messages SET status='$status' WHERE id='$id'";

    $result = mysqli_query($con, $sql);

    if ($result) {

        header("Location: basic-table.php");
        exit();

    } else {

        echo "Failed to update status";

    }
}
?>