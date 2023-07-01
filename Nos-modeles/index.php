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
        
        Function DisplayPageModels(){            
            ?>
            <div class="nosmodels">Liste de modèles : </div>
            


            <div class="videos">
            <!-- a video starts -->
                <div class="video">
                <div class="thumbnail">
                    <img src="https://img.youtube.com/vi/zUwB_imVjmg/maxresdefault.jpg" alt="" />
                </div>
                    <div class="details">
                        <div class="author">
                            <img src="https://yt3.ggpht.com/bpzY-S4DYlbTeOpY5hIA7qz_hcbMkgvLAugtwKBGTTImNnWAGudX0y53bo_fJZ0auypxrWkUiw=s88-c-k-c0x00ffffff-no-rj" alt="" />
                        </div>
                        <div class="title">
                            <h3>
                                Introverts & Content Creation | Sumudu Siriwardana
                            </h3>
                            <a href="">
                                    Francesco Ciulla
                            </a>
                            <span> 2M Views • 3 Months Ago </span>
                        </div>
                    </div>

                    </div>
            <!-- a video Ends -->
            </div>


            <?php
            
        }
        Function DisplayLoginPage(){
            require("../view/login.php");
        }

    ?>
</body>
</html>