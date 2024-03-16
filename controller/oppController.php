<?php
    
    require("../repository/db.php");
    $action = $_SERVER["HTTP_ACTION"];
    if($action == "post_opp"){
        $conn = new connect_db();
        $response = $conn->addOpportunités($_POST["nom"],$_POST["prenom"],$_POST["tel"],$_POST["email"],$_POST["etape"]);
        return var_dump($response);
    }
?>