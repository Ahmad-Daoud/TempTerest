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
        $search = array('&', '<', '>', '"');
        $replace = array('&amp;', '&lt;', '&gt;', '&quot;');
        Check_Account_TF();
        function DisplayLoginPage(){
            require("../../view/login.php");
        }
        function find_highest_zone($template) {
            $highestZone = 0;
            preg_match_all('/zone(\d+)/i', $template, $matches);
        
            if (!empty($matches[1])) {
                $zoneNumbers = $matches[1];
                $highestZone = max($zoneNumbers);
            }
            return $highestZone;
        }
        function convertHTMLSigns($html) {
            $search = array('&', '<', '>', '"');
            $replace = array('&amp;', '&lt;', '&gt;', '&quot;');
            $converted = str_replace($search, $replace, $html);
            return $converted;
        }
        





        function DisplayPage(){

            if (isset($_GET["Id"])){
                $id = htmlspecialchars($_GET["Id"]);
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
                            $html_bf = $row["html_code"];
                            $css = $row["css_code"];
                            $num = find_highest_zone($html_bf);
                        }
                        // l'utilisateur a déjà choisi les paramètres de son modèle
                        if (isset($_POST["div1"])){
                            function addZoneDetails($html) {
                                $divs = array();
                                // avoir un array avec les valeurs de chaque variable $_POST["div"]
                                foreach ($_POST as $key => $value) {
                                    if (strpos($key, 'div') === 0) {
                                        $divNumber = substr($key, 3);
                                        $divs[$divNumber] = htmlspecialchars($value);
                                    }
                                }
                                // ajouter le texte pour chaque zone selon les valeurs choisies dans la page précédente
                                $pattern = '/<div\s+class="([^"]*\bzone(\d+)\b[^"]*)"><\/div>/';
                                preg_match_all($pattern, $html, $matches);
                                $maxZoneNumber = max($matches[2]);
                                // remplacement du texte
                                $html = preg_replace_callback($pattern, function ($matches) use ($maxZoneNumber, $divs) {
                                    $class = $matches[1];
                                    $divNumber = $matches[2];
                                    $divVariable = 'div' . $divNumber; 
                                    if ($divNumber <= $maxZoneNumber && isset($divVariable)) {
                                        $divValue = $_POST[$divVariable];        
                                        if ($divValue === 'text') {
                                            return '<div class="' . $class . '">'. 'text value here '. '</div>';
                                            echo 'ss1';
                                        } elseif ($divValue === 'img') {
                                            echo 'ss2';
                                            return '<div class="' . $class . '"><img src="" alt="Image for ' . $class . '"></div>';
                                        }
                                    }
                                }, $html);
                                echo $html;
                                return $html;
                            }
                            $html_added = addZoneDetails($html_bf);
                            $html = convertHTMLSigns($html_added);
                            // l'utilisateur reçoit son code html css et voit un preview du site
                            $divValues = array();
                             ?>  
                                <div class="division-prev-1">
                                    <div class="temp_preview">
                                        <?php  ?>
                                    </div>
                                    <div class="rowmodifsave">
                                        <form action=""></form>
                                            <input class="save">
                                            <input class="modify">
                                        <form action=""></form>
                                    </div>
                                </div>
                                <div class="division-prev-2">
                                    <div class="division2row1">
                                        <div class="htmlcodetitle"> CODE HTML </div>
                                        <button class="htmlcopybutton" onclick="copyHtmlFunction"> Copier </button>
                                    </div>
                                    <div class="division2row2">
                                        <?php 
                                        $converted = str_replace($search, $replace, $html);
                                        echo $converted;
                                    ?>
                                    </div>
                                </div>
                                <div class="division-prev-3">
                                    <div class="division3row1">
                                        <div class="csscodetitle"> CODE CSS </div>
                                        <button class="csscopybutton" onclick="copyCssFunction"> Copier </button>
                                    </div>
                                    <div class="division3row2">
                                        <?php 
                                            $lines = preg_split('/\R/', $css);

                                            // Iterate through each line
                                            foreach ($lines as $line) {
                                                // Detect opening or closing curly bracket or semicolon
                                                if (strpos($line, '}') !== false) {
                                                    echo $line . "<br>";
                                                }
                                                else if (strpos($line, '{') !== false || strpos($line, ';') !== false){
                                                    echo  $line . "<br>". "\t"  ;
                                                }
                                            }
                                        ?>
                                    </div>     
                                </div>
                             <?php
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
                                <label for="div'.$i.'text">text</label><br>
                                <input type="radio" id="div'.$i.'img" name="div'.$i.'" value="img">
                                <label for="div'.$i.'img">img</label><br><br>';
                                }
                            ?>
                                <input type="hidden" value="<?php $id?>">
                                <input type="submit">
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

    <script src="model.js"></script>
</body>
</html>