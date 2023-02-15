<?php

include "connexion.php";
$id = $_GET['id'];


if(isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    $sql = "UPDATE `client` SET `nom`='$nom',`prenom`='$prenom',`mail`='$email' 
    WHERE id=$id";

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
    <title>Modifier</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="header">
        <h1>Modifier</h1>
    </div>
    <?php 
    include 'connexion.php';
    $sql = "SELECT * FROM `client` WHERE id=$id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result)
    ?>
    <form method="post">
        <div>
            <label>Nom</label>
            <input type="text" name="nom" value="<?php echo $row['nom'] ?>" >
        </div>
        <div>
            <label>Prénom</label>
            <input type="text" name="prenom" value="<?php echo $row['prenom'] ?>" >
        </div>
        <div>
            <label>E-mail</label>
            <input type="email" name="email" value="<?php echo $row['mail'] ?>">
        </div>
        <div class="ajout-retour">
            <button type="sumbit" name="submit" class="btn-1">Update</button>
            <a href="index.php" class="retour">Retour</a>
        </div>
   
    </form>
    
</body>
</html>