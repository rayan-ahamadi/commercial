<?php

require("../repository/eventRepository.php");
class eventModel extends eventRepository{
  public int $idOpp;
  public int $idEtape;
  public string $actions;

  public function __construct(int $idOpp,string $actions)
  {
    parent::__construct();
    $this->idOpp = $idOpp;
    $this->idEtape = $this->getIdEtape($idOpp);
    $this->actions = $actions;
  }

  public function getIdEtape($id){
    $response = $this->getIdEtapes($id);
    $row = $response->fetch_assoc();
    $idEtape = $row['idEtape'];
    return $idEtape;
  }

  public function addEvent(){
    $response = $this->addEvents($this->idOpp,$this->idEtape,$this->actions);
    return $response;
  }

}

?>