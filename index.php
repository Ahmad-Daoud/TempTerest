<?php
require("model/model.php");
if (isset($_GET["page"]) && !empty($_GET["page"])){
    $page = htmlspecialchars($_GET["page"]);
} 
DisplayHeader();




if(isset($_POST["usernamelogin"]) && !empty($_POST["usernamelogin"])){
    $usernamelogin = htmlspecialchars($_POST["usernamelogin"]);
}
else{}
if(isset($_POST["passwordlogin"]) && !empty($_POST["passwordlogin"])){
    $passwordlogin = htmlspecialchars($_POST["passwordlogin"]);
}
else{}


if (!empty($usernamelogin) && !empty($passwordlogin) && isset($usernamelogin) && isset($passwordlogin)){
    Check_Login($usernamelogin, $passwordlogin);
}

// code pour créer compte
if(isset($_POST["nameval"]) && !empty($_POST["nameval"])){
    $name = htmlspecialchars($_POST["nameval"]);
}
else{}
if(isset($_POST["passwdval"]) && !empty($_POST["passwdval"])){
    $passwd = htmlspecialchars($_POST["passwdval"]);
}
else{}
if(isset($_POST["passwdverval"]) && !empty($_POST["passwdverval"])){
    $passwdverval = htmlspecialchars($_POST["passwdverval"]);
    
}
else{}

// Cette partie permet de détecter si les variables de création de compte sont présentes, si oui il vérifie si tout est mis correctement
if(!empty($name) || !empty($passwd) || !empty($passwdverval)){
    // vérifie que la case nom a été remplie
    if (empty($name)){
        $namesetfail = true;
        DisplayRegister();
    }
    else if(isset($passwdverval) && isset($passwd) && !empty($passwdverval) && !empty($passwd)){ 
        // Les mots de passes sont déclarés et non vides
        if ($passwdverval == $passwd && isset($name)){
            // les mot de passes sont les mêmes dans les deux cases
            Check_Register($name, $passwd);
        }
        else if ($passwdverval !== $passwd){
            // les mot de passes ne sont pas les mêmes dans les deux cases
            $passwdverfail = true;
            DisplayRegister();
        }
    }
    else if ( empty($passwd)){
        // première case non remplie
        $passwdsetfail = true;
        DisplayRegister();
    }
    else if ( empty($passwdverval)){
        // deuxième case non remplie
        $passwdversetfail = true;
        DisplayRegister();
    }
    else{
        echo' none of the above ';
    }
}




if(isset($_GET["page"]) && !empty($_GET["page"])){

if($page=='home' || $page=="acceuil"){
    DisplayHome();
}
else if ($page=="login"){
    DisplayLogin();
}
else if ($page == "register"){
    DisplayRegister();
}
else{
    Display404();
}

}


?>