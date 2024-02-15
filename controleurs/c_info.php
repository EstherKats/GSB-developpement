
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
}



?>