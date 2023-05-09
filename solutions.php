<!--model-->
<?php
class solutions {
    private $ids;
    private $ID;
    private $solution;
    private $avis;
  
    function __construct($ids, $ID, $solution, $avis) {
      $this->ids = $ids;
      $this->ID = $ID;
      $this->solution = $solution;
      $this->avis = $avis;
    }

    //GETTERS
    function getids() {
      return $this->ids;
    }

      function getID() {
        return $this->ID;
      }

      function getsolution() {
        return $this->solution;
      }

      function getAvis() {
        return $this->avis;
      }
      //SETTERS
      function setids($ids) {
        $this->ids = $ids;
      }

      function setID($ID) {
        $this->ID = $ID;
      }

      function setSolution($solution) {
        $this->solution = $solution;
      }

      function setAvis($avis) {
        $this->solution = $avis;
      }
    }
?>