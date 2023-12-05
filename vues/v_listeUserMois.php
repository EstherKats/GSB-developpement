<form action="test2.php">
    <select name="user" id="user_select">
        <?php 
        foreach ($listeUser as $visiteur){ ?>
            <option value= <?= 'id' ?> > <?= $visiteur['prenom'] ?>  <?= $visiteur['nom'] ?> </option>
        <?php } ?>
    </select>

    <select name="mois" id="mois_select">
        <?php 
        foreach ($listeMois as $unMois){ ?>
            <option value= <?= 'mois' ?> > <?= $unMois['mois'] ?>  </option>
        <?php } ?>
    </select>

</form>