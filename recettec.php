<?php
include '../../config2.php';
include '../../model/recette.php';

class recettec
{
    public function listrecettes()
    {
        $sql = "SELECT * FROM recette";
        $db = config2::getConnexion();
        try {
            $liste2 = $db->query($sql);
            return $liste2;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleterecette($idr)
    {
        $sql = "DELETE FROM recette WHERE idr = :idr";
        $db = config2::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idr', $idr);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addrecette($recette)
    {
        $sql = "INSERT INTO recette 
        VALUES (NULL, :nom,:descriptionr, :instructions,:cooktime, :rating , :imagee)";
        $db = config2::getConnexion();
        try {
            /*print_r($ingredient->getDob()->format('Y-m-d'));*/
            $query = $db->prepare($sql);
            $query->execute([
                //'idr' => $ingredient->getidr(),
                'nom' => $recette->getnom(),
                'descriptionr' => $recette->getdescription(),
                'instructions' => $recette->getinstructions(),
                'cooktime' => $recette->getcooktime(),
                'rating' => $recette->getrating(),
                'imagee' => $recette->getimage(),
                 
                
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updaterecette($recette, $idr)
    {
        try {
            $db = config2::getConnexion();
            $query = $db->prepare(
                'UPDATE recette SET 
                    nom = :nom, 
                    descriptionr = :descriptionr, 
                    instructions = :instructions, 
                    cooktime = :cooktime,
                    rating = :rating,
                     imagee = :imagee
                    
                   
                WHERE idr= :idr'
            );
            $query->execute([
                'idr' => $idr,
                'nom' => $recette->getnom(),
                'descriptionr' => $recette->getdescription(),
                'instructions' => $recette->getinstructions(),
                'cooktime' => $recette->getcooktime(),
                'rating' => $recette->getrating(),
                'imagee' => $recette->getimage(), 
                
            
                
                
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showrecette($idr)
    {
        $sql = "SELECT * from recette where idr = $idr";
        $db = config2::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $recette = $query->fetch();
            return $recette;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
