<?php
//to cannot access any page untill valid login
function authent(){
    if(!($_SESSION)){
        header('location: /task2/login.php');
    }
}
//to cannot access the login page after valid login
function not_authent(){
    if($_SESSION){
        header('location: /task2/index.php');
    }
}
function authoriz_all_access(){
    if($_SESSION['role']!=1){
        header('location: /task2/404.php');
    }
}
function authoriz_semi_access(){
    if($_SESSION['role']!=1 && $_SESSION['role']!=2){
        header('location: /task2/404.php');
    }
}

?>