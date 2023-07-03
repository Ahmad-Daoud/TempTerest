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
                        $auteur = $row1["auteur"];
                        $date = $row1["date"];
                        $imgurl = $row1["imglinkpreview"];
                        include("urltitle.php");
                        ?>
                        <!-- le preview du modèle en html -->
                        
                        <div class="division1">
                            <div class="showcase d-flex">
                                <img src="<?php echo$imgurl;?>" style="width: 99%; height: 99.5%;"alt="preview image">
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
                                        <?php
                                        function addLeadingZero($variable) {
                                            $paddedVariable = sprintf("%08d", $variable);
                                            return $paddedVariable;
                                        }

                                        function addSlash($variable) {
                                            $modifiedVariable = substr_replace($variable, '/', 2, 0);
                                            $modifiedVariable = substr_replace($modifiedVariable, '/', 5, 0);
                                            return $modifiedVariable;
                                        }
                                        $paddedDate = addLeadingZero($date);
                                        $modifiedDate = addSlash($paddedDate);
                                        echo $modifiedDate;

                                        ?>
                                    </div>
                                    <div class="details-division3">
                                        <div class="Autheur">
                                            <?php echo"$auteur"?>
                                        </div>
                                    </div>
                                </div>
                                <div class="description"> <?php echo$row["description"];?></div>
                            </div>
                            
                        <div class="division2">

                        <form action="index.php" method="POST" class="zoneform">
                            ZONE 1
                            <br>
                            <input type="radio" id="div1empty" name="div1" value="empty">
                            <label for="html">empty</label><br>
                            <input type="radio" id="div1text" name="div1" value="text">
                            <label for="css">text</label><br>
                            <input type="radio" id="div1img" name="div1" value="img">
                            <label for="javascript">img</label><br><br>
                            ZONE 2
                            <br>
                            <input type="radio" id="div2empty" name="div2" value="empty">
                            <label for="html">empty</label><br>
                            <input type="radio" id="div2text" name="div2" value="text">
                            <label for="css">text</label><br>
                            <input type="radio" id="div2img" name="div2" value="img">
                            <label for="javascript">img</label><br><br>

                            ZONE 3
                            <br>
                            <input type="radio" id="div3empty" name="div3" value="empty">
                            <label for="html">empty</label><br>
                            <input type="radio" id="div3text" name="div3" value="img">
                            <label for="css">img</label><br>
                            <input type="radio" id="div3img" name="div3" value="text">
                            <label for="javascript">text</label><br><br>
                            <input type="submit" value="Submit">
                        </form> 

                        </div>
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