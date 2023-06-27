<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer votre compte</title>
</head>
<body>
    <!-- page qui permet de créer un nouveau compte -->

    <form action="index.php" method="POST" >
        <input type="text" name="nameval" placeholder="name">
        <input type="text" name="passwdval"placeholder="password">
        <input type="text" name="passwdverval"placeholder="verify password">
        <input type="submit">
    </form>
    <a href="index.php?page=login"><button>Accéder à votre compte</button></a>
    <?php 
    global $namesetfail;
    global $passwdsetfail;
    global $passwdversetfail;
    global $passwdverfail;
        if ($namesetfail == true){
            echo' veuillez choisir un nom<br> ';
        } 
        if ($passwdsetfail == true){
            echo' veuillez choisir un mot de passe<br> ';
        }
        if ($passwdversetfail == true){
            echo' veuillez écrire le mot de passe une deuxième fois pour la vérification<br> ';
        }
        if ($passwdverfail == true){
            echo' Les mots de passe ne correspondent pas <br>';
        }
    ?>
</body>
</html>