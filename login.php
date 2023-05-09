<?php
include '../config.php';
/*
$con= mysqli_connect("localhost","root","","projet");
if(!$con){
    die("connexion invalid");
}
else{
    extract($_GET);
    $sql = "SELECT  * FROM client WHERE id = ':id' ";
    $result=mysqli_query($con,$sql);
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        if($Password==$row[5]){
            if($row[6]=='Client'){
            echo 'valid';
            header('Location:listClient.php');
        }
        else{
            if($row[6]=='ADMIN'){
                echo 'valid';
                header('Location:afficherclient.php');
            }
            else{
                echo 'invalid';
            }
        }
    }
        else{
            header('Location:login.php');
        }
    }
    else{
        echo '<script>alert("PASSWORD or IDENTITY CARD ARE INCORRECT ");</script>';
        include('login.php');
        
    }
}*/




session_start(); 



if (isset($_POST['id']) && isset($_POST['Password'])) {
    // Escape special characters in the submitted username and password
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
    $Password = htmlspecialchars($_POST['Password'], ENT_QUOTES, 'UTF-8');

    // Hash the submitted password
    // $hashed_password = md5($password);

    // Query the database using prepared statements
    $pdo = config::getConnexion();
    $stmt = $pdo->prepare('SELECT * FROM client WHERE id = :id AND Password = :Password');
    $stmt->execute(['id' => $id, 'Password' => $Password]);

    if ($stmt->rowCount() == 1) {


        $client=$stmt->fetch();
        // Login successful
        $_SESSION['id'] = $id;
        $_SESSION['Role'] = $client['Role'];
        if ($_SESSION['Role'] == "Client") {
            header("Location: listClient.php");
            $_SESSION['id'] = $client['id'];
            $_SESSION['nom'] = $client['nom'];
            $_SESSION['prenom'] = $client['prenom'];
            $_SESSION['adress'] = $client['adress'];
            $_SESSION['age'] = $client['age'];
            $_SESSION['Password'] = $client['Password'];
            $_SESSION['Role'] = $client['Role'];




        } else 
            header("Location: afficherclient.php");
    }
        else {
        // Login failed
        $error = "Invalid username or password";
        header("Location: login.php?error=" . urlencode($error));
        exit();
    }
} 

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--<link rel="stylesheet" type="text/css" href="captcha.css">-->

    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
        integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <style>
        .login {
            background: url('./dist/images/simple.jpg')
        }
    </style>
    <title>Sign-Up</title>
</head>
<style>
 .captcha
    {
        width: 50% ;
        background: yellow ;
        text-align: center;
        font-size: 24px ;
        font-weight: 700px ;
    }
</style>


<?php
/*
$rand=rand(9999,1000) ;
if(isset($_REQUEST['login']))
{
    $id=$_REQUEST['id'];
    $Password=$_REQUEST['Password'];
    $captcha=$_REQUEST['captcha'];
    $captcharandom = $_REQUEST['captcha-rand'];
    if($captcha!=$captcharandom)
    {?>
        <script type="text/javascript">
        alert("invalide captcha") 
        </script>
  <?php 
    }
    else
    {
        $select_query=mysqli_query(config ,"select * from client where id='$id' and Password='$Password' ");
        /*$pdo=config::getConnexion();
        $querY = "select * from client where id='$id' and Password='$Password' ";
        
        $result=mysqli_num_rows($select_query);
        if($result>0)
        {?>
            <script type="text/javascript">
            alert("login success") ;
            </script>
      <?php 
        }
        else
        {?>
            <script type="text/javascript">
            alert("invalide email and password"); 
            </script>
      <?php 

        }
    }
}
*/
?>

<body class="h-screen font-sans login bg-cover">
   

<div class="container mx-auto h-full flex flex-1 justify-center items-center">
        <div class="w-full max-w-lg">
            <div class="leading-loose">
                <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl"  method="post">
                    <p class="text-gray-800 font-medium">Sign-Up</p>
                    <div class="">
                        <label class="block text-sm text-gray-00" for="cus_name">id</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="id" name="id"
                            type="text" required="" placeholder="user name" aria-label="Name">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="cus_email">>Password</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="Password"
                            name="Password" type="password" required="" placeholder="Password" aria-label="Email" >
                    </div>

     <!--<div class="center">
        <h1 id="captchaHeading">Captcha Validator </h1>
        <div id="captchaBackground">
            <canvas id="captcha">captcha text</canvas>
            <input id="textBox" type="text" name="text">
            <div id="buttons">
                <input id="submitButton" type="submit">
                <button id="refreshButton" type="submit">Refresh</button>
            </div>
            <span id="output"></span>
        </div>
    </div>
    <script src="captcha.js"></script>
-->
    
                    <br><br>
                    <button type="submit" id="login" name="login"
		          class="btn btn-primary" >se connecter</button><br><br>
				  <div class="mb-1">
                  
            <a href="forgot_password.php" >forgot password ? </a>
            <br>.
		    <label class="form-label">Pas de compte ?</label>
		  </div>
				   <a href="register.php" >s'inscrire</a>
                   </form>
      </div>
      </div>
      </div>

                    <!--<div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="cus_email">Adresse</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email"
                            name="cus_email" type="text" required="" placeholder="Rue" aria-label="Email">
                    </div>
                    <div class="mt-2">
                        <label class="hidden text-sm block text-gray-600" for="cus_email">Provence</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email"
                            name="cus_email" type="text" required="" placeholder="Cité" aria-label="Email">
                    </div>
                    <div class="inline-block mt-2 w-1/2 pr-1">
                        <label class="hidden block text-sm text-gray-600" for="cus_email">Pays</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email"
                            name="cus_email" type="text" required="" placeholder="Pays" aria-label="Email">
                    </div>
                    <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                        <label class="hidden block text-sm text-gray-600" for="cus_email">Zip</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email"
                            name="cus_email" type="text" required="" placeholder="Zip" aria-label="Email">
                    </div>

                    <div class="mt-4">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                            type="submit">S'enregistrer</button>
                    </div>
                    <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800"
                        href="login.html">
                        Déjà enregistré ?
                    </a>
                </form>
            </div>
        </div>
    </div>-->

   <!-- <div class="container d-flex justify-content-center align-items-center"
    style="min-height: 100vh"
    
    
    >
      	<form class="border shadow p-3 rounded"
      	      action="php/check-login.php" 
      	      method="post" 
      	      style="width: 450px;">
      	      <h1 class="text-center p-3">LOGIN</h1>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
		  <div class="mb-3">
		    <label for="username" 
		           class="form-label">User name</label>
		    <input type="text" 
		           class="form-control" 
		           name="username" 
		           id="username">
		  </div>
		  <div class="mb-3">
		    <label for="password" 
		           class="form-label">Password</label>
		    <input type="password" 
		           name="password" 
		           class="form-control" 
		           id="password">
		  </div>-->
		  <!--<div class="mb-1">
		    <label class="form-label">Select User Type:</label>
		  </div>
		  <select class="form-select mb-3"
		          name="role" 
		          aria-label="Default select example">
			  <option selected value="utilisateur">utilisateur</option>
			  <option  value="organisateur">Organisateur</option>
			  <option value="admin">Admin</option>
		  </select>-->
		 
		  
		
      

</body>

</html>