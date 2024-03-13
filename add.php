<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddOpportunités</title>
</head>
<body>
    <h1>Ajouter une opportunités</h1>
    <form action="addOpportunités.php" method="POST">
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
        <select type="select" name="etape" id="etape">
            <option value="1">1</option>
        </select>
        <br>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>