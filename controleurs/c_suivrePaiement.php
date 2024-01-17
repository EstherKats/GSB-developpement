<?php 

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
switch($action){
case 'selectFiche':
    $visiteurFiche = $pdo->selectFiche() ;
    $moisFiche = $pdo->selectMoisFiche();
    require 'vues/v_listeFiche.php';
    break;

case 'afficheDetail':
    $idVisiteur = $_POST['visiteur'];
    $_SESSION = $idVisiteur;
    $mois = $_POST['mois'];
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
    $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $mois);
    $numAnnee = substr($mois, 0, 4);
    $numMois = substr($mois, 4, 2);
    $libEtat = $lesInfosFicheFrais['libEtat'];
    $dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
    $montantValide = $lesInfosFicheFrais['montantValide'];
    $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
    require 'vues/v_detailFicheFrais.php';
    break;

case 'mettreEnPaiement':
    echo "HI!!!!! Enfin!!!!";
    break;
}
?>