<?php
include '../controller/clientc.php';

//include '../config1.php';
session_start() ;
$client = new clientC();
$clients = $client->listClient();
//$clientt=$client->showReclamation($_SESSION['id']) ;

?>



<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HealthifyMe</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="stylesheet" href="stylessss.css">
  <link href="assets/img/hh.png" rel="icon">
  <link href="assets/img/h.png" rel="h">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
    rel="stylesheet">

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
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <!--<a href="index.html"><img src="assets/img/logo.png" alt=""></a>-->
        <!-- Uncomment below if you prefer to use a text logo -->
        <h1><a href="index.html">HealthifyMe</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="listClient.php">Home</a></li>
         
          <li><a class="nav-link scrollto" href="ahmed/front2.php">nutrition</a></li>
          <li><a class="nav-link scrollto " href="ListExercice.php">Fitness</a></li>
          <li><a class="nav-link scrollto" href="zeinebfront/addproblem.php">Skin Care</a></li>
          <li><a class="nav-link scrollto" href="sarafront/index.html">Forum</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Welcome to HealthifyMe</h1>
      <h2>“Today is your day to start fresh, to eat right, to train hard, to live healthy, to be proud.”</h2>
      <a href="#services" class="btn-get-started"  >MA session</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">



    <!-- ======= NUTRITION ======= -->



    <section id="services">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">MON PROFILE</h3>
          <p class="section-description">pour voir les cordonnees et les manipuler </p>
        </div>
      
    </section><!-- End Services Section -->





    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action">
      <div class="container">
        <div class="row" data-aos="zoom-in">


       <!--   <div class="form">



            <table border="1 ">
              <tr>

                <th>IdClient</th>
                <th>LastClient</th>
                <th>FirstName</th>
                <th>Adress</th>
                <th>Date de naissance</th>
                <th>Supression</th>
                <th>Modification</th>




              </tr>


              <?php foreach ($clients as $client): ?>
                <tr>
                  <td>
                    <?php echo $client['id']; ?>
                  </td>
                  <td>
                    <?php echo $client['nom']; ?>
                  </td>
                  <td>
                    <?php echo $client['prenom']; ?>
                  </td>

                  <td>
                    <?php echo $client['adress']; ?>
                  </td>
                  <td>
                    <?php echo $client['age']; ?>
                  </td>
                  <td><a href="delete.php?id=<?php echo $client['id']; ?>"><img src="images/trash.png"></a>
                  </td>
                  <td><a href="modifier.php?id= ,nom= ,prenom= ,adress= ,age="><img src="images/pen.png"></a>
                  </td>


                </tr>
              <?php endforeach; ?>


            </table>

          </div>  -->



          <div class="form">
  
  <a href="listClient.php" class="back_btn"><img src="images/back.png">Retour</a>
  <h1>my profil </h1>
  <p class="erreur_message">
    voici mes informatons 
</p>

<form method="GET" action="" >
<label>Id</label>
<input type="text" name="id" value="<?php echo $clientt['id']  ?>">
<label>Nom</label>
<input type="text" name="nom"value="<?php echo $clientt['nom']  ?>">
<label>Prenom</label>
<input type="text" name="prenom" value="<?php echo $clientt['prenom']  ?>">
<label>Adress</label>
<input type="text" name="adress" value="<?php echo $clientt['adress']  ?>">
<label>Age</label>
<input type="text" name="age" value="<?php echo $clientt['age']  ?>">
<label>password</label>
<input type="password" name="Password" value="<?php echo $clientt['Password']  ?>">
<label>scurity_answer</label>
<input type="text" name="security_answer" value="<?php echo $clientt['security_answer']  ?>">

</from> 
</div>



        </div>
      </div>

    </section><!-- End Call To Action Section -->

    <!-- ======= Fitness ======= -->
  <!-- End fitness Section -->



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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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