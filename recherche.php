
<?php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet";

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Check if the search input is set
    if(isset($_POST['search'])){
        // Sanitize the search input
        $search = htmlspecialchars($_POST['search']);
        
        // Prepare and execute the search query
        $stmt = $conn->prepare("SELECT * FROM client WHERE nom LIKE :search OR id LIKE :search OR adress LIKE :search");
        $stmt->bindValue(':search', "%{$search}%", PDO::PARAM_STR);
        $stmt->execute();
        
        // Fetch the search results as an associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Return the search results as a JSON object
        echo json_encode($results);
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


?>
