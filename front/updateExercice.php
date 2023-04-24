<?php

include '../Controller/exerciceC.php';

$error = "";

// create exercice
$exercice = null;

// create an instance of the controller
$exerciceC = new exerciceC();
if (
    isset($_POST["ide"]) &&
    isset($_POST["nomEx"]) &&
    isset($_POST["categorie"]) 
) {
    if (
        !empty($_POST["ide"]) &&
        !empty($_POST['nomEx']) &&
        !empty($_POST["categorie"]) 
    ) {
        $exercice = new exercice(
            $_POST['ide'],
            $_POST['nomEx'],
            $_POST['categorie']
        );
        $exerciceC->updateExercice($exercice, $_POST["ide"]);
        header('Location:ListExercice.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="ListExercice.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['ide'])) {
        $exercice = $exerciceC->showExercice($_POST['ide']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="ide">Id exercice:
                        </label>
                    </td>
                    <td><input type="text" name="ide" id="ide" value="<?php echo $exercice['ide']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nomEx">nom Exercice:
                        </label>
                    </td>
                    <td><input type="text" name="nomEx" id="nomEx" value="<?php echo $exercice['nomEx']; ?>" maxlength="50"></td>
                </tr>
                <tr>
                    <td>
                        <label for="categorie">categorie:
                        </label>
                    </td>
                    <td><input type="text" name="categorie" id="categorie" value="<?php echo $exercice['categorie']; ?>" maxlength="50"></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>