<?php
class ingredient
{
    private ?int $idi = null;
    private ?string $nom = null;
    private ?string $descriptioni = null;
    private ?string $categoriei = null;
    private ?int $prix = null;
    private ?string $idr = null;
    

    public function __construct($idi = null, $n, $d, $c, $p, $i)
    {
        $this->idi = $idi;
        $this->nom = $n;
        $this->descriptioni = $d;
        $this->categoriei = $c;
        $this->prix = $p;
        $this->idr = $i;
    }

    /**
     * Get the value of idClient
     */
    public function getidi()
    {
        return $this->idi;
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
        return $this->descriptioni;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setdescription($descriptioni)
    {
        $this->descriptioni = $descriptioni;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getcategorie()
    {
        return $this->categoriei;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setcategorie($categoriei)
    {
        $this->categoriei = $categoriei;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getprix()
    {
        return $this->prix;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }
    /**
     * Get the value of lastName
     */
    public function getidr()
    {
        return $this->idr;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setidr($idr)
    {
        $this->idr = $idr;

        return $this;
    }
    
}
