<?php
	include '../controller/skincarec.php';
	$problems=new problemsc();

$problems->Deleteproblem($_GET["id"]);
header("Location:listProblems.php");
?>