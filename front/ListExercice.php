<?php
include '../Controller/exerciceC.php';
$exerciceC = new exerciceC();
$list = $exerciceC->listExercice();
?>




<!-- <html>

<head></head>

<body>

    <center>
        <h1>List of exercice</h1>
        <h2>
            <a href="addExercice.php">Add exercice</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id Exercice</th>
            <th>nom Exercice</th>
            <th>Categorie</th>
            
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $exercice) {
        ?>
            <tr>
                <td><?= $exercice['ide']; ?></td>
                <td><?= $exercice['nomEx']; ?></td>
                <td><?= $exercice['categorie']; ?></td>
                
                <td align="center">
                    <form method="POST" action="updateExercice.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $exercice['ide']; ?> name="ide">
                    </form>
                </td>
                <td>
                    <a href="deletExercice.php?ide=<?php echo $exercice['ide']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html> -->


