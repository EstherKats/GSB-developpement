<?php 

$mois = getMois(date('d/m/Y'));
$numAnnee = substr($mois, 0, 4);
$numMois = substr($mois, 4, 2);

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
switch($action){
case 'selectUser': 
    $listeUser = $pdo->selectUser() ;
    $listeMois = $pdo->getMois() ;
    require 'vues/v_listeUserMois.php';
    break;

    

case 'voirFrais':
    $idVisiteur = $_POST['user'];
    $mois = $_POST['mois'];
    $_SESSION['visiteur_selectionne']=$idVisiteur;
    $_SESSION['mois_selectionne']=$mois;
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
    $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $mois);
    $numAnnee = substr($mois, 0, 4);
    $numMois = substr($mois, 4, 2);
    $libEtat = $lesInfosFicheFrais['libEtat'];
    $montantValide = $lesInfosFicheFrais['montantValide'];
    $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
    $dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
    require 'vues\v_listeFraisForfait.php';
    require 'vues\v_listeFraisHorsForfait.php';
    break;

case 'actualiserFraisForfait':
    $idVisiteur = $_SESSION['visiteur_selectionne'];
    $mois = $_SESSION['mois_selectionne'];
    $lesFrais = $_POST['lesFrais'];
    if (lesQteFraisValides($lesFrais)) {
        $pdo->majFraisForfait($idVisiteur, $mois, $lesFrais);
    } 
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
    require 'vues\v_listeFraisForfait.php';
    require 'vues\v_notif.php';
    require 'vues\v_listeFraisHorsForfait.php';
    break;

case 'refuserFrais':

    $idVisiteur = $_SESSION['visiteur_selectionne'];
    $mois = $_SESSION['mois_selectionne'];
    $idFrais = filter_input(INPUT_GET, 'idFrais', FILTER_SANITIZE_STRING);
    $libelle_actuel = $pdo-> getlibelle($idFrais);
    $libelle=$libelle_actuel['libelle'];
    $needle = "Refusé:" ;
    if (str_contains($libelle, $needle)){
        require 'vues\v_notifRefuse.php';
    } else {
        $pdo->refuserFrais($idFrais, $libelle_actuel);
    }
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
    require 'vues\v_listeFraisForfait.php';
    require 'vues\v_listeFraisHorsForfait.php';
    break;

case 'validerFiche':
    $idVisiteur = $_SESSION['visiteur_selectionne'];
    $mois = $_SESSION['mois_selectionne'];
    $etat = 'VA';
    $pdo->majEtatFicheFrais($idVisiteur, $mois, $etat);
    require 'vues\v_validation.php';
    break;
}
?>