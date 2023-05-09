<?php
require_once '../controller/skincarec.php';

if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $ID = $_POST['ID'];
    $skintype = $_POST['skintype'];
    $problem = $_POST['problem'];

    // Mettre à jour la réservation dans la base de données
    try {
        $pdo = config::getConnexion();
        $query = "UPDATE problems SET skintype = :skintype, problem = :problem WHERE ID = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(":id", $ID);
        $stmt->bindValue(":skintype", $skintype);
        $stmt->bindValue(":problem", $problem);
        $stmt->execute();      
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
     // Redirect to showproblem.php
     header("Location: showproblem.php?problem=" . $problem);
     exit;      
}

// Récupérer les données de la réservation à modifier en utilisant l'ID de la réservation
if (isset($_GET['id'])) {
    try {
        $pdo = config::getConnexion();
        $query = "SELECT * FROM problems WHERE ID = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(":id", $_GET['id']);
        $stmt->execute();
        $problems = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
   
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ac87c673ce.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <!--update-->
<div class="col-md-9">
              <div class="contact-form text-center">
              <form action="#" method="post">
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="ID">ID:</label>
                          <div class="col-sm-10">
                              <input type="hidden" name="ID" value="<?php echo $problems['ID']; ?>" readonly>
                              <span><?php echo $problems['ID']; ?></span>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="skintype">Skin Type:</label>
                          <div class="col-sm-10">
                              <select class="form-control" id="skintype" name="skintype" required>
                                  <option value="">-- Select skin type --</option>
                                  <option value="normal" <?php if ($problems['skintype'] == 'normal') {echo 'selected';} ?>>Peau normale</option>
                                  <option value="oily" <?php if ($problems['skintype'] == 'oily') {echo 'selected';} ?>>Peau grasse</option>
                                  <option value="dry" <?php if ($problems['skintype'] == 'dry') {echo 'selected';} ?>>Peau sèche</option>
                                  <option value="combination" <?php if ($problems['skintype'] == 'combination') {echo 'selected';} ?>>Peau mixte</option>
                              </select>
                          </div>
                      </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="problem">Problem:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="problem" id="problem" value="<?php echo $problems ['problem']; ?>" placeholder="problem" required>
                    </div>
                  </div>
              </div>
              <div class="form-group">        
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default" name="submit" >Modify</button>
                                    </div>
                                </div>
            </form>
          </div>
          </div>
           <!--end update-->
</body>
</html>