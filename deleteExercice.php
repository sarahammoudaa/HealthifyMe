<?php
include '../Controller/exerciceC.php';
$exerciceC = new exerciceC();
$exerciceC->deleteExercice($_GET["ide"]);
header('Location:ListExercice.php');
