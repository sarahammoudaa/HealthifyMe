<?php
include '../config.php';
include '../model/solutions.php';
include '../model/problems.php';
include '../model/product.php';
include '../model/productproblem.php';

//problemsc
class problemsc{
    public function listproblems(){
        $sql="SELECT * from problems";
        $pdo= config::getConnexion();
        try{
        $list=$pdo->query($sql);
        return $list;
        }
        catch(Exeption $e){
            die('Erreur'.$e->getMeesage());
        }
    }

    function addproblem($problems) {
        $sql = "INSERT INTO problems(skintype, problem, responded) VALUES (:skintype, :problem, :responded)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'skintype' => $problems->getSkinType(),
                'problem' => $problems->getProblem(),
                'responded' => false
            ]);
            echo "Les informations ont été ajoutées avec succès";
        } catch(Exception $e) {
            throw $e;
        }
    }

    public function Deleteproblem($ID)
    {

        $sql = "DELETE FROM problems WHERE ID=:ID ";
        $db = config::getConnexion();

        try {
            $req = $db->prepare($sql);
            $req->bindValue(':ID', $ID);
            $req->execute();

            echo "les informations ont été supproimé avec succés";
        } catch (PDOException $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

function updateProblem($problems, $id)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE problems SET 
                ID = :id,
                skintype = :skintype,
                problem = :problem 
            WHERE ID = :exid'
        );
        $query->execute([
            'exid' => $id,
            'id' => $problems->getID(),
            'skintype' => $problems->getSkinType(),
            'problem' => $problems->getProblem(),
        ]);
        echo $query->rowCount() . " informations UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}

public function showproblem($problem){
    $sql="SELECT * FROM problems WHERE problem=:problem";
    echo $sql;
    $db = config::getConnexion();
    try{
        $req = $db->prepare($sql);
        $req->bindValue(':problem', $problem);
        $req->execute();
        $list = $req->fetchAll();
        return $list;
    }
    catch(Exception $e){
        die('Erreur'.$e->getMessage());
    }
}

public function listProbSol($ID){
    $sql="SELECT p.ID, p.problem, s.ids, s.solution FROM problems p JOIN solutions s ON p.ID=s.ID  WHERE p.ID = :id ";
    echo $sql;
    $db = config::getConnexion();
    try{
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ID);
        $req->execute();
        $list = $req->fetchAll();
        return $list;
    }
    catch(Exception $e){
        die('Erreur'.$e->getMessage());
    }

}
public function listProbProd($ID){
    $sql="SELECT  p.id, p.skintype, p.product, p.producttype, p.rate FROM products p JOIN productproblem pp ON p.id=pp.ID Where pp.idproduct = :id ";
    echo $sql;
    $db = config::getConnexion();
    try{
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ID);
        $req->execute();
        $list = $req->fetchAll();
        return $list;
    }
    catch(Exception $e){
        die('Erreur'.$e->getMessage());
    }

}

public function ajouterRate($id, $avis)
{
    $pdo = config::getConnexion();
    try {
        // Récupérer la valeur existante de avis
        $query = "SELECT rate FROM products WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $avis_existant = (int)$result['rate']; // conversion de la valeur en entier
        
        // Ajouter la nouvelle valeur de avis à la valeur existante
        $nouveau_avis = $avis_existant + (int)$avis; // conversion de la valeur en entier
        
        // Mettre à jour la base de données avec la nouvelle valeur de avis
        $query = "UPDATE products SET rate = :nouveau_avis WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":nouveau_avis", $nouveau_avis);
        $stmt->execute();
        
        echo "L'avis a été ajouté avec succès au plat ayant l'ID : " . $id;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }

    echo "<script>";
    echo "console.log('Ancienne valeur de avis : " . $avis_existant . "');";
    echo "console.log('Valeur à ajouter : " . $avis . "');";
    echo "console.log('Résultat final : " . $nouveau_avis . "');";
    echo "</script>";
    

    echo "<script>window.location.replace('listclients.php');</script>";

}

}

//solutionsc
class solutionsc{
    public function listsolutions(){
        $sql="SELECT * from solutions";
        $pdo= config::getConnexion();
        try{
        $list=$pdo->query($sql);
        return $list;
        }
        catch(Exeption $e){
            die('Erreur'.$e->getMeesage());
        }
    }

    function addsolution($solutions) {
        $sql = "INSERT INTO solutions(ID, solution, avis)
                VALUES (:ID, :solution, :avis)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'ID' => $solutions->getID(),
                'solution' => $solutions->getSolution(),
                'avis' => '0',
            ]);
            // Update responded column in problems table to true
             $sql = "UPDATE problems SET responded = true WHERE ID = :ID";
             $query = $db->prepare($sql);
             $query->execute(['ID' => $solutions->getID()]);

            echo "les informations ont été ajoutées avec succès";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    


    public function Deletesolution($ids)
    {

        $sql = "DELETE FROM solutions WHERE ids=:ids ";
        $db = config::getConnexion();

        try {
            $req = $db->prepare($sql);
            $req->bindValue(':ids', $ids);
            $req->execute();

            echo "les informations ont été supproimé avec succés";
        } catch (PDOException $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function updatesolution($solutions)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE solutions SET 
                ID = :ID,
                solution = :solution, 
            WHERE ids = :ids'
        );
        $query->execute([
            'ids' => $solutions->getids(),
            'ID' => $solutions->getID(),
           'solution' => $solutions->getSolution(),
            ]);
        echo $query->rowCount() . " Informations UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


}


    



//productc
class productc{
    public function listproduct(){
        $sql="SELECT * from products";
        $pdo= config::getConnexion();
        try{
        $list=$pdo->query($sql);
        return $list;
        }
        catch(Exeption $e){
            die('Erreur'.$e->getMeesage());
        }
    }

    function addproduct($product) {
        $sql = "INSERT INTO products(skintype, product, producttype, rate)
                VALUES (:skintype, :product, :producttype, :rate)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'skintype' => $product->getSkinType(),
                'product' => $product->getProduct(),
                'producttype' => $product->getProductType(),
                'rate' => '0'
            ]);
            echo "les informations ont été ajoutées avec succès";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    


    public function Deleteproduct($id)
    {

        $sql = "DELETE FROM products WHERE id=:id ";
        $db = config::getConnexion();

        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();

            echo "les informations ont été supproimé avec succés";
        } catch (PDOException $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function updateproduct($product)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE products SET 
                skintype = :skintype,
                product = :product, 
                producttype = :producttype
            WHERE id = :id'
        );
        $query->execute([
            'id' => $product->getId(),
            'skintype' => $product->getSkinType(),
            'product' => $product->getProduct(),
            'producttype' => $product->getProductType(),
        ]);
        echo $query->rowCount() . " Informations UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
 

}

//productproblemc
class productproblemc{
    function addproductproblemc($productproblem){
        $sql = "INSERT INTO productproblem (idproduct, ID) VALUES (:idproduct, :ID)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'idproduct' => $productproblem->getIdProduct(),
                'ID' => $productproblem->getID(),
        ]);
        header("Location:addsolution.php");
        echo "Product added successfully";
    } catch(Exception $e) {
        throw $e;
    }
    }
}


?>

