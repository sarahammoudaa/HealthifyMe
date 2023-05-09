<?php
require_once '../controller/skincarec.php';
$problemsc = new problemsc();
$solutionsc = new solutionsc();
$productc = new productc();

// Récupérer l'ID de la réservation à afficher à partir de l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    // Si l'ID n'est pas présent dans l'URL, rediriger vers la page précédente
    header("Location:javascript://history.go(-1)");
    exit();
}

// Récupérer les données de la réservation correspondant à l'ID
$list = $problemsc->listproblems($id);

// Récupérer le skin type à partir de l'URL

// Récupérer les informations sur les solutions correspondantes
// Récupérer les informations sur les solutions correspondantes
$list = $problemsc->listProbSol($id);
$lists = $problemsc->listProbProd($id);
?>

<?php
require_once '../controller/skincarec.php';
$pdo = config::getConnexion();

if (isset($_POST['like'])) {
   // Récupérer les données du formulaire
  $solution_id = $_POST['solution_id'];
   // Mettre à jour
   $query = "UPDATE solutions SET avis = 1 WHERE ids = :id";
  $stmt = $pdo->prepare($query);
  $stmt->bindValue(":id", $solution_id);
  $stmt->execute();  
  header("Location: respond.php");
     exit;    
} elseif (isset($_POST['dislike'])) {
  // Récupérer les données du formulaire
  $solution_id = $_POST['solution_id'];
   // Mettre à jour
   $query = "UPDATE solutions SET avis = -1 WHERE ids = :id";
  $stmt = $pdo->prepare($query);
  $stmt->bindValue(":id", $solution_id);
  $stmt->execute();  
  header("Location: respond.php");
  exit; 
} 
?>
<?php 
require_once '../controller/skincarec.php';
$pdo = config::getConnexion();
if (isset($_POST['rate']) && isset($_POST['id'])) {
  $avis = intval($_POST['rate']);
  $id = $_POST['id'];
  $problemsc = new problemsc();
  $problemsc->ajouterRate($id, $avis);
  header("Location: respond.php ");
  exit();
}
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
		 <!-- Afficher l'ID de la probléme dans un tableau -->
<table border="1" align="center" style="border-collapse: separate; border-spacing: 10px;">
  <tr>
      <th>ID Problem :</th>
  </tr>
  <?php
  foreach ($list as $problemsc ) {
  ?>
      <tr>
          <td><?php echo $problemsc['ID']; ?></td>
      </tr>
  <?php } ?>
</table>
<div class="my-container">
<h1></h1>
<p> </p>
</div>
    <!-- Afficher la probléme dans un tableau -->
<table border="1" align="center" style="border-collapse: separate; border-spacing: 10px;">
  <tr>
      <th>Problem : </th>
  </tr>
  <?php
  foreach ($list as $problemsc ) {
  ?>
      <tr>
          <td><?php echo $problemsc['problem']; ?></td>
      </tr>
  <?php } ?>
</table>
<div class="my-container">
<h1></h1>
<p> </p>
</div>
<!-- Afficher la solution dans un tableau -->
<form method="post">
  <table border="1" align="center" style="border-collapse: separate; border-spacing: 10px;">
    <tr>
      <th>Solution : </th>
      <th>Solution : </th>
      <th> </th>
    </tr>
    <?php foreach ($list as $solutionsc) { ?>
    <tr> 
      <td>
        <input type="hidden" name="solution_id" value="<?php echo $solutionsc['ids']; ?>" >
        <span><?php echo $solutionsc['ids']; ?></span>
      </td>
      <td><?php echo $solutionsc['solution']; ?></td>
      <td> <button type="submit" class="like-btn" name="like" data-solution-id="<?php echo $solutionsc['ids']; ?>">
        <i class="fa fa-thumbs-up"></i> Like </button> </td>
      <td> <button type="submit" class="dislike-btn" name="dislike" data-solution-id="<?php echo $solutionsc['ids']; ?>">
        <i class="fa fa-thumbs-down"></i> Dislike</button></td>
    </tr>
    <?php } ?>
  </table>
</form>

<!-- JavaScript code -->
<script>
  const likeBtns = document.querySelectorAll('.like-btn');
  const dislikeBtns = document.querySelectorAll('.dislike-btn');

  likeBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const solutionId = btn.getAttribute('data-solution-id');
      const dislikeBtn = document.querySelector(`.dislike-btn[data-solution-id="${solutionId}"]`);
      if (btn.classList.contains('active')) {
        btn.classList.remove('active');
      } else {
        btn.classList.add('active');
        dislikeBtn.classList.remove('active');
      }
    });
  });

  dislikeBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const solutionId = btn.getAttribute('data-solution-id');
      const likeBtn = document.querySelector(`.like-btn[data-solution-id="${solutionId}"]`);
      if (btn.classList.contains('active')) {
        btn.classList.remove('active');
      } else {
        btn.classList.add('active');
        likeBtn.classList.remove('active');
      }
    });
  });
</script>

<!-- CSS code -->
<style>
  .like-btn.active {
    color: green;
  }
  .dislike-btn.active {
    color: red;
  }
</style>
<div class="my-container">
<h1></h1>
<p> </p>
</div>
</section>
<!--list Product-->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="form mt-5">
      <div class="contact">
        <table border="1" align="center" style="border-collapse: separate; border-spacing: 10px;">
          <tr>
            <th>ID</th>
            <th>Skin Type</th>
            <th>Product</th>
            <th>Product Type</th>
            <th>Rating</th>
            <th>Rating en étoiles</th>
            <th>Action</th>
          </tr>
          <?php 
          foreach ($lists as $problemsc) {
          ?>
          <tr>
            <td>
              <input type="hidden" name="id" value="<?php echo $problemsc['id']; ?>" >
              <span><?php echo $problemsc['id']; ?></span>
            </td>
            <td><?php echo $problemsc['skintype']; ?></td>
            <td><?php echo $problemsc['product']; ?></td>
            <td><?php echo $problemsc['producttype']; ?></td>
            <td><?php echo $problemsc['rate']; ?></td>
            <td>
              <?php 
                // Calculer le nombre d'étoiles à afficher
                $nb_etoiles = 0;
                if ($problemsc['rate'] >= 100) {
                  $nb_etoiles = 5;
                } elseif ($problemsc['rate'] >= 80) {
                  $nb_etoiles = 4;
                } elseif ($problemsc['rate'] >= 60) {
                  $nb_etoiles = 3;
                } elseif ($problemsc['rate'] >= 40) {
                  $nb_etoiles = 2;
                } elseif ($problemsc['rate'] >= 20) {
                  $nb_etoiles = 1;
                }
                
                // Afficher les étoiles
                for ($i = 1; $i <= 5; $i++) {
                  if ($i <= $nb_etoiles) {
                    echo "<i class='fas fa-star'></i>";
                  } else {
                    echo "<i class='far fa-star'></i>";
                  }
                } 
              ?>
            </td>
            <td> 
              <form method='POST'>
                <input type="hidden" name="id" value="<?php echo $problemsc['id']; ?>" >
                <select name='rate' id='rate'>
                  <?php for ($i = 1; $i <= 5; $i++) {
                    echo "<option value='" . $i . "'>" . $i . "</option>";
                  } ?>
                </select>
                <button type='submit' class='btn btn-primary'>Ajouter l'avis</button>
              </form>
            </td>
          </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
</div>
                        <!--end list Product-->

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

