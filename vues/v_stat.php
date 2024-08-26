
<div class="row">
    <div class="panel panel-info">
    <h3>Statistiques</h3>
        <div class="panel-heading">Visiteurs par mois</div>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="mois">Mois</th>
                    <th class="nb">Nombre de Visiteurs</th>
                    <th class="montant">Montant maximal</th>  
                </tr>
            </thead>  
            <tbody>
            <?php
            foreach ($moisMontant as $unmois) {
                $numAnnee = substr($unmois['mois'], 0, 4);
                $numMois = substr($unmois['mois'], 4, 2);;
                $nb = $unmois['nb'];
                $montant = $unmois['MontantMax'] ?>       
                <tr>
                    <td> <?php echo $numMois . " - " . $numAnnee ?></td>
                    <td> <?php echo $nb ?></td>
                    <td> <?php echo $montant . "€" ?></td>
                </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>
</div>