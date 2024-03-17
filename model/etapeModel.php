<?php
  require("../repository/etapeRepository.php");

  class etapeModel extends etapeRepository{
    public int $id;
    public string $nom;

    public function __construct(int $id, string $nom){
      parent::__construct();
      $this->id = $id;
      $this->nom = $nom;
    }

    public function getEtapes(){
      $response = $this->getEtape();
      return $response;
    }
  }

?>