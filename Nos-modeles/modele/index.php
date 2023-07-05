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
        function DisplayLoginPage(){
            require("../../view/login.php");
        }
        function find_highest_zone($template) {
            $highestZone = 0;
        
            // Find all div classes starting with "div" followed by a number
            preg_match_all('/div(\d+)/i', $template, $matches);
        
            if (!empty($matches[1])) {
                // Get the highest zone number
                $zoneNumbers = $matches[1];
                $highestZone = max($zoneNumbers);
            }
        
            // Output the highest zone number
            return $highestZone;
        }
        function DisplayPage(){

            if (isset($_GET["Id"])){
                $id = $_GET["Id"];
                global $db;
                $query1 = "SELECT * FROM models_details WHERE id LIKE '$id';";
                $result1 = $db->query($query1);
                if($result1->num_rows > 0) {
                    while($row1 = $result1->fetch_assoc()) {
                        $titre = $row1["titre"];
                        $type = $row1["type"];
                        $auteur = $row1["auteur"];
                        $date = $row1["date"];
                        $imgurl = $row1["imglinkpreview"];
                        $description = $row1["description"] ;
                        include("urltitle.php");
                        $query2 = "SELECT * FROM model_code WHERE model_id LIKE '$id' ; ";
                        $result2 = $db->query($query2);
                        while ($row = $result2->fetch_assoc()) {
                            $num = find_highest_zone($row["html_code"]);
                            echo $row["html_code"];
                        }
                        // l'utilisateur a déjà choisi les paramètres de son modèle
                        if (isset($_POST["div1"])){
                            echo 's';
                        }

                        

                        // l'utilisateur choisi les paramètres de son modèle
                        else{

                        
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
                                <div class="description"> <?php echo $description;?></div>
                            </div>
                        <div class="division2">
                            <form action="?Id=<?php echo $id;?>" method="POST" class="zoneform">
                            <?php
                                for ($i = 1; $i <= $num; $i++) {
                                    echo '
                                ZONE '.$i.'
                                <br>
                                <input type="radio" id="div'.$i.'empty" name="div'.$i.'" value="empty" checked="checked">
                                <label for="div'.$i.'empty">empty</label><br>
                                <input type="radio" id="div'.$i.'text" name="div'.$i.'" value="text">
                                <label for="div'.$i.'img">text</label><br>
                                <input type="radio" id="div'.$i.'img" name="div'.$i.'" value="img">
                                <label for="div'.$i.'text">img</label><br><br>';
                                }
                            ?>
                            </form> 
                        </div>
                        <div class="division3">division 3 </div>
                        <!-- le preview du modèle en html -->
                        <?php

                        }
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