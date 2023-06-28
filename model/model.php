<?php 
require("controller/controlleur.php");

$db = new mysqli('localhost', 'root', '', 'Tempterest_login');
global $passwdhached;

Function Create_Cookie($passwordlogin, $namelogin){
    // Cette fonction hache le mot de passe et le met dans un cookie, et le mot de passe déja haché dans un autre, afin de pouvoir retenir les informations du compte sans contenir des données personnelles 
    $namehached = password_hash($namelogin, PASSWORD_BCRYPT);
    setcookie(
        'hachednme',
        "$namehached",
        time() + 365 * 24 * 3600 
    );
    setcookie(
        'hachedpsw',
        "$passwordlogin",
        time() + 365 * 24 * 3600
    );
}


Function Delete_Account(){
    if ( !empty(htmlspecialchars($_COOKIE['hachednme'])) && !empty(htmlspecialchars($_COOKIE['hachedpsw']))){
        $name = htmlspecialchars($_COOKIE['hachednme']);
        $psw = htmlspecialchars($_COOKIE['hachedpsw']);
        global $db;
        $query = "SELECT * FROM login_details WHERE motdepasse LIKE '$psw' ";
        try {
            $result = mysqli_query($db,$query);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        if(password_verify($row["nom"], $name)){
                            if($psw = $row["motdepasse"]){
                                $query = "DELETE FROM login_details WHERE nom LIKE '".$row["nom"]."';";
                                try{
                                    $result2 = mysqli_query($db,$query);
                                    echo 'Compte supprimé. <br> <a href="index.php?page=login"> <button> Page login </button></a> ' ;
                                }
                                catch(Exception $e){
                                    echo'query no work';
                                }
                                
                            }
                        }
                    }
                }
            else {
                echo "erreur query";
            }
        }
        catch(Exception $e){
            echo 'erreur : ' .  $e->getMessage();
        }
    }
}

Function Check_Account($page){
    // Cette fonction est utilisée pour vérifier que l'utilisateur utilise un compte enregistré dans la base de données à chaque fois qu'il navigue entre les pages
    if ( !empty(htmlspecialchars($_COOKIE['hachednme'])) && !empty(htmlspecialchars($_COOKIE['hachedpsw']))){
        $name = htmlspecialchars($_COOKIE['hachednme']);
        $psw = htmlspecialchars($_COOKIE['hachedpsw']);
        global $db;
        $query = "SELECT * FROM login_details WHERE motdepasse LIKE '$psw'";
        if(isset($name) && isset($psw)){
            try{
                
                $result = mysqli_query($db,$query);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        
                        if (password_verify( $row["nom"], $name)){
                            if($psw = $row["motdepasse"]){
                                
                                // Code récupéré du TP intcon fait en cours de php (à changer pour Display les pages )
                                // if($page == "acceuil"){
                                //     DisplayAcceuil($row["nom"]);
                                // }
                                // if ($page == "baleine"){
                                //     DisplayBaleine($row["nom"]);
                                // }
                                // if ($page == "zèbre"){
                                //     DisplayZebre($row["nom"]);
                                // }
                                // if ($page == "lion"){
                                //     DisplayLion($row["nom"]);
                                // }
                                // if ($page == "guépard"){
                                //     DisplayGuepard($row["nom"]);
                                // }
                                // if ($page == "delete"){
                                //     DisplayDelete($row["nom"]);
                                // }


                            }
                        }
                    }
                }
                else{
                    $noaccount = true;
                    // l'utilisateur accède au site sans compte
                }
            }
            catch(Exception $e){
                echo "une erreur c'est procurée : ". $e->getMessage();
                echo '<br> <a href="index.php?page=login"><button>Acceder à la page login</button></a>';
            }
        }
        else{
            echo'<br> <a href="index.php?page=login"><button>Acceder à la page login</button></a>';
        }
    }
    else{
        echo 'pas de compte selectionné, veuillez rentrer les détails de votre compte';
        DisplayLogin();
    }
}




Function Check_Login($namelogin, $passwordlogin){
    // vérifier si le compte existe
    global $db;
    $querylogin = "SELECT * FROM login_details WHERE nom LIKE '$namelogin'";
    try {
        $result = mysqli_query($db, $querylogin);
        
    }
    catch(Exception $e){
        echo "une erreur c'est procurée : ".$e->getMessage();
    }
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if ($row["nom"] == $namelogin){
                if(password_verify($passwordlogin, $row["motdepasse"])){
                    // la connexion réussie!!!!!
                    echo'Connecté, veuillez clicker pour accéder au site<br><br> <a href="index.php?page=acceuil"><button>Acceuil</button></a> <br>  <br>';
                    Create_Cookie($row["motdepasse"], $namelogin);
                }
                else{
                    $passwordfalse =true;
                }
            }
        }
    }
    else if (isset($namelogin) && !empty($namelogin)) {
        echo'Le nom n existe pas dans la base de données';
    }
}












Function Register($name, $passwdhached){
    // finaliser l'insersion dans la base de données
    global $db;
    $queryfinal = "INSERT INTO login_details (nom, motdepasse) VALUE ('$name' ,  '$passwdhached')";
        try{
            mysqli_query($db, $queryfinal);
            echo 'Votre compte a été crée';
            DisplayLogin();
        }
        catch(Exception $e){
            echo "une erreur c'est procurée : ".$e->getMessage();
        }
}

Function hachage_mdp($name, $passwd){
    // Cette fonction est utilisée pour hacher un mot de passe
    $options = [
        'cost' => 12,
    ];
    $passwdhached = password_hash($passwd, PASSWORD_BCRYPT, $options);
    Register($name, $passwdhached);
}


Function Check_Register($name, $passwd){
    global $db;
    // Cette fonction vérifie si le nom entré est déja existant dans la base de données
    $queryverify = "SELECT * FROM login_details WHERE nom LIKE '$name'";
    try{
        // on récupère les lignes ou le nom apparait
        $result = mysqli_query($db, $queryverify);
        $verify = true;
    }
    catch(Exception $e){
        echo "error happen  ".$e->getMessage();
    }
    
    if($verify == true) {
        
        // on vérifie si le nom est présent dans la base de données
            if ($result == false){
                $nameavailable=true;
                
                // le nom n'est pas présent est donc peut être enregistré
            }
            else{
            
                // on ne met pas le if sur le else qui se trouve au dessus de ce commentaire afin d'éviter le warning php au cas ou la variable $result est un booléen négatif (cas probable)
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if ($row["nom"] == $name){
                            $nameavailable = false;
                            echo'le nom existe déjà';
                            // le nom existe déja
                            
                        }
                    }    
                }
                else {
                    $nameavailable = true;
                }
            }
    }
if (isset($nameavailable)){
    if($nameavailable ==true){
        hachage_mdp($name, $passwd);
    }
}
    else{
        echo'le nom choisi est déja dans la base de données';
    }
}