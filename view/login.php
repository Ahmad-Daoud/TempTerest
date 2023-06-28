<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accéder à votre compte</title>
    <link rel="stylesheet" href="css-layout/logins.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600&family=Signika&display=swap" rel="stylesheet"></head>
<body>
    

<div class="loginform d-flex">
    <form action="index.php" method="POST" class ="">
        <input type="text" name ="usernamelogin"  method="POST" placeholder="Nom" class="usernameinput">
        <br>
        <input type="text" name ="passwordlogin"  method="POST" placeholder="Mot de Passe" class="motdepasseinput">
        <br>
        <input type="submit" class="submitbtn" value="Login">
    </form>
    <br>
</div>
<div class="d-flex pasdecompte"> Vous n'avez pas de compte? <a href="index.php?page=register" class="creercompte">   &nbsp Créer un compte</a></div>
    <?php
        global $usernamefalse;
        global $passwordfalse;
        global $usernamefalse;
        if (isset($usernamefalse) ){
            if($usernamefalse == true){
            echo"Veuillez choisir un nom d'utilisateur";
            }
        }
        if (isset($usernamefail)) {
            if ($namesetfail == true){
                echo"Le nom n'existe pas dans la base de données";
            }
        }
        if(isset($passwordfail)){
            if ($passwordfalse == true){
                echo "Le mot de passe est incorrect";
            }
        }
    ?>
</body>
</html>