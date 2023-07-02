<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo"$title" ?></title>
</head>
<body>
    <?php
        require("../../layout/header.php");
        require("../../model/model.php");
        Check_Account_TF();
        Function DisplayLoginPage(){
            require("../../view/login.php");
        }
        Function DisplayPage(){
            if (isset($_GET["Id"])){
                $id = $_GET["Id"];
                global $db;
                echo"$id";
                $query1 = "SELECT * FROM models_details WHERE id LIKE $id";
                $query2 = "SELECT * FROM models_zones WHERE model_id LIKE $id";
            }
            else {
                echo'no id chosen';
            }
            ?> 

                This is an html portion of the page

            <?php
        }









    ?>
</body>
</html>