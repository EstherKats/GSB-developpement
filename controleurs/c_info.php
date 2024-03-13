
<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$idVisiteur = $_SESSION['idVisiteur'];
switch ($action) {
case 'addMailTel':
    require 'vues/v_info.php';
    break;

case 'validation':
    $email= $_POST['email'];
    $tel= $_POST['tel'];
    $pdo->insertData($idVisiteur, $email, $tel);
    ?>
    
    <div class="alert alert-info" role="alert">
    <p>Informations mise à jour! </p>    
    </div>

    <?php
    break;
case 'seeInfo':
    $idVisiteur = $_SESSION['idVisiteur'];
    $lesInfos = $pdo->getinfoPers($idVisiteur);
    require 'vues/v_infoPers.php';
    break;
    case 'validerMajInfo':
        $idVisiteur = $_SESSION['idVisiteur'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $login = $_POST['login'];
        $adresse = $_POST['adresse'];            
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $dateEmbauche = $_POST['dateEmbauche'];
        $role = $_POST['role'];
        
        $user = [
            "nom" => ($_POST['nom']),
            "prenom" => ($_POST['prenom']),
            "login" => ($_POST['login']),
            "adresse" => ($_POST['adresse']),
            "cp" => ($_POST['cp']),
            "ville" => ($_POST['ville']),
            "email" => ($_POST['email']),
            "tel" => ($_POST['tel']),
            "dateEmbauche" => ($_POST['dateEmbauche']),
            "role" => ($_POST['role']),
        ];
        $pdo->majData($idVisiteur, $user);
        ?>
        
        <div class="alert alert-info" role="alert">
        <p>Informations mise à jour! </p>    
        </div>
    
        <?php
        require 'vues/v_accueil.php';
        break;
}



?>