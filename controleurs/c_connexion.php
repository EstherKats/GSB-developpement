<?php
/**
 * Gestion de la connexion
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */

use Zend\Filter\Boolean;

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if (!$uc) {
    $uc = 'demandeconnexion';
}

switch ($action) {
case 'demandeConnexion':
    include 'vues/v_connexion.php';
    break;
case 'valideConnexion':
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    $mdp1 = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
    $mdp = hash('sha256',$mdp1);
    $mdp= substr($mdp,0,20);
    $visiteur = $pdo->getInfosVisiteur($login, $mdp);
    if (!is_array($visiteur)) {
        $tentative = $pdo->recupTentative($login);
        $tentative = (int)$tentative;
        var_dump($tentative);
        if ($tentative < 3){
            $add = $pdo->ajoutTentative($login);
            ajouterErreur('Login ou mot de passe incorrect');
            include 'vues/v_erreurs.php';
            include 'vues/v_connexion.php'; 
        } else if($tentative>3){ 
                echo "Compte bloqué". $tentative;
            }
    } else {
        $init = $pdo->initTentative($login);
        $id = $visiteur['id'];
        $nom = $visiteur['nom'];
        $prenom = $visiteur['prenom'];
        $role = $visiteur['role'];
        connecter($id, $nom, $prenom, $role);
        header('Location: index.php');

    //code qui permet de hacher les mdp
    /*$mdp2= hash('sha256', $mdp);
    $mdp3= substr($mdp2,0,20);
    var_dump($mdp, $mdp2, $mdp3);

    $visiteurs = $pdo->getVisiteurs();
    foreach($visiteurs as $unVisiteur){
        $mdpHashe=hash('sha256',$unVisiteur['mdp']);
        $pdo->remplaceHash($unVisiteur['id'],$mdpHashe);
    }*/
    }
    break;
case 'inscription':
    require 'vues/v_inscription.php';
    break;
case 'valideInscription' :
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $adresse = $_POST['adresse'];            
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $dateEmbauche = $_POST['dateEmbauche'];
        $role = $_POST['role'];
        
        $newUser = [
            "id"=> ($_POST['id']),
            "nom" => ($_POST['nom']),
            "prenom" => ($_POST['prenom']),
            "login" => ($_POST['login']),
            "mdp" => ($_POST['mdp']),
            "adresse" => ($_POST['adresse']),
            "cp" => ($_POST['cp']),
            "ville" => ($_POST['ville']),
            "dateEmbauche" => ($_POST['dateEmbauche']),
            "role" => ($_POST['role']),
        ];

    $size = checkSize($mdp);
    $num = checkNumber($mdp);
    $maj = checkMaj($mdp);        
    $spec = checkSpec($mdp);


    if ($size == true&&$num == true&&$maj == true&& $spec == true){
        echo "Mot de passe Valide";
            $insert = $pdo->insertNewUser($newUser);
            connecter($id, $nom, $prenom, $role);
            require 'vues/v_accueil.php';
    } else { echo "Erreur";
            header("location:index.php");
    }
    
    break;
    default:
        include 'vues/v_connexion.php';
        break;
}
