<?php 

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
switch($action){
case 'selectUser': 
    $listeUser = $pdo->selectUser() ;
    $listeMois = $pdo->selectMois() ;
    require 'vues/v_listeUserMois.php';
    break;

    

case 'voirFrais':
   
    $idVisiteur = $_POST['user'];
    $mois = $_POST['mois'];
    echo '$idVisiteur';
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
    $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $mois);
    $numAnnee = substr($mois, 0, 4);
    $numMois = substr($mois, 4, 2);
    $libEtat = $lesInfosFicheFrais['libEtat'];
    $montantValide = $lesInfosFicheFrais['montantValide'];
    $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
    $dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
    require 'vues\v_detailFicheFrais.php';
    break;
}
?>