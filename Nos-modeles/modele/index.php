<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://adaoud.dev/Tempterest/TempTerest/logo.ico">
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
                $query1 = "SELECT * FROM models_details WHERE id LIKE '$id';";
                $query2 = "SELECT * FROM models_zones WHERE model_id LIKE '$id';";
                $result1 = $db->query($query1);
                if($result1->num_rows > 0) {

                        $titre = $row1["titre"];
                        include("header.php");

                }
            }
            else {
                echo'no id chosen';
            }
            ?> 


            <?php




        }









    ?>
</body>
</html>