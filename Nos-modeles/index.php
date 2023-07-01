<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos modèles</title>
    <link rel="stylesheet" href="https://adaoud.dev/Tempterest/TempTerest/css-layout/models.css">
</head>
<body>
    

    <?php
    require('../layout/header.php');
        require('../model/model.php');
        Check_Account_TF();
        if ($AccountAuth = True) {
            echo'<div class="nosmodels">Nos modèles :</div>';
        }
        else if($DisplayLogin==true){
            require("../view/login.php");
        }


    ?>
</body>
</html>