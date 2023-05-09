<?php

require_once '../controller/skincarec.php';

$productc = new productc();

$list = $productc->listproduct();

?>
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skin_care";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Search query
if(isset($_POST['search'])) {
  $search_term = $_POST['search'];

  $sql = "SELECT * FROM products WHERE 
  id LIKE '%$search_term%' OR 
  skintype LIKE '%$search_term%' OR 
  product LIKE '%$search_term%' OR 
  producttype LIKE '%$search_term%'";

  $result = mysqli_query($conn, $sql);
} else {
  $result = mysqli_query($conn, "SELECT * FROM products");
}

// Display search results
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
    <script src="https://kit.fontawesome.com/ac87c673ce.js" crossorigin="anonymous"></script>
    <link href="CSS1/template1.css" rel="stylesheet" />
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
          <img src="assets/images/logo.svg" alt="logo" /> </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="assets/images/logo-mini.svg" alt="logo" /> </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
              <div class="dropdown-divider"></div>
              
            </div>
          </li>
          <div class="my-container">
            <h1></h1>
            <p> </p>
          </div>
          <li class="nav-item dropdown"> 
              <div> <br>
                <form method="post" action="" class="ml-auto search-form d-none d-md-block">
                <i class="form-group"></i>
                <input type="text" name="search" placeholder="Search..." class="form-control">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn">Search</button>
                </form>
              </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="listproblems.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">List Problems</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listsolutions.php">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">List Solutions</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="addproduct.php">
                  <i class="menu-icon typcn typcn-bell"></i>
                  <span class="menu-title">Add Product</span>
                </a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="listproduct.php">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">List Products</span>
              </a>
            </li>
          </ul>
        </nav>
    <!-- partial -->

    <!-- List Products -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="form mt-5">
                <form action="#" method="post" role="form" class="php-email-form">
                    <div class="contact">
                        <table border="1" align="center" style="border-collapse: separate; border-spacing: 10px;">
                            <tr>
                                <th>ID </th>
                                <th>Skin Type </th>
                                <th>Product</th>
                                <th>Product Type</th>
                                <th>Modify</th>
                                <th>Delete</th>
                            </tr>

                            <?php 
if(isset($_POST['search'])) {
  while($solutionc = mysqli_fetch_assoc($result)) {
?>
<tr data-id="<?php echo $solutionc['id']; ?>">
  <td><?php echo $solutionc['id']; ?></td>
  <td><?php echo $solutionc['skintype']; ?></td>
  <td><?php echo $solutionc['product']; ?></td>
  <td><?php echo $solutionc['producttype']; ?></td>
  <?php $show_update = true; ?>
  <td class="modify"> <?php if ($show_update) : ?>
    <a href="updateproduct.php?id=<?php echo $solutionc['id']; ?>"><i class="fa-solid fa-pen-to-square"></i> </a>
  <?php endif; ?>
  </td>
  <?php $show_delete = true; ?>
  <td class="delete"> <?php if ($show_delete) : ?>
    <a href="deleteproduct.php?id=<?php echo $solutionc['id']; ?>"><i class="fa-solid fa-trash-can "></i></i></a>
  <?php endif; ?>
  </td>
</tr>
<?php 
  } 
} else {
  foreach ($list as $solutionc) {?>
    <tr>
      <td><?php echo $solutionc['id']; ?></td>
      <td><?php echo $solutionc['skintype']; ?></td>
      <td><?php echo $solutionc['product']; ?></td>
      <td><?php echo $solutionc['producttype']; ?></td>
      <?php $show_update = true; ?>
      <td class="modify"> <?php if ($show_update) : ?>
        <a href="updateproduct.php?id=<?php echo $solutionc['id']; ?>"><i class="fa-solid fa-pen-to-square"></i> </a>
      <?php endif; ?>
      </td>
      <?php $show_delete = true; ?>
      <td class="delete"> <?php if ($show_delete) : ?>
        <a href="deleteproduct.php?id=<?php echo $solutionc['id']; ?>"><i class="fa-solid fa-trash-can "></i></i></a>
      <?php endif; ?>
      </td>
    </tr>
<?php } }?>

                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End List Products-->
      
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper"> </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
              <div class="container-fluid clearfix">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
              </div>
            </footer>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
      <script src="../../assets/vendors/js/vendor.bundle.addons.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page-->
      <!-- End plugin js for this page-->
      <!-- inject:js -->
      <script src="../../assets/js/shared/off-canvas.js"></script>
      <script src="../../assets/js/shared/misc.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page-->
      <script src="../../assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
      <!-- End custom js for this page-->
    </body>
  </html>