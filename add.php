<?php

include "connexion.php";

if(isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `client`(`id`, `nom`, `prenom`, `mail`) 
    VALUES (NULL,'$nom','$prenom','$email')";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("location:index.php");
    } else {
        echo 'Erreur' . mysqli_error($conn);
    }
}

?>


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
        <h1>Ajout d'un nouveau clients</h1>
    </div>
    <form method="post">
        <div>
            <label>Nom</label>
            <input type="text" name="nom">
        </div>
        <div>
            <label>Prénom</label>
            <input type="text" name="prenom">
        </div>
        <div>
            <label>E-mail</label>
            <input type="email" name="email">
        </div>
        <div class="ajout-retour">
            <button type="sumbit" name="submit" class="btn-1">Ajout</button>
            <a href="index.php" class="retour">Retour</a>
        </div>
   
    </form>
    
</body>
</html>