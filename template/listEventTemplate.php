<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
  <title>Commercial</title>
</head>
<body>
  <h1>Liste des événements</h1>
  <a href="../index.php"><button>Retour</button></a>
  <table>
    <thead>
      <tr>
          <th>id</th>
          <th>nom</th>
          <th>prénom</th>
          <th>ID opportunités</th>
          <th>idEtape</th>
          <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        require("../model/eventModel.php");
        $newEvent = new eventModel(13,"");

        $response = $newEvent->getAllEvent();

        while($row = $response->fetch_assoc()){
          $id = $row['id'];
          $nom = $row['nom'];
          $prénom = $row['prenom'];
          $idOpp = $row['idOpp'];
          $idEtape = $row['idEtape'];
          $action = $row['actions'];

          echo "<tr>";
          echo "<th>'$id'</th>";
          echo "<td>'$nom'</td>";
          echo "<td>'$prénom'</td>";
          echo "<td>'$idOpp'</td>";
          echo "<td>'$idEtape'</td>";
          echo "<td>'$action'</td>";
          echo "</tr>";

        }
      ?>
    </tbody>
    
  </table>
</body>
</html>