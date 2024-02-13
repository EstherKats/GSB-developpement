<div class="row">    
    <h2>Renseigner votre adresse mail et numéro de telephone </h2>
    <div class="col-md-4">
        <form method="post" 
              action="index.php?uc=info&action=validation" 
              role="form">
              <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input class="form-control" placeholder="email"
                                       name="email" type="text" maxlength="45">
                            </div>
                        </div>
                    <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input class="form-control" placeholder="telephone"
                                       name="tel" type="text" maxlength="45">
                            </div>
                        </div>
                <button class="btn btn-success" type="submit">Ajouter</button>
                <button class="btn btn-danger" type="reset">Effacer</button>
            </fieldset>
        </form>
    </div>
</div>