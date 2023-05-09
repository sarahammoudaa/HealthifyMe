<?php
class programme
{
    private ?int $idp = null;
    private ?string $nomProg = null;
    private ?string $objectif = null;
    private ?string $duree = null;
    

    public function __construct($id = null, $nomp, $obj, $ide)
    {
        $this->idp = $id;
        $this->nomProg = $nomp;
        $this->objectif = $obj;
        $this->duree = $ide;
        
    }

    /**
     * Get the value of idProgram
     */
    public function getIDprogram()
    {
        return $this->idp;
    }
    //get nomPRog
    public function getnomProg()
    {
        return $this->nomProg;
    }
    //set nomProg
    public function setnomProg($nomp)
    {
        $this->nomProg = $nomp;

        return $this;
    }

    /**
     * Get the value of objectif
     */
    public function getObjectif()
    {
        return $this->objectif;
    }

    /**
     * Set the value of objectif
     *
     * @return  self
     */
    public function setObjectif($objectif)
    {
        $this->objectif = $objectif;

        return $this;
    }

    /**
     * Get the value of duree
     */
    public function getduree()
    {
        return $this->duree;
    }

    /**
     * Set the value of duree
     *
     * @return  self
     */
    public function setduree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

}
