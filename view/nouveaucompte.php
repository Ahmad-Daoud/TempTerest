<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer votre compte</title>
    <link rel="stylesheet" href="css-layout/register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600&family=Signika&display=swap" rel="stylesheet"></head>
    <link rel="icon" type="image/x-icon" href="https://adaoud.dev/Tempterest/TempTerest/logo.ico">
</head>
<body>
    <!-- page qui permet de créer un nouveau compte -->

<div class="d-flex">
        <form action="index.php" method="POST">
            <input type="text" name="nameval" placeholder="Name" class="usernameinput">
            <br>
            <input type="password" name="passwdval"placeholder="Password"  class="motdepasseinput">
            <br>
            <input type="password" name="passwdverval"placeholder="Verify password" class="motdepasseinput">
            <br>
            <input type="submit" class="submitbtn" value="Créer">
        </form>
        <br>
</div>  
<div class="auncompte d-flex">Vous avez un compte? <a href="index.php?page=login" class="logincompte">  &nbsp Connectez vous!</a></div>

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