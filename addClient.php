<?php
include '../controller/clientc.php';
require_once "../model/client.php";


$ClientC= new ClientC() ;
if (
  isset($_POST["id"]) &&
  isset($_POST["nom"]) &&
  isset($_POST["prenom"])&&
  isset($_POST["adress"]) &&
  isset($_POST["age"]) &&
  isset($_POST["Password"]) 

){
  if(
    !empty($_POST["id"]) &&
    !empty($_POST["nom"]) &&
    !empty($_POST["prenom"]) &&
    !empty($_POST["adress"]) &&
    !empty($_POST["age"]) &&
    !empty($_POST["Password"]) 
     ){
  $client = new Client(
    $_POST['id'],
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


<html>
  

<head>
      
        <link rel="stylesheet" href="styleeee.css">
</head>

<body>
  
  <div class="form">
  
    <a href="listClient.php" class="back_btn"><img src="images/back.png">Retour</a>
    <h1>Ajouter un employer</h1>
    <p class="erreur_message">
      veuillez remplir tous les champs 
</p>

<form method="post" action="" >
<label>Id</label>
<input type="text" name="id">
<label>Nom</label>
<input type="text" name="nom">
<label>Prenom</label>
<input type="text" name="prenom">
<label>Adress</label>
<input type="text" name="adress">
<label>Age</label>
<input type="text" name="age">
<label>password</label>
<input type="text" name="Password">
<input type="submit" value="ajouter" name="button" >
</from> 
  </div>




</body>

</html>
