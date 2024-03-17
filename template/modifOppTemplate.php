<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Commercial</title>
  <script src="script.js" defer></script>
</head>
<body>
  <h1>Modifier l'opportunité</h1>
  <form action="../controller/oppController.php" method="POST" id="put-opp">

        <?php
          //requête pour pré-remplir le formulaire avec l'opp
          require("../model/oppModel.php");
          $id = $_GET['id'];
          $newOpp = new oppModel("","","","",0);

          $response = $newOpp->getOpportunitéById($id);
          $row = $response->fetch_assoc();
        ?>
        <input type="hidden" name="id" value=<?php echo $row["id"] ?>>

        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" value=<?php echo $row["nom"] ?>>
        <br>

        <label for="prenom">prenom</label>
        <input type="text" name="prenom" id="prenom" value=<?php echo $row["prenom"] ?>>
        <br>

        <label for="tel">tel</label>
        <input type="text" name="tel" id="tel" value=<?php echo $row["tel"] ?>>
        <br>

        <label for="email">email</label>
        <input type="text" name="email" id="email" value=<?php echo $row["email"] ?>>
        <br>

        <label for="etape">Etapes</label>
        <select name="etape" id="etape">
        <?php
                //requête pour les étapes
                require("../model/etapeModel.php");
                $etape = new etapeModel(0, "");
                $response = $etape->getEtape();   
                while ($row = $response->fetch_assoc()) {
                    // Extraction des données de chaque ligne
                    $idEtape = $row['id'];
                    $nom = $row['nameEtape'];

                    if(strval($id) == strval($row["idEtape"])){
                      echo "<option value='$idEtape' selected='selected'>$nom</option>";
                    }else{
                      echo "<option value='$idEtape'>$nom</option>";
                    }
                    
                }          
        ?>
        </select>
        
        <br>

        
        <input type="submit" value="Envoyer">
  </form>
  <a href="listOppTemplate.php"><button>Retour</button></a>
  <p id="response"></p>
</body>
</html>