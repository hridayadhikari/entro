<?php

session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
  header("location: /entro/entro-user/index.php");
}


include('../../../connection.php');
$success = false;
if (isset($_POST['Upload'])) {
  $blog_title = $_POST['title'];
  $blog_content = $_POST['content'];
  $type = $_POST['type'];




  $sql = "INSERT INTO `blog`(`Title`, `Content`, `Typle`) VALUES ('$blog_title',' $blog_content','$type')";
  $result = mysqli_query($con, $sql);
  if ($result) {
    $success = true;
  } else {
    die(mysqli_error($con));
  };
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Uplaod Blogs </title>
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
  <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../assets/images/favicon.png" />

</head>

<body>
  <div class="container-scroller">
    <?php

    include __DIR__ . '/../../partials/navbar.php';

    ?>

    <div class="container-fluid page-body-wrapper  " style="padding-top: 130px;">

      <?php

      include __DIR__ . '/../../partials/sidebar.php';

      ?>



      <div class="w-100 ps-2 ">



        <div class=" card">
          <div class="card-body">
            <h4 class="card-title">Upload Blogs</h4>
            <form class="forms-sample" method="post">
              <div class="form-group">
                <label for="exampleInputName1">Blog Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Blog title">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Blog Catagory</label>
                <select class="form-select" id="exampleSelectGender" name="type">
                  <option value="Corporate">Corporate</option>
                  <option value="Real Estate">Real Estate</option>
                  <option value="Event">Event</option>
                  <option value="Management">Management</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">Textarea</label>
                <textarea class="form-control" id="exampleTextarea1" rows="6" name="content"></textarea>
              </div>
              <button type="submit" class="btn btn-primary me-2" name="Upload">Upload</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>







  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../assets/vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/template.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../assets/js/file-upload.js"></script>
  <script src="../../assets/js/typeahead.js"></script>
  <script src="../../assets/js/select2.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- End custom js for this page-->
  <?php
  if ($success) {
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Success!',
                    text: ' Blog Uploaded successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                })
            });
        </script>";
  }
  ?>
</body>

</html>