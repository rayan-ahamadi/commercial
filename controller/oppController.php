<?php
    //Ici on récupère la valeur d'un en-tête personnalisé pour traiter les différentes requêtes
    require("../model/oppModel.php");
    $action = $_SERVER["HTTP_ACTION"];

    if($action == "post_opp"){
        $conn = new oppModel($_POST["nom"], $_POST["prenom"], $_POST["tel"], $_POST["email"], $_POST["etape"]);
        $response = $conn->addOpportunité($conn->nom,$conn->prenom,$conn->tel,$conn->email,$conn->idEtape);
        return var_dump($response);
    }

    if($action == "modif_opp"){
        $conn = new oppModel($_POST["nom"], $_POST["prenom"], $_POST["tel"], $_POST["email"], $_POST["etape"]);
        $response = $conn->modifOpportunité($_POST["id"],$conn->nom,$conn->prenom,$conn->tel,$conn->email,$conn->idEtape);
        return var_dump($response);
    }

    if($action == "put_opp"){
        $conn = new oppModel($_POST["nom"], $_POST["prenom"], $_POST["tel"], $_POST["email"], $_POST["etape"]);
        $response = $conn->modifOpportunité($_POST["id"],$conn->nom,$conn->prenom,$conn->tel,$conn->email,$conn->idEtape);
        return var_dump($response);
    }

    if($action == "delete_opp"){
        $conn = new oppModel("","","","",0);
        $response = $conn->deleteOpportunité($_POST["id"]);
        return var_dump($response);
    }
?>