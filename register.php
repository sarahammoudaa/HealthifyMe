<?php
include '../controller/clientc.php';
require_once "../model/client.php";


$ClientC= new ClientC() ;
if (
  isset($_POST["nom"]) &&
  isset($_POST["prenom"])&&
  isset($_POST["adress"]) &&
  isset($_POST["age"]) &&
  isset($_POST["Password"]) 

){
  if(
    !empty($_POST["nom"]) &&
    !empty($_POST["prenom"]) &&
    !empty($_POST["adress"]) &&
    !empty($_POST["age"]) &&
    !empty($_POST["Password"]) 
     ){
  $client = new Client(
    $_POST['nom'],
    $_POST['prenom'],
    $_POST['adress'],
    $_POST['age'],
    $_POST['Password'],
	'Client'
  );
  $ClientC->addClient($client);
  //header('location::listClient.php');
  }else{
  $error="missing information" ;
}
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

<body class="h-screen font-sans login bg-cover">
   

<div class="container mx-auto h-full flex flex-1 justify-center items-center">
        <div class="w-full max-w-lg">
            <div class="leading-loose">
                <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="post">
                    <p class="text-gray-800 font-medium">Sign-Up</p>
                    <div class="">
                        <label class="block text-sm text-gray-00" for="cus_name">id</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="id" name="id"
                            type="text" required="" placeholder="id" aria-label="id">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="cus_email">nom</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="nom"
                            name="nom" type="text" required="" placeholder="nom" aria-label="nom">
                    </div>
                    <!--<button type="submit" 
		          class="btn btn-primary">se connecter</button><br><br>
				  <div class="mb-1">
		    <label class="form-label">Pas de compte ?</label>
		  </div>
				   <a href="inscrire.php" >s'inscrire</a>
                   </form>
      </div>
      </div>
      </div>-->

                   <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="cus_email">prenom</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="prenom"
                            name="prenom" type="text" required="" placeholder="prenom" aria-label="prenom">
                    </div>
                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="cus_email">adress</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="adress"
                            name="adress" type="text" required="" placeholder="adress" aria-label="adress">
                    </div>
                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="cus_email">age</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="age"
                            name="age" type="text" required="" placeholder="age" aria-label="age">
                    </div>
                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="cus_email">Password</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="Password"
                            name="Password" type="text" required="" placeholder="Password" aria-label="Password">
                    </div>

                    <div class="mt-4">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                            type="submit" value="ajouter" name="button" >S'enregistrer</button>
                    </div>
                    <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800"
                        href="login.php">
                        Déjà enregistré ?
                    </a>
                </form>
            </div>
        </div>
    </div>

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