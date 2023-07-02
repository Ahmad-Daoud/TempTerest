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
    <link rel="icon" type="image/x-icon" href="https://adaoud.dev/Tempterest/TempTerest/logo.ico">
</head>
<body>
    

    <?php
        require('../layout/header.php');
        require('../model/model.php');
        Check_Account_TF();
        Function DisplayPage(){            
            ?>
            <div class="nosmodels">Liste de modèles : </div>
            

            <div class="previews">
                 <?php
                    $querymodels = "SELECT * FROM models_preview";
                    try{
                        global $db;
                        $result = $db->query($querymodels);
                        if($result->num_rows > 0){
                            echo'sah1';
                            while($row = $result->fetch_assoc()){
                                $urllinkpage =$row['urllinkpage'];
                                $urlimgpreview =$row['urlimgpreview'];
                                $titlemodel =$row['Title'];
                                $type =$row['Type'];
                                ob_start(); // Start output buffering                    
                                    $output = '
                                        <a href="'.$urllinkpage.'">
                                            <div class="preview">
                                                <div class="thumbnail">
                                                    <img src="'. $urlimgpreview .'"/>
                                                </div>
                                                <div class="details">
                                                    <div class="title">
                                                        '.$titlemodel.'
                                                        <span>'.$type.'</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    ';
                                ob_end_clean();
                                echo $output; 
                            }
                            echo'sah2';
                        }
                        echo'sah3';
                        else{
                            echo '<div class="nosmodels"> aucun modèle en ligne </div>';
                        }
                    }
                    echo'sah4';
                    catch(Exception $e){
                            echo '<div class="nosmodels"> aucun modèle en ligne </div>';
                    }




                 ?>
            </div>
            



            <?php
            
        }
        Function DisplayLoginPage(){
            require("../view/login.php");
        }

    ?>
</body>
</html>