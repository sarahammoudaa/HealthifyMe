<?php

include ('../config.php') ;

    class ClientC{

        public function listClient(){
                $sql="SELECT * from client";

                $pdo=config::getConnexion();

                try{

                   $list= $pdo->query($sql);
                   return $list;
                }catch(Exception $e){
                    die('Erreur' . $e->getMessage());
                
                }
            }

         public function deleteClient($id){
                    $sql = "DELETE FROM client WHERE id = :id";
        
                    $pdo=config::getConnexion();
        
        
        
                    try {
                       
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue(":id", $id);
                        $stmt->execute();
                        echo "Le client a été supprimé avec succès";
                    } catch (PDOException $e) {
                        echo "Erreur : " . $e->getMessage();
                    }
        
                }
        
                
          
        
        
             public function addClient($client) {
        
                    $pdo=config::getConnexion();

                    try {
                        $query = "INSERT INTO client VALUES (NULL,:nom,:prenom,:adress,:age,:Password,:Role)";        
                        $stmt = $pdo->prepare($query);
                        //$stmt->bindValue(":id", $client->getIdClient());

                        $stmt->bindValue(":nom", $client->getLastName());
                        $stmt->bindValue(":prenom", $client->getFirstName());
                  
                        $stmt->bindValue(":adress", $client->getAdress());
                        $stmt->bindValue(":age", $client->getDoB());
                        $stmt->bindValue(":Password", $client->getPassword());
                        $stmt->bindValue(":Role", $client->getRole());
                         $stmt->execute() ;
                        echo " client a ete ajoute avec succes";
                    } catch (PDOException $e) {
                        echo "Erreur : " . $e->getMessage();
                    }
                }
                



                function modify($client,$id)
                {
                    try {
                        $db =config::getConnexion();
                        $query = $db->prepare(
                            'UPDATE client SET 
                                
                                nom=:nom,
                                prenom=:prenom,
                                adress=:adress,
                                age=:age,
                                Password=:Password 
                    
                            WHERE id= :id '
                        );
                        $query->execute([
                            'id' => $id,
                            'nom' => $client->getLastName(),
                            'prenom' => $client->getFirstName(),
                            'adress' => $client->getAdress(),
                            'age' => $client->getDoB(),
                            'Password' => $client->getPassword()
                            
                        ]);
                        echo $query->rowCount() . " records UPDATED successfully <br>";
                    } catch (PDOException $e) {
                        $e->getMessage();
                    }
                } 



                function showReclamation($id)
                {
                    $sql = "SELECT * from client where id = $id";
                    $db = config::getConnexion();
                    try {
                        $query = $db->prepare($sql);
                        $query->execute();
            
                        $client = $query->fetch();
                        return $client;
                    } catch (Exception $e) {
                        die('Error: ' . $e->getMessage());
                    }
                }
            }




            
                    
                    
        
                
        
        
        
           // }
        
        

        
