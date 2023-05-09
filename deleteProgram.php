<?php
include '../Controller/programmeC.php';
$programmeC = new programmeC();
$programmeC->deleteProgram($_GET["idp"]);
header('Location:ListProgram.php');
