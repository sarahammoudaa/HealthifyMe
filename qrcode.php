<?php

require_once '../Controller/exerciceC.php';

$exerciceC = new exerciceC();
$list = $exerciceC->listExercice();

// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=healthifyme';
$username = 'nom_utilisateur';
$password = 'mot_de_passe';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 
try {
    $db = new PDO(
        'mysql:host=localhost;dbname=healthifyme',
        'root',
        '');
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

// Fonction pour générer le contenu du QR code pour un exercice donné
function generate_qr_content($exercice) {
    $qr_content = "Nom Exercice  : " . $exercice['nomEx'] . "\n";
    $qr_content .= "nombre de repetition : " . $exercice['nbr_rep'] . "\n";
    $qr_content .= "categorie : " . $exercice['categorie'] . "\n";
    $qr_content .= "ID Program : " . $exercice['idp'];
    return $qr_content;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Program list</title>
</head>

<!-- Template Main CSS Files -->
    <link href="variables.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
<body>
    <h1>Program list</h1>
    <table>
        <thead>
            <tr>
                <th>Nom Exercice</th>
                <th>Nombre de repetition</th>
                <th>categorie</th>
                <th>ID Program</th>
                <th>QR Code</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $exercice) { ?>
            <tr>
                <td><?php echo $exercice['nomEx']; ?></td>
                <td><?php echo $exercice['nbr_rep']; ?></td>
                <td><?php echo $exercice['categorie']; ?></td>
                <td><?php echo $exercice['idp']; ?></td>
                <td>
                    <form method="post" action="generate_qr.php">
                        <input type="hidden" name="qr_content" value="<?php echo generate_qr_content($exercice); ?>">
                        <input type="submit" value="QR Code">
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
