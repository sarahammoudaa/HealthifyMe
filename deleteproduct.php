<?php
	include '../controller/skincarec.php';
	$product=new productc();

$product->Deleteproduct($_GET["id"]);
header("Location:listproduct.php");
?>