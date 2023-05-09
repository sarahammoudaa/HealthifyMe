<?php
include '../config2.php';
include '../Model/programme.php';

class programmeC
{
    public function listProgram()
    {
        $sql = "SELECT * FROM programme";
        $db = config2::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteProgram($id)
    {
        $sql = "DELETE FROM programme WHERE idp = :id";
        $db = config2::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addProgram($programme)
    {
        $sql = "INSERT INTO programme  
        VALUES (NULL, :nomp, :obj,:idex)";
        $db = config2::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'nomp'=> $programme->getnomProg(),
                'obj' => $programme->getObjectif(),
                'idex' => $programme->getduree()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateProgram($programme, $id)
    {
        try {
            $db = config2::getConnexion();
            $query = $db->prepare(
                'UPDATE programme SET 
                    nomProg = :nomProg, 
                    objectif = :objectif, 
                    duree = :duree
                WHERE idp= :idp'
            );
            $query->execute([
                'idp' => $id,
                'nomProg'=>$programme->getnomProg(),
                'objectif' => $programme->getObjectif(),
                'duree' => $programme->getduree()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showProgram($id)
    {
        $sql = "SELECT * from programme where idp = $id";
        $db = config2::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $programme = $query->fetch();
            return $programme;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
