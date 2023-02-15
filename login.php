<?php 

session_start();

$erreur = "";

//mjames01

if (isset($_POST['valider'])) {
    if( $_POST["login"]=='leo' && md5($_POST['pass']) == "01438e0aa28edbadea96f7bd64e7151a"){
        $_SESSION["autoriser"] = "oui";
        header("location:index.php");
    } else {
        $erreur="Mauvais login ou mdp";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MisterJames connexion</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

    <div class="header">
        <h1>Mister James, gestion clients</h1>
    </div>
    <form method="post" class="login">
        <input type='text' name='login' placeholder="Login" />
        <br />
        <input type='password' name='pass' placeholder="Mdp" />
        <br />
        <input type='submit' name='valider' />
    </form>
    <?php if(!empty($erreur)){ ?>
        <div class="erreur"><?=$erreur?></div>
        <?php } ?>
    
</body>
</html>