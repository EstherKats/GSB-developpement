<?php

$idVisiteur = $_SESSION['idVisiteur'];

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
switch ($action) {
case 'consulterUser':
    $visiteurs = $pdo->selectUser();
    require 'vues\v_user.php';
    break;
case 'detailUser':
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $lesInfos = $pdo->getinfoPers($id);
    require 'vues/v_infoPers.php';
}