<?php

require_once '../controller/skincarec.php';

$productc = new productc();


$list = $productc->listproduct();

?>

<?php
require_once '../controller/skincarec.php';

$problemsc = new problemsc();
$solutionsc = new solutionsc();
$productproblemc = new productproblemc();

// Check if form is submitted
if (isset($_POST['submit'])) {
    if (
        isset($_POST['ID'])
        && isset($_POST['solution'])
    ) {

        if (
            !empty($_POST['ID']) &&
            !empty($_POST['solution'])
        ) 
        {
            $solutions = new solutions(
                null,
                $_POST['ID'],
                $_POST['solution'],
               '0'
            );

            // Add solution to database
            $solutionsc->addsolution($solutions);

            // Redirect to show solution page
            header("Location: listproblems.php");
            exit();
        } else
            $error = "Missing information";
    }
    $_POST = array();
}
$problems = array();
// Retrieve problem ID from URL
if (isset($_GET['id'])) {
    try {
        $pdo = config::getConnexion();
        $query = "SELECT ID FROM problems WHERE ID = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(":id", $_GET['id']);
        $stmt->execute();
        $problems = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}

// Check if form is submitted
if (isset($_POST['submit1'])) {
  if (
      isset($_POST['ID'])
      && isset($_POST['idproduct'])
  ) {

      if (
          !empty($_POST['ID']) &&
          !empty($_POST['idproduct'])
      ) 
      {
          $productproblem = new productproblem(
              null,
              $_POST['ID'],
              $_POST['idproduct']
          );

          // Add solution to database
          $productproblemc->addproductproblemc($productproblem);
           // Redirect to show solution page
           $ID =  $problems['ID'];
           header("Location: addsolution.php?id= $ID" );
           exit();
      }  else
          $error = "Missing information";
  }$_POST = array();
}
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
    <link href="CSS1/template.css" rel="stylesheet" />
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
          <li class="nav-item dropdown"> 
              <div></div>
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
          <div class="main-panel">
            <div class="content-wrapper">
                  <!--list Product-->
    <div class="form mt-5">
        <form action="#" method="post" role="form" class="php-email-form">
            <div class="contact">
              
                <table border="1" align="center" style="border-collapse: separate; border-spacing: 10px;">
                    <tr>
                        <th>ID </th>
                        <th>Skin Type </th>
                        <th>Product</th>
                        <th>Product Type</th>
                        <th>Rating</th>

                    </tr>
                   <?php foreach ($list as $solutionc) {?>
                        <tr>
                            <td><?php echo $solutionc['id']; ?></td>
                            <td><?php echo $solutionc['skintype']; ?></td>
                            <td><?php echo $solutionc['product']; ?></td>
                            <td><?php echo $solutionc['producttype']; ?></td>
                            <td><?php echo $solutionc['rate']; ?></td>
                        </tr>
                    <?php } ?>
                            </table>
                            </div>
                            </form>
                            </div>
                        <!--end list Product-->
                        <div class="my-container">
  <h1></h1>
  <p> </p>
  </div>
                        <!--ADD Product-->
                        <div class="col-md-9">
    <div class="contact-form text-center">
      <form action="#" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2" for="ID">ID:</label>
          <div class="col-sm-10">
            <input type="hidden" name="ID" value="<?php echo $problems['ID']; ?>" readonly>
            <span><?php echo $problems['ID']; ?></span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="idproduct">ID Product:</label>
          <div class="col-sm-10">
            <input type="text" id="idproduct" name="idproduct">
            <span id="idproduct-validation"></span>
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" name="submit1" >Add Product to solution</button>
          </div>
        </div>
      </form>
    </div>
  </div>
            
             <!--end Add Product-->
  
  <div class="my-container">
  <h1></h1>
  <p> </p>
  </div>
  <!--ADD-->
  <div class="col-md-9">
                <div class="contact-form text-center">
                <form action="#" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="ID">ID:</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="ID" value="<?php echo $problems['ID']; ?>" readonly>
                                <span><?php echo $problems['ID']; ?></span>
                            </div>
                        </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="solution">Solution:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="solution" id="solution" placeholder="solution" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">        
                                      <div class="col-sm-offset-2 col-sm-10">
                                          <button type="submit" class="btn btn-default" name="submit" >Add solution</button>
                                      </div>
                                  </div>
              </form>
            </div>
            </div>
  
             <!--end Add-->

                  </div>
                </div>
              
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