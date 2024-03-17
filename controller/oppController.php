<?php
    
    require("../model/oppModel.php");
    $action = $_SERVER["HTTP_ACTION"];

    if($action == "post_opp"){
        $conn = new oppModel($_POST["nom"], $_POST["prenom"], $_POST["tel"], $_POST["email"], $_POST["etape"], $action);
        $response = $conn->addOpportunité($conn->nom,$conn->prenom,$conn->tel,$conn->email,$conn->idEtape);
        return var_dump($response);
    }
?>