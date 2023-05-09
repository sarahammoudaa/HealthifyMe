<?php
include '../../config.php';
include '../../model/ingredient.php';

class ingredientc
{
    public function listingredients()
    {
        $sql = "SELECT * FROM ingredient";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteingredient($idi)
    {
        $sql = "DELETE FROM ingredient WHERE idi = :idi";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idi', $idi);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addingredient($ingredient)
    {
        $sql = "INSERT INTO ingredient  
        VALUES (NULL, :nom,:descriptioni, :categoriei,:prix,:idr)";
        $db = config::getConnexion();
        try {
            /*print_r($ingredient->getDob()->format('Y-m-d'));*/
            $query = $db->prepare($sql);
            $query->execute([
                //'idi' => $ingredient->getidi(),
                'nom' => $ingredient->getnom(),
                'descriptioni' => $ingredient->getdescription(),
                'categoriei' => $ingredient->getcategorie(),
                'prix' => $ingredient->getprix(),
                'idr' => $ingredient->getidr(),
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateingredient($ingredient, $idi)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE ingredient SET 
                    nom = :nom, 
                    descriptioni = :descriptioni, 
                    categoriei = :categoriei, 
                    prix = :prix,
                    idr = :idr
                WHERE idi= :idi'
            );
            $query->execute([
                'idi' => $idi,
                'nom' => $ingredient->getnom(),
                'descriptioni' => $ingredient->getdescription(),
                'categoriei' => $ingredient->getcategorie(),
                'prix' => $ingredient->getprix(),
                'idr' => $ingredient->getidr(),
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showingredient($idi)
    {
        $sql = "SELECT * from ingredient where idi = $idi";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $ingredient = $query->fetch();
            return $ingredient;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
