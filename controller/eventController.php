<?php
  //Ici on récupère la valeur d'un en-tête personnalisé pour traiter les différentes requêtes
  require("../model/eventModel.php");
  $action = $_SERVER["HTTP_ACTION"];
  
  if($action = "post_event"){
    $newEvent = new eventModel($_POST["oppEvent"],$_POST["description"]);
    $response = $newEvent->addEvent();
    return var_dump($response);
  }

?>