
<?php
/*
if ($allusers->rowCount()>0){
  while ($user=$allusers->fetch()){
        ?>

    <table   >

    <tr>
    <th>Id</th>
    <th>name</th>
    <th>Duration</th>
    <th>Id_Trainer</th> 
  </tr>
      <tr>
      <td><?=$user['id_formation']; ?></td>
      <td><?=$user['name']; ?></td>
      <td><?=$user['duree']; ?></td>
      <td><?=$user['id_trainer']; ?></td>
  </tr>

    </table>

        <?php
    }
}else {
    ?>
    <p> Can't find formation </p>
    <?php
}
?>


<?php
$bdd = new PDO('mysql:host=localhost;dbname=reverso2a28',
'root',
'',);
$allusers=$bdd->query('SELECT * FROM formation ORDER BY id_formation DESC ');
if(isset($_GET['f']) AND !empty($_GET['f']))
{
$recherche =htmlspecialchars($_GET['f']); 
$allusers = $bdd->query('SELECT * FROM formation WHERE name  LIKE "%'.$recherche.'%" ORDER BY id_formation DESC');
$allusers = $bdd->query('SELECT * FROM formation WHERE id_formation LIKE "%'.$recherche.'%" ORDER BY id_formation DESC');
}*/
?>

<?php
if (isset($_POST['id']) && isset($_POST['security_answer']) && isset($_POST['new_password'])) {
    // Get security question and answer from database
    $pdo = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
    $stmt = $pdo->prepare('SELECT security_answer FROM client WHERE id = :id');
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify security answer
    if ($_POST['security_answer'] == $row['security_answer']) {
        // Update password
        $new_password = $_POST['new_password'];
        echo 'New password: ' . $new_password; // Debugging statement
        //$hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare('UPDATE client SET Password = :Password WHERE id = :id');
        $stmt->bindParam(':Password', $new_password);
        $stmt->bindParam(':id', $_POST['id']);
        $stmt->execute();
        echo 'Password updated successfully.';
    } else {
        echo 'Incorrect security answer.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="styleeee.css">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
             
              <h4>Reset your password here</h4>
              <br>
<body>

<body>
    <div class="box">
        <div class="container">
            <div class="top">
            </div>
  <form method="post">

  <input type="text" class="input" id="id" name="id" placeholder="id" required autofocus>
  <br>
  <br>
  <label for="security_answer">What is your favorite sport ?</label>
  <input type="text" class="input" id="security_answer" name="security_answer" placeholder="Security Answer" required autofocus>
  <br>
  <br>
  <input type="password" class="input" id="new_password" name="new_password"  placeholder="New Password" required autofocus>
  <br>
  <br>
  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="login.php" value="Reset password">
</form>

        </div>
    </div>


    </div>
    </div>
    </div>
    </div>
    <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</body>

</html>