<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commercial</title>
    <script src="script.js" defer></script>
</head>
<body>
    <h1>Ajouter une opportunités</h1>
    <form action="../controller/oppController.php" method="POST" id="post-opp">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom">
        <br>

        <label for="prenom">prenom</label>
        <input type="text" name="prenom" id="prenom">
        <br>

        <label for="tel">tel</label>
        <input type="text" name="tel" id="tel">
        <br>

        <label for="email">email</label>
        <input type="text" name="email" id="email">
        <br>

        <label for="etape">Etapes</label>
        <select name="etape" id="etape">
        <?php
                require("../model/etapeModel.php");
                $etape = new etapeModel(0, "");
                $response = $etape->getEtape();   
                while ($row = $response->fetch_assoc()) {
                    // Extraction des données de chaque ligne
                    $id = $row['id'];
                    $nom = $row['nameEtape'];
                
                    echo "<option value='$id'>$nom</option>";
                }          
        ?>
        </select>
        
        <br>

        <input type="submit" value="Envoyer">
    </form>
    <a href="../index.php"><button>Retour</button></a>
    <p id="response"></p>
</body>
</html>