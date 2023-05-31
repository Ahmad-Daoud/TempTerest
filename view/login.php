<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accéder à votre compte</title>
</head>
<body>
    

    <form action="index.php">
        <input type="text" name ="usernamelogin"  method="POST" placeholder="Nom">
        <input type="text" name ="passwordlogin"  method="GET" placeholder="Mot de Passe">
        <input type="submit">
    </form>
    <a href="index.php?page=register"><button>Créer un compte</button></a>
    <?php
        global $usernamefalse;
        global $passwordfalse;
        if ($usernamefalse == true){
            echo"Le nom n'existe pas dans la base de données";
        }
        if ($passwordfalse == true){
            echo "Le mot de passe est incorrect";
        }
    ?>
</body>
</html>