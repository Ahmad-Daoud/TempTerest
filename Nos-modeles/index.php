<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos modèles</title>
    <link rel="stylesheet" href="https://adaoud.dev/Tempterest/TempTerest/css-layout/models.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&family=Josefin+Sans:wght@700&family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
    

    <?php
    require('../layout/header.php');
        require('../model/model.php');
        Check_Account_TF();
        global $AccountAuth;
        global $DisplayLogin;
        
        Function DisplayPageModels(){
            echo 'models : ';
        }
        Function DisplayLoginPage(){
            require("../view/login.php");
        }

    ?>
</body>
</html>