<?php 

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
switch($action){
case 'selectUser': 
    $listeUser = $pdo->selectUser() ;
    $listeMois = $pdo->selectMois() ;
    
    break;
    }
    require 'vues/v_listeUserMois.php'
?>