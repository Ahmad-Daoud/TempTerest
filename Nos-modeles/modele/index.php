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
                echo"the chosen id of your model is $id, right now we did not really finish the system yet  ";
                $query1 = "SELECT * FROM models_details WHERE id LIKE '$id';";
                $query2 = "SELECT * FROM models_zones WHERE model_id LIKE '$id';";
                echo $query1;
                $result1 = $db->query($query1);
                if($result1->num_rows > 0) {
                    echo'sah';
                    while($row1 = $result1->fetch_assoc()) {
                        $titre = $row1["titre"];
                        include("header.php");
                    }
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