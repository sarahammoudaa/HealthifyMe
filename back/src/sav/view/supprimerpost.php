<?php
	include '../Controller/postC.php';
	$postC=new postC();
	$postC->supprimerpost ($_GET["id"]);
	header('Location:afficherpost.php');
?>