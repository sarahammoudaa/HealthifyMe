<?php
include '../config.php';
include '../Model/exercice.php';

class exerciceC
{
    public function listExercice()
    {
        $sql = "SELECT * FROM exercice";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteExercice($id)
    {
        $sql = "DELETE FROM exercice WHERE ide = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addExercice($exercice)
    {
        $sql = "INSERT INTO exercice  
        VALUES (NULL, :nom,:nbr,:cat,:idp)";
        $db = config::getConnexion();
        try {
            //print_r($exercice->getDob()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $exercice->getnomEx(),
                'nbr' => $exercice->getnbr_rep(),
                'cat' => $exercice->getCategorie(),
                'idp' => $exercice->getidp()

                //'dob' => $exercice->getDob()->format('Y/m/d')
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateExercice($exercice, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE exercice SET 
                    nomEx = :nomEx,
                    nbr_rep = :nbr_rep, 
                    categorie = :categorie,
                    idp = :idp  
                    
                WHERE ide= :ide'
            );
            $query->execute([
                'ide' => $id,
                'nomEx' => $exercice->getnomEx(),
                'nbr' => $exercice->getnbr_rep(),
                'categorie' => $exercice->getCategorie(),
                'idp' => $exercice->getidp()
                
                //'dob' => $client->getDob()->format('Y/m/d')
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showExercice($id)
    {
        $sql = "SELECT * from exercice where ide = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $exercice = $query->fetch();
            return $exercice;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function trierParNumPlace()
    {
        $sql = "SELECT * FROM exercice ORDER BY nbr_rep";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }

    }
}
