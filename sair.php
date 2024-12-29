<?php

session_destroy();

//$id = $_SESSION["id"];
//print_r($_SESSION);
if(!$_SESSION){
    header('Location:login');
}