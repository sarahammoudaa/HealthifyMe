<!--model-->
<?php
class productproblem {
    private $idp;
    private $idproduct;
    private $ID;
  
    function __construct($idp, $idproduct, $ID) {
      $this->idp = $idp;
      $this->idproduct = $idproduct;
      $this->ID = $ID;
    }

    //GETTERS
    function getidp() {
      return $this->idp;
    }

      function getIdProduct() {
        return $this->idproduct;
      }

      function getID() {
        return $this->ID;
      }
    

      //SETTERS
      function setidp($idp) {
        $this->idp = $idp;
      }

      function setIdProduct($idproduct) {
        $this->idproduct = $idproduct;
      }

      function setID($ID) {
        $this->ID = $ID;
      }
    
    }
?>