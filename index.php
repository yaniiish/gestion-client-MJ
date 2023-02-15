<?php 
session_start();
if($_SESSION["autoriser"]!= "oui"){
    header('location:login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="deco">
        <a href="deco.php">Se deconnecter</a>
    </div>
    <div class="header">
        <h1>Liste des clients</h1>
        <span>Mister James</span>
    </div>
   
    <div class="ajout-recherche">
        <a href="add.php" class="btn-1">+ Ajout d'un client</a>
        <button><a href="search.php" class="btn-2">Rechercher un client</button></a>
    </div>

  

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include "connexion.php";
            $sql = "SELECT * FROM `client`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                ?>
            <tr>
                <td><?php echo $row["nom"] ?></td>
                <td><?php echo $row["prenom"] ?></td>
                <td><?php echo $row["mail"] ?></td>
                <td class="modif-delete">
                    <a href="edit.php?id=<?php echo $row['id'] ?>">Modifier</a>
                    <a href="delete.php?id=<?php echo $row['id'] ?>">X</a>
                </td>
            </tr>
                <?php
            }
            ?>
          
        </tbody>
    </table>

</body>
</html>

