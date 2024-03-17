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
  <h1>Liste de nos opportunités</h1>
  <a href="../index.php"><button>Retour</button></a>
  <table>
    <thead>
      <tr>
          <th>id</th>
          <th>nom</th>
          <th>prénom</th>
          <th>tel</th>
          <th>email</th>
          <th>idEtape</th>
          <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        require("../model/oppModel.php");
        $newOpp = new oppModel("","","","",0);
        $response = $newOpp->getOpportunité();

        while($row = $response->fetch_assoc()){
          $id = $row['id'];
          $nom = $row['nom'];
          $prénom = $row['prenom'];
          $tel = $row['tel'];
          $email = $row['email'];
          $idEtape = $row['idEtape'];
          $urlModif = "modifOppTemplate.php?id=".urlencode($id);
          //$urlDelete = "deleteOppTemplate.php?id=".urlencode($id);

          echo "<tr>";
          echo "<th>'$id'</th>";
          echo "<td>'$nom'</td>";
          echo "<td>'$prénom'</td>";
          echo "<td>'$tel'</td>";
          echo "<td>'$email'</td>";
          echo "<td>'$idEtape'</td>";
          echo "<td>
                <a href='$urlModif' id='modify'><button>Modifier</button></a>
                <a id='delete-opp' data-id='$id'><button>Supprimer</button></a>
                </td>";
          echo "</tr>";

        }
      ?>
    </tbody>
    
  </table>
</body>
</html>