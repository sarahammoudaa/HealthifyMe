<!--model-->
<?php
class product {
    private $id;
    private $skin_type;
    private $product;
    private $producttype;
  
    function __construct($id, $skin_type, $product, $producttype) {
      $this->id = $id;
      $this->skin_type = $skin_type;
      $this->product = $product;
      $this->producttype = $producttype;
    }

    //GETTERS
    function getid() {
      return $this->id;
    }

      function getSkinType() {
        return $this->skin_type;
      }

      function getProduct() {
        return $this->product;
      }
    
      function getProductType() {
        return $this->producttype;
      }

      //SETTERS
      function setid($id) {
        $this->id = $id;
      }

      function setSkinType($skintype) {
        $this->skintype = $skin_type;
      }

      function setProduct($ID) {
        $this->product = $product;
      }
    
      function setProductType($problem) {
        $this->producttype = $producttype;
      }
    }
?>