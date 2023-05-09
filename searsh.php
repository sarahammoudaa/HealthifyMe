<?php

require_once '../controller/skincarec.php';


$problemsc = new problemsc();


$list = $problemsc->listProblems();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HealthifyMe</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/hh.png" rel="icon">
  <link href="assets/img/h.png" rel="h">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/ac87c673ce.js" crossorigin="anonymous"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="CSS1/template1.css" rel="stylesheet" />


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <!--<a href="index.html"><img src="assets/img/logo.png" alt=""></a>-->
        <!-- Uncomment below if you prefer to use a text logo -->
        <h1><a href="index.html">HealthifyMe</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#services">nutrition</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Fitness</a></li>
          <li><a class="nav-link scrollto" href="addproblem.php">Skin Care</a></li>
          <li><a class="nav-link scrollto" href="#contact">Forum</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

   <!-- ======= Hero Section ======= -->
   <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Bienvenue</h1>
      <h2>“Pour un beauté inspirée de la vie naturelle”</h2>
      <a href="#about" class="btn-get-started">Ajouter un Probleme</a>
	  <a href="searsh.php" class="btn-get-started">Voir votre Solution</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">
	<div class="my-container">
		<h1></h1>
		<p> </p>
		</div>
    <!-- ======= About Section ======= -->
    <section id="about">
     <!-- ======= list problems ======= -->
     <div class="form mt-5">
        <form action="#" method="post" role="form" class="php-email-form">

            <div class="contact">

                <table border="1" align="center" style="border-collapse: separate; border-spacing: 10px;">

                    <tr>


                        <th>ID </th>
                        <th>Skin Type </th>
                        <th>Problem</th>
                        <th>Solved?</th>
                        <th>voir solution</th>
                        

                    </tr>

                   <?php
                    foreach ($list as $problemsc) {



                    ?>

                        <tr>

                            <td><?php echo $problemsc['ID']; ?></td>
                            <td><?php echo $problemsc['skintype']; ?></td>
                            <td><?php echo $problemsc['problem']; ?></td>
                            <td><?php echo $problemsc['responded']; ?></td>

                            <?php
                            $show_respond = true;
                            ?>
                            <td class="respond">
                             <?php if ($show_respond) : ?>
                             <a href="respond.php?id=<?php echo $problemsc['ID']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                              <?php endif; ?>
                               </td>

                        </tr>

                    <?php } ?>
                            </table>
                            </div>
                            </form>
                            </div>  <!-- End list problems -->

                 <!-- End About Section -->
  <div class="my-container">
	<h1></h1>
	<p> </p>
	</div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>HealthifyMe</strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

   <!-- Vendor JS Files -->
   <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>

