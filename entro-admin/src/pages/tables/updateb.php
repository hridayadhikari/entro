<?php


include(__DIR__ . '/../../../connection.php');
$id = $_GET['updateid'];
$key = "12345678901234567890123456789012";
$iv = "1234567890123456";

$encrypted_id = $_GET['updateid'];

$id = openssl_decrypt(
    $encrypted_id,
    "AES-256-CBC",
    $key,
    0,
    $iv
);



$sql = "SELECT * FROM `blog` WHERE id=$id";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
$id = $data['id'];
$title = $data['Title'];
$content = $data['Content'];
$type = $data['Typle'];



$success = false;
if (isset($_POST['Upload'])) {
  $title = $_POST['title'];
  $content = $_POST['Content'];
  $type = $_POST['type'];



  $sql = "UPDATE `blog` SET `Title`='$title',`Content`='$content',`Typle`='$type' WHERE id = '$id'";
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
  <div class="container-scroller">
    <?php

    include __DIR__ . '/../../partials/navbar.php';

    ?>

    <div class="container-fluid page-body-wrapper  " style="padding-top: 130px;">

      <?php

      include __DIR__ . '/../../partials/sidebar.php';

      ?>



      <div class="w-100 ps-2 ">



        <div class=" card ">
          <div class="card-body ">
            <h4 class="card-title">Upload Blogs</h4>
            <form class="forms-sample" method="post">
              <div class="form-group">
                <label for="exampleInputName1">Blog Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputName1" value="<?php echo $title; ?>" placeholder="Blog title">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Blog Category</label>

                <select class="form-select" id="exampleSelectGender" name="type">
                  <option value="Corporate" <?php if ($type == 'Corporate') {
                                              echo 'selected';
                                            } ?>> Corporate </option>
                  <option value="Real Estate" <?php if ($type == 'Real Estate') {
                                                echo 'selected';
                                              } ?>> Real Estate </option>
                  <option value="Event" <?php if ($type == 'Event') {
                                          echo 'selected';
                                        } ?>> Event </option>
                  <option value="Management" <?php if ($type == 'Management') {
                                                echo 'selected';
                                              } ?>> Management </option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">Textarea</label>
                <textarea class="form-control" id="exampleTextarea1" rows="12" name="Content"><?php echo htmlspecialchars($content); ?></textarea>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php
  if ($success) {
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Success!',
                    text: 'Blog updated successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'blog-table.php';
                    }
                });
            });
        </script>";
  }
  ?>
</body>

</html>