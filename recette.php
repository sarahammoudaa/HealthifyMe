<?php
class recette
{
    private ?int $idr = null;
    private ?string $nom = null;
    private ?string $descriptionr = null;
    private ?string $instructions = null;
    private ?int $cooktime = null;
    private ?int $rating = null;
    private ?string $imagee = null; 
      
    

    public function __construct($idr = null, $n, $d, $i, $c, $r, $img )
    {
        $this->idr = $idr;
        $this->nom = $n;
        $this->descriptionr = $d;
        $this->instructions = $i;
        $this->cooktime = $c;
       $this->rating = $r;
        $this->imagee = $img; 
         
       
       
    }

    /**
     * Get the value of idClient
     */
    public function getidr()
    {
        return $this->idr;
    }

    /**
     * Get the value of lastName
     */
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getdescription()
    {
        return $this->descriptionr;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setdescription($descriptionr)
    {
        $this->descriptionr = $descriptionr;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getinstructions()
    {
        return $this->instructions;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setinstructions($instructions)
    {
        $this->instructions = $instructions;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getcooktime()
    {
        return $this->cooktime;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setcooktime($cooktime)
    {
        $this->cooktime = $cooktime;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getrating()
    {
        return $this->rating;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
     public function setrating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    public function getimage()
    {
        return $this->imagee;
    }

    public function setimage($imagee)
    {
        $this->imagee = $imagee;
        return $this;
    }
 



     
}

