<?php
require_once '../controller/skincarec.php';

// Initialize variables
$problem_id = isset($_GET['problem_id']) ? $_GET['problem_id'] : null;
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;

// Check if both IDs are set before proceeding
if (!$problem_id || !$product_id) {
    echo "Error: missing problem or product ID";
    exit();
}

// Retrieve problem data from database
try {
    $pdo = config::getConnexion();
    $query = "SELECT ID FROM problems WHERE ID = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(":id", $problem_id);
    $stmt->execute();
    $problems = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}

// Retrieve product data from database
try {
    $pdo = config::getConnexion();
    $query = "SELECT id FROM products WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(":id", $product_id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}

// Insert a new record to the productproblem table
$sql = "INSERT INTO productproblem (ID, idproduct) VALUES (:idproblem, :idproduct)";
$db = config::getConnexion();
try {
    $query = $db->prepare($sql);
    $query->execute([
        'idproblem' => $problems['ID'],
        'idproduct' => $product['id']
    ]);
    header("Location:addsolution.php");
    echo "Product added successfully";
} catch(Exception $e) {
    throw $e;
}
?>
