<?php
require_once "./adminSession.php";

if(isset($_GET["logIn"])){
    logIn();
}

if(isset($_GET["logOut"])){
    logOut();
}