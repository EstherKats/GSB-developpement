<?php 

$pdo = new \PDO('mysql:host=localhost;dbname=gsb2;port=3307', 'root', '');
var_dump($pdo);

$statement=$pdo->query("select * from visiteur");
$visiteurs=$statement->fetchAll(PDO::FETCH_ASSOC);
var_dump($visiteurs);

$statement=$pdo->query("SELECT * FROM fichefrais");
$mois=$statement->fetchAll(PDO::FETCH_ASSOC);
var_dump($mois);

?>

<form action="test2.php">
    <select name="user" id="user_select">
        <?php 
        foreach ($visiteurs as $visiteur){ ?>
            <option value= <?= 'id' ?> > <?= $visiteur['prenom'] ?>  <?= $visiteur['nom'] ?> </option>
        <?php } ?>
    </select>

    <select name="mois" id="mois_select">
        <?php 
        foreach ($mois as $unMois){ ?>
            <option value= <?= 'mois' ?> > <?= $unMois['mois'] ?>  </option>
        <?php } ?>
    </select>

</form>