<?php

include_once("../controller/config.php");
include_once("../model/comment.php");

class commentC
{
	function __construct() {
        
    }

    public function getcommentById($id)
    {
        $db = config::getConnexion();
        $stmt = $db->prepare('SELECT * FROM comment WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return new comment($result['id'], $result['time'], $result['content'], $result['userID']);
        } else {
            return null;
        }
    }
	
    public function affichercomment()
	
    {
        $sql = "SELECT * FROM comment";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    public function supprimercomment($id)
    {
        $sql = "DELETE FROM comment WHERE id=:id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    public function ajoutercomment($comment)
    {
        $sql = "INSERT INTO comment (time, content,userID) 
                VALUES (:time,:content, :userID)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'time' => $comment->gettime(),
                'content' => $comment->getcontent(),
                'userID' => $comment->getuserID(),
                
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function recuperercomment($id)
    {
        $sql = "SELECT * from comment where id=$id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $comment = $query->fetch();
            return $comment;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

}
?>