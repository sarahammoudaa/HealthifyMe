<?php

// Inclusion de la bibliothèque QR Code
require_once 'phpqrcode/qrlib.php';

// Récupération du contenu du QR Code
$qr_content = $_POST['qr_content'];

// Génération du QR Code
QRcode::png($qr_content);

?>
