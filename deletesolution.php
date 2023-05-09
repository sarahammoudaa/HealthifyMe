<?php
	include '../controller/skincarec.php';
	$solutions=new solutionsc();

$solutions->Deletesolution($_GET["id"]);
header("Location:listsolutions.php");
?>