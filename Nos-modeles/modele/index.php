<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://adaoud.dev/Tempterest/TempTerest/logo.ico">
    <link rel="stylesheet" href="https://adaoud.dev/Tempterest/TempTerest/css-layout/modele.css">
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
                    while($row1 = $result1->fetch_assoc()) {
                        $titre = $row1["titre"];
                        $type = $row1["type"];
                        include("header.php");
                        ?>
                        <!-- le preview du modèle en html -->
                        
                        <div class="division1">
                            <div class="showcase d-flex">
                                s
                            </div>
                            <div class="details">
                                <div class="details-division1">
                                    <div class="titre1">
                                        <?php
                                        echo"$titre"; 
                                        ?>
                                    </div>
                                    <div class="type">
                                        <?php echo"$type"?></div>
                                    </div>
                                    <div class="details-division2">
                                        s
                                    </div>
                                    <div class="details-division3">
                                        s
                                    </div>
                                </div>
                                
                            </div>
                        <div class="division2">s</div>
                        <div class="division3">s</div>
                        
                        
                        
                        <!-- le preview du modèle en html -->
                        <?php
                    }
                }
                else{
                    echo  "l'id ne correspond pas à un de nos modèles";
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