<?php
include(__DIR__ . '/../../../connection.php');
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
  header("location: /entro/entro-user/index.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Messeges</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../assets/images/favicon.png" />

</head>

<body>
  <div class="container-fluid">
    <?php

    include __DIR__ . '/../../partials/navbar.php';

    ?>

    <div class="container-fluid page-body-wrapper  " style="padding-top: 130px;">
      <div class="sticky-top">
        <?php

        include __DIR__ . '/../../partials/sidebar.php';

        ?>
      </div>


      <div class="w-100 ms-3 ">

        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0 justify-content-center table-bordered border-primary">
            <thead class="table-light ">
              <tr>
                <th>Blog Title</th>
                <th>Catagory</th>
                <th>Content</th>
                <th>Operartions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM `blog`";
              $result = mysqli_query($con, $sql);
              if ($result) {

                while ($data = mysqli_fetch_assoc($result)) {
                  $id = $data['id'];
                  $title = $data['Title'];
                  $content = $data['Content'];
                  $type = $data['Typle'];
                  $key = "12345678901234567890123456789012";
                  $iv = "1234567890123456";

                  $encrypted_id = openssl_encrypt(
                    $id,
                    "AES-256-CBC",
                    $key,
                    0,
                    $iv
                  );
                  $encrypted_id = urlencode($encrypted_id);

                  echo '
                  <tr>
                  <td>' . $title . '</td>
                  <td>' . $type . '</td>
                  <td style="white-space: pre-line;">' . $content . '</td>
                         <td> <a class="btn btn-success me-2" href="Updateb.php?updateid=' . $encrypted_id . '">Update</a>
                    <a class="btn btn-danger" href="delete.php?deleteid=' .  $id . ' "  onclick="con(event, this)">Delete</a> </td>
                  
                  
                  </tr>
                  
                  ';
                }
              }
              ?>


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/template.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>