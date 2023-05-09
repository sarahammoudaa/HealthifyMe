<?php

require_once '../config2.php';
require_once '../Controller/exerciceC.php';

function trierexerciceParNom($exercice) {
    usort($exercice, function($a, $b) {
        return strcasecmp($a['nomEx'], $b['nomEx']);
    });
    return $exercice;
}

$exerciceC = new exerciceC();
$list = $exerciceC->listExercice();

// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=healthifyme';
$username = 'root';
$password = '';

$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

// Récupération des données de la table exercice et stockage dans un tableau associatif
$resultat = $db->query('SELECT * FROM exercice');
$listexercice = array();
while ($exercice = $resultat->fetch(PDO::FETCH_ASSOC)) {
    $listexercice[] = $exercice;
}

// Fermeture de la connexion à la base de données
$db = null;

// Tri des restaurants par ordre alphabétique en fonction de leur nom
$listexerciceTries = trierexerciceParNom($listexercice);

// Affichage des exercice triés
foreach ($listexerciceTries as $exercice) {
    echo $exercice['nomEx'] . ' ' . $exercice['nbr_rep'] . ' ' . $exercice['categorie'] . ' ' . $exercice['idp'] . '<br>';
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!--recherche-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<!-- Template Main CSS Files -->
    <link href="variables.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <!--<a href="index.html"><img src="assets/img/logo.png" alt=""></a>
         Uncomment below if you prefer to use a text logo -->
        <h1><a href="index.html">HealthifyMe</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.html">return home</a></li>
          <!-- <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">nutrition</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Fitness</a></li>
          <li><a class="nav-link scrollto" href="#team">Skin Care</a></li>
          <li><a class="nav-link scrollto" href="#contact">Forum</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Fitness Details</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li><a href="portfolio.html">Fitness</a></li>
            <li>More Details</li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
    <tr>
    <td colspan="7"><a href="tri.php"><button type="button">tri par ordre alphabetique</button></a></td> </tr>

      <center>
        <h1>Exercice List</h1>
        
    </center>
    
    <table border="5" align="center" width="70%">
        <tr>
            
            <th>nom Exercice</th>
            <th>nombre de repetition</th>
            <th>Categorie</th>
            <th>ID Program</th>
            <th>QR Code</th>
            
        </tr>
        <?php
        foreach ($list as $exercice) {
        ?>
            <tr>
                
                <td><?= $exercice['nomEx']; ?></td>
                <td><?= $exercice['nbr_rep']; ?></td>
                <td><?= $exercice['categorie']; ?></td>
                <td><?= $exercice['idp']; ?></td>

                <td>
                    <form method="post" action="generate_qr.php">
                        <input type="hidden" name="qr_content" value="<?php echo generate_qr_content($exercice); ?>">
                        <input type="submit" value="QR Code">
                    </form>
                </td>
                
            </tr>
        <?php
        }
        ?>
    </table>
    

  <body>

    <center>
        <h1>PROGRAM</h1>
        <h2>
            <a href="addProgram.php">Choose your Program</a>
        </h2>
    </center>
    <div style="text-align:center;">
    <label for="search"></label>
    <input type="text" id="search" name="search" placeholder="search">
</div>
<table border="5" align="center" width="70%">
    <thead>
        <tr>
            <th>program name</th>
            <th>Objective</th>
            <th>Duration</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody id="program-table-body">
        <?php
        foreach ($listp as $programme) {
        ?>
            <tr>
                <td><?= $programme['nomProg']; ?></td>
                <td><?= $programme['objectif']; ?></td>
                <td><?= $programme['duree']; ?></td>
                <td align="center">
                    <form method="POST" action="updateProgram.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $programme['idp']; ?> name="idp">
                    </form>
                </td>
                <td>
                    <a href="deleteProgram.php?idp=<?php echo $programme['idp']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#program-table-body tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>


</body> 
    

    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer  id="footer">
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
