<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

switch ($action) {
case 'statMois':
    $moisMontant = $pdo->statVisiteurMontant();
    require 'vues/v_stat.php';
    break;

}

?>