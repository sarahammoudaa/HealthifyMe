<?php

include_once("../controller/config.php");
include_once("../model/post.php");
class postC
{
	function __construct() {
        
    }

    public function getpostById($id)
    {
        $db = config::getConnexion();
        $stmt = $db->prepare('SELECT * FROM post WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return new post($result['id'], $result['title'], $result['content'], $result['topicID'], $result['userID']);
        } else {
            return null;
        }
    }
	
    public function afficherpost()
	
    {
        $sql = "SELECT * FROM post";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    public function supprimerpost($id)
    {
        $sql = "DELETE FROM post WHERE id=:id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    public function ajouterpost($post)
    {
        $sql = "INSERT INTO post (title, content,topicID,userID) 
                VALUES (:title,:content, :topicID, :userID)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'title' => $post->gettitle(),
                'content' => $post->getcontent(),
                'topicID' => $post->gettopicID(),
                'userID'=> $post->getuserID(),
                
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function recupererpost($id)
    {
        $sql = "SELECT * from post where id=$id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $post = $query->fetch();
            return $post;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function modifierpost($post, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE post SET 
                    title= :title,
                    content = :content, 
                    topicID= :topicID,
                    userID= :userID
                WHERE id= :id'
            );
            $query->execute([
                'id' => $post->getid(),
                'title' => $post->gettitle(),
                'content' => $post->getcontent(),
                'topicID' => $post->gettopicID(),
                'userID' => $post->getuserID(),

                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
}
?>