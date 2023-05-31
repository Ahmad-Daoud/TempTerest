<?php
Function DisplayHeader(){
    include("layout/header.php");
}
Function DisplayHome(){
    include("view/Acceuil.php");
}
Function DisplayRegister(){
    require ("view/nouveaucompte.php");
}
Function DisplayLogin(){
    require("view/login.php");
}
Function DisplayFooter(){
    // layout footer
}
Function Display404(){
    // page d'erreur 404
}