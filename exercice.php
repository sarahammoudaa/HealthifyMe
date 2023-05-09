<?php
class exercice
{
    private ?int $ide = null;
    private ?string $nomEx = null;
    private ?int $nbr_rep = null;
    private ?string $categorie = null;
    private ?int $idp = null;
    //private ?DateTime $dob = null;

    public function __construct($id = null, $n,$nbr, $c,$idp)
    {
        $this->ide = $id;
        $this->nomEx = $n;
        $this->nbr_rep = $nbr;
        $this->categorie = $c;
        $this->idp = $idp;
        
        //$this->dob = $d;
    }

    /**
     * Get the value of idExercice
     */
    public function getidExercice()
    {
        return $this->ide;
    }

    /**
     * Get the value of nomEX
     */
    public function getnomEx()
    {
        return $this->nomEx;
    }

    /**
     * Set the value of nomEX
     *
     * @return  self
     */
    public function setnomEX($nomEX)
    {
        $this->nomEX = $nomEX;

        return $this;
    }

    /**
     * Get the value of nbr_rep
     */
    public function getnbr_rep()
    {
        return $this->nbr_rep;
    }

    /**
     * Set the value of nbr_rep
     *
     * @return  self
     */
    public function setnbr_rep($nbr_rep)
    {
        $this->nbr_rep = $nbr_rep;

        return $this;
    }

    /**
     * Get the value of categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of categorie
     *
     * @return  self
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }
    /**
     * Get the value of idp
     */
    public function getidp()
    {
        return $this->idp;
    }

    /**
     * Set the value of idp
     *
     * @return  self
     */
    public function setidp($idp)
    {
        $this->idp = $idp;

        return $this;
    }
}
