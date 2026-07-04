<?php
require_once '../connection.php';
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
  header("location: /entro/entro-user/index.php");
}
?>

<?php


$totalQuery = "SELECT * FROM `messages`";
$totalResult = mysqli_query($con, $totalQuery);
$totalCount = mysqli_num_rows($totalResult);


$pendingQuery = "SELECT * FROM `messages` WHERE status='pending'";
$pendingResult = mysqli_query($con, $pendingQuery);
$pendingCount = mysqli_num_rows($pendingResult);

$respondedQuery = "SELECT * FROM `messages` WHERE status='responded'";
$respondedResult = mysqli_query($con, $respondedQuery);
$respondedCount = mysqli_num_rows($respondedResult);

?>

<!DOCTYPE html>
<html lang="en">

<?php
include __DIR__ . '/partials/head.php';
?>

<body class="with-welcome-text">
  <div class="container-scroller">

    <?php
    include __DIR__ . '/partials/navbar.php';
    ?>

    <div class="container-fluid page-body-wrapper " style="padding-top: 130px;">


      <?php
      include __DIR__ . '/partials/sidebar.php';
      ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="row">
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">Contact Requests</h4>
                                    <p class="card-subtitle card-subtitle-dash">You have new requests</p>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <table class="table select-table">
                                    <thead>
                                      <tr>
                                        <th>Customer</th>
                                        <th>Company</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>


                                      <?php
                                      $sql = "SELECT * FROM `messages`";
                                      $result = mysqli_query($con, $sql);

                                      if ($result) {

                                        while ($data = mysqli_fetch_assoc($result)) {

                                          $id = $data['id'];
                                          $first_name = $data['first_name'];
                                          $surname = $data['surname'];
                                          $company_name = $data['company_name'];
                                          $phone = $data['phone_no'];
                                          $message = $data['message'];
                                          $status = $data['status'];


                                          $badgeClass = ($status == "Responded")
                                            ? "badge-success"
                                            : "badge-warning";

                                          echo '

<tr>

<td>
    <div class="d-flex">
        <div>
            <h6>' . $first_name . ' ' . $surname . '</h6>
            <small>' . $phone . '</small>
        </div>
    </div>
</td>

<td>
    <h6>' . $company_name . '</h6>
</td>


<form action="Update.php" method="POST">

<input type="hidden" name="id" value="' . $id . '">

<td>

<div class="badge ' . $badgeClass . '">
' . $status . '
</div>

</td>



</form>

</tr>

        ';
                                        }
                                      }
                                      ?>
                                      <!-- <tr>
                                        <td>
                                          <div class="d-flex ">
                                  
                                            <div>
                                              <h6>Brandon Washington</h6>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>Company name 1</h6>
                                        </td>
                                        <td>
                                          <div class="badge">In progress</div>
                                        </td>
                                      </tr> -->

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <h4 class="card-title card-title-dash">Messages</h4>
                                    </div>
                                    <div>
                                      <canvas class="my-auto" id="doughnutChart"></canvas>
                                    </div>
                                    <div id="doughnutChart-legend" class="mt-5 text-center"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row flex-grow">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.php -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"> <a href="https://github.com/hridayadhikari" target="_blank">Developer Hriday Adhikari</a> </span>
            <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2026. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


  <?php
  include __DIR__ . '/partials/script.php';
  ?>

  <?php



  ?>

  <script>
    const ctx = document.getElementById('doughnutChart');

    new Chart(ctx, {
      type: 'doughnut',

      data: {
        labels: ['Pending', 'Responded', 'Total'],

        datasets: [{
          data: [
            <?php echo $pendingCount; ?>,
            <?php echo $respondedCount; ?>,
            <?php echo $totalCount; ?>
          ],

          backgroundColor: [
            'rgb(226, 158, 9)',
            'rgb(77, 167, 97)',
            'rgb(31, 59, 179)'
          ],

          borderColor: [
            'rgb(226, 158, 9)',
            'rgb(77, 167, 97)',
            'rgb(31, 59, 179)'
          ],

          borderWidth: 1
        }]
      },

      options: {
        responsive: true,

        animation: {
          animateScale: true,
          animateRotate: true
        }
      }
    });
  </script>
  <!-- End custom js for this page-->
</body>

</html>