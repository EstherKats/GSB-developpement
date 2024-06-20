<h3>Mes informations</h3>
    <div class="col-md-4">
        <form method="post" 
              action="index.php?uc=info&action=validerMajInfo" 
              role="form">
            <fieldset>       
                    <div class="form-group">
                        <label> Id </label>
                        <input type="text" id="idVisiteur" 
                               name="idVisiteur"
                               size="10" maxlength="5"
                               value="<?= $lesInfos['id'] ?>" 
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Nom </label>
                        <input type="text" id="nom" 
                               name="nom"
                               size="15" maxlength="15"
                               value="<?= $lesInfos['nom'] ?>" 
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Prenom </label>
                        <input type="text" id="prenom" 
                               name="prenom"
                               size="15" maxlength="15"
                               value="<?= $lesInfos['prenom'] ?>" 
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Login </label>
                        <input type="text" id="login" 
                               name="login"
                               size="15" maxlength="15"
                               value="<?= $lesInfos['login'] ?>" 
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Adresse </label>
                        <input type="text" id="adresse" 
                               name="adresse"
                               size="20" maxlength="20"
                               value="<?= $lesInfos['adresse'] ?>" 
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Code Postal </label>
                        <input type="text" id="cp" 
                               name="cp"
                               size="10" maxlength="10"
                               value="<?= $lesInfos['cp'] ?>" 
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Ville </label>
                        <input type="text" id="ville" 
                               name="ville"
                               size="10" maxlength="10"
                               value="<?= $lesInfos['ville'] ?>" 
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Email </label>
                        <input type="text" id="email" 
                               name="email"
                               size="20" maxlength="20"
                               value="<?= $lesInfos['email'] ?>" 
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Telephone </label>
                        <input type="text" id="tel" 
                               name="tel"
                               size="15" maxlength="15"
                               value="<?= $lesInfos['tel'] ?>" 
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Date d'embauche </label>
                        <input type="text" id="dateEmbauche" 
                               name="dateEmbauche"
                               size="20" maxlength="20"
                               value="<?= $lesInfos['dateEmbauche'] ?>" 
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Role </label>
                        <input type="text" id="role" 
                               name="role"
                               size="4" maxlength="1"
                               value="<?= $lesInfos['role'] ?>" 
                               class="form-control">
                    </div>



                    
                <button class="btn btn-success" type="submit">Modifier</button>
                <button class="btn btn-danger" type="reset">Effacer</button>
            </fieldset>
        </form>
    </div>
</div>
