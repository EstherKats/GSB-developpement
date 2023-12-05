<?php 

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
switch($action){
case 'selectUser': 
    $listeUser = $pdo->selectUser() ;
    $listeMois = $pdo->selectMois() ;
    require 'vues/v_listeUserMois.php';
    break;
    
case 'voirFrais':
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
    require 'vues/v_detailFicheFrais.php';
    break;
}
?>