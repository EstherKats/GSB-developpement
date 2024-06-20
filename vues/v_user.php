
<div class="row">
    <div class="panel panel-info">
    <h3>Visiteurs médicaux</h3>
        <div class="panel-heading">xxxx</div>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="nom">Nom</th>
                    <th class="prenom">Prénom</th>  
                    <th class="action">&nbsp;</th> 
                </tr>
            </thead>  
            <tbody>
            <?php
            foreach ($visiteurs as $unVisiteur) {
                $nom = $unVisiteur['nom'];
                $prenom = $unVisiteur['prenom']; 
                $id = $unVisiteur['id']; ?>       
                <tr>
                    <td> <?php echo $nom ?></td>
                    <td> <?php echo $prenom ?></td>
                    <td><a href="index.php?uc=user&action=detailUser&id=<?php echo $id ?>" > Détails </a></td>
                </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>
</div>