

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout</title>
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
    <div class="header">
        <h1>Rechercher un client (par son nom)</h1>
    </div>
    <form method="post">
        <div>
            <label>Nom du client à recherché</label>
            <input type="text" name="nomR">
        </div>
        <div class="ajout-retour">
            <button type="submit" class="btn-1">Rechercher</button>
            <a href="index.php" class="retour">Retour</a>
        </div>
       
    </form>
    

<?php 

include 'connexion.php';

if (isset($_POST['nomR'])) {
    $nomR = $_POST['nomR'];

    // Requête SQL pour récupérer les données filtrées par nom (% -> contient nomR)
    $sql = "SELECT `id`, `nom`, `prenom`, `mail` FROM `client` WHERE `nom`LIKE '%$nomR%'";

    // Exécution de la requête
    $result = $conn->query($sql);

  
    // Affichage des résultats
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='edit-search'>";
            echo "Nom : " . $row['nom'] . "<br>";
            echo "Prénom : " . $row['prenom'] . "<br>";
            echo "Email : " . $row['mail'] . "<br><br>";
            echo "<a class='modif-search' href=edit.php?id=". $row['id'] . " >Modifier</a>";
            echo "<a class='modif-search' href=delete.php?id=". $row['id'] . ">X</a>";

            echo "</div>";
        }
    } else {
        echo "Aucun résultat trouvé.";
    }
}
?>

