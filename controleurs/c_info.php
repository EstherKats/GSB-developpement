
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
    echo "Ajouter avec succès";
    break;
}



?>