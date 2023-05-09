<?php
require_once '../controller/skincarec.php';
$problemsc = new problemsc();

// Récupérer le problem de la réservation à afficher à partir de l'URL
if (isset($_GET['problem'])) {
    $problem = $_GET['problem'];
} else {
    // Si le problem n'est pas présent dans l'URL, rediriger vers la page précédente
    header("Location:javascript://history.go(-1)");
    exit();
}

// Récupérer les données de la réservation correspondant à le problem
$list = $problemsc->showproblem($problem);

// Vérifier si l'utilisateur peut modifier la réservation
$show_update = true; // Mettez votre propre logique ici
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
  <script src="https://kit.fontawesome.com/ac87c673ce.js" crossorigin="anonymous"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="CSS1/template.css" rel="stylesheet" />


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
      <h2>“voici vos information , Vous aurez besoin de votre ID de Probleme!Vous feriez mieux de le bien garder pour pouvoir trouver votre solution!”</h2>
      <a href="addproblem.php" class="btn-get-started">Ajouter un Probleme</a>
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

    <!-- Afficher les données de la réservation dans un tableau -->
	<table border="1" align="center" style="border-collapse: separate; border-spacing: 10px;">
		<tr>
			<th>ID </th>
			<th>Skin Type </th>
			<th>Problem</th>
			<th>Solved?</th>
			<th>Modify</th>
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
							  $show_update = true;
							  ?>
				<td class="modify">
					<?php if ($show_update) : ?>
						<a href="updateproblem.php?id=<?php echo $problemsc['ID']; ?>"><i class="fa-solid fa-pen-to-square"></i> </a>
					<?php endif; ?>
				</td>
			</tr>
		<?php } ?>
	  </table>

</section>
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