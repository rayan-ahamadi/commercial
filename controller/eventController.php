<?php
  require("../model/eventModel.php");
  $action = $_SERVER["HTTP_ACTION"];
  
  if($action = "post_event"){
    $newEvent = new eventModel($_POST["oppEvent"],$_POST["description"]);
    $response = $newEvent->addEvent();
    return var_dump($response);
  }

?>