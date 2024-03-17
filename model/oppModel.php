<?php
require("../repository/oppRepository.php");

class oppModel extends oppRepository{

    public string $nom;
    public string $prenom;
    public string $tel;
    public string $email;
    public int $idEtape;

    public function __construct(string $nom, string $prenom, string $tel, string $email, int $idEtape){
        // appel du constructeur parent
        parent::__construct();
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->tel = $tel;
        $this->email = $email;
        $this->idEtape = $idEtape;
    }

    public function addOpportunité(){
        $response = $this->addOpportunités($this->nom, $this->prenom, $this->tel, $this->email, $this->idEtape);
        return $response;
    }

    public function getOpportunité(){
        $response = $this->getOpportunités();
        return $response;
    }

}

?>