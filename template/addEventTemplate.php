<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Commercial</title>
  <script src="script.js" defer></script>
</head>
<body>

  <h1>Ajouter un événements</h1>
  <form action="../controller/eventController.php" method="POST" id="post-event">
    <label for="oppEvent">Event pour :</label>
    <select name="oppEvent" id="oppEvent">
      <!-- Ici on va chercher les opportunités pour les afficher dans le select -->
      <?php
        require("../model/oppModel.php");
        $opp = new oppModel("", "", "", "", 0);
        $response = $opp->getOpportunité();
        while ($row = $response->fetch_assoc()) {
          $id = $row['id'];
          $nom = $row['nom'];
          $prenom = $row['prenom'];
          echo "<option value='$id'>$nom $prenom</option>";
        }
      ?>

    </select>

    <br>
    <label for="description">Description de l'événements</label><br>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    <br>

    <input type="submit" value="Envoyer">
    
  </form>
  <a href="../index.php"><button>Retour</button></a>
  <p id="response"></p>
</body>
</html>