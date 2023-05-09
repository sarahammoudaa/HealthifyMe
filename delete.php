<?php
include '../controller/clientc.php';

//include '../config1.php';

$client = new ClientC();
 $client->deleteClient($_GET['id']) ;
header("Location:afficherclient.php");

?>