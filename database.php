<?php
    session_start();

    $domain="localhost";  
    $user="root";
    $password="";
    $database="football_store";

    $mysqli= new mysqli($domain, $user, $password, $database);
 ?>