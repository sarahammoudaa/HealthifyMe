<?php

include '../Controller/programmeC.php';

$error = "";

// create programme
$programme = null;

// create an instance of the controller
$programmeC = new programmeC();
if (
    isset($_POST["nomProg"]) &&
    isset($_POST["objectif"]) &&
    isset($_POST["duree"]) 
    
) {
    if (
        !empty($_POST['nomProg']) &&
        !empty($_POST['objectif']) &&
        !empty($_POST["duree"]) 
        
    ) {
        $programme = new programme(
            null,
            $_POST['nomProg'],
            $_POST['objectif'],
            $_POST['duree']
            
        );
        $programmeC->addProgram($programme);
        header('Location:ListProgram.php');
    } else
        $error = "Missing information";
}


?>
<!-- <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <a href="ListProgram.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">


            <tr>
                <td>
                    <label for="nomProg">Program Name:
                    </label>
                </td>
                <td><input type="text" name="nomProg" id="nomProg"  maxlength="50"></td>
            </tr>

            <tr>
                <td>
                    <label for="objectif">Objective:
                    </label>
                </td>
                <td><input type="text" name="objectif" id="objectif" minlength="8" maxlength="50"></td>
            </tr>
            <tr>
                <td>
                    <label for="duree">Duration:
                    </label>
                </td>
                <td><input type="text" name="duree" id="duree" maxlength="20"></td>
            </tr>
            
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
    <script>
        // Récupérer la référence de l'élément d'entrée de texte
const objectifInput = document.getElementById('objectif');

// Définir la longueur minimale et maximale acceptée pour le texte
const minLength = 8;
const maxLength = 50;

// Ajouter un écouteur d'événement pour vérifier la saisie utilisateur
objectifInput.addEventListener('input', function() {
  // Récupérer la valeur actuelle du champ de saisie
  const inputValue = objectifInput.value.trim();

  // Vérifier si la longueur du texte est valide
  if (inputValue.length < minLength || inputValue.length > maxLength) {
    // Afficher un message d'erreur si la longueur est invalide
    objectifInput.setCustomValidity(`Le texte doit contenir entre ${minLength} et ${maxLength} caractères.`);
  } else {
    // Réinitialiser le message d'erreur s'il est valide
    objectifInput.setCustomValidity('');
  }
});
</script>
</body>

</html> -->



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
</head>

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

      
      <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <a href="ListProgram.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">


            <tr>
                <td>
                    <label for="nomProg">Program Name:
                    </label>
                </td>
                <td><input type="text" name="nomProg" id="nomProg"  maxlength="50"></td>
            </tr>

            <tr>
                <td>
                    <label for="objectif">Objective:
                    </label>
                </td>
                <td><select name="objectif" id="objectif" class="input" >
                                    <option value="gain weight">gain weight</option>
                                    <option value="lose weight">lose weight</option>
                                    <option value="strength">strength</option>
                      </select>
                  </td>
            </tr>
            <tr>
                <td>
                    <label for="duree">Duration:
                    </label>
                </td>
                <td><input type="text" name="duree" id="duree" maxlength="20"></td>
            </tr>
            
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
    <script>
        // Récupérer la référence de l'élément d'entrée de texte
const objectifInput = document.getElementById('objectif');

// Définir la longueur minimale et maximale acceptée pour le texte
const minLength = 8;
const maxLength = 50;

// Ajouter un écouteur d'événement pour vérifier la saisie utilisateur
objectifInput.addEventListener('input', function() {
  // Récupérer la valeur actuelle du champ de saisie
  const inputValue = objectifInput.value.trim();

  // Vérifier si la longueur du texte est valide
  if (inputValue.length < minLength || inputValue.length > maxLength) {
    // Afficher un message d'erreur si la longueur est invalide
    objectifInput.setCustomValidity(`Le texte doit contenir entre ${minLength} et ${maxLength} caractères.`);
  } else {
    // Réinitialiser le message d'erreur s'il est valide
    objectifInput.setCustomValidity('');
  }
});
</script>
</body>

</html>




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