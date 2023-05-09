<?php



class Client{

        private $id;
        private $nom;
        private $prenom;
        private $adress;
        private $age;
        private $Password;
        private $Role;



        public function __construct($nom,$prenom,$adress,$age,$Password,$Role)
        {
               //$this->idClient=$id;
                $this->nom=$nom;
                $this->prenom=$prenom;
                $this->adress=$adress;
                $this->age=$age;
                $this->Password=$Password;
                $this->Role=$Role;

        }

//Getters
        public function getIdClient(){
            return $this->id;
        }
        public function getLastName(){
            return $this->nom;
        }
        public function getFirstName(){
            return $this->prenom;
        }
        public function getAdress(){
            return $this->adress;
        }
        public function getDoB(){
            return $this->age;
        }
        public function getPassword(){
            return $this->Password ;
        }
        public function getRole(){
            return $this->Role ;
        }

//Setters

public function setLastName($nom){
    return $this->nom=$nom;
}
public function setFirstName($prenom){
    return $this->prenom=$prenom;
}
public function setAdress($a){
    return $this->adress=$a;
}

public function setDoB($a){
    return $this->age=$a;
}
public function setPassword($a){
    return $this->Password=$a;
}
public function setRole($a){
    return $this->Role=$a;
}




}


?>