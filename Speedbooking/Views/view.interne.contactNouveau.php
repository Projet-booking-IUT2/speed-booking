<!--
View pour ajouter un nouveau contact
-header
-formulaire vide
-Liste des contacts existantes (aside)
-footer
--------------------------------------------------------------
-->

  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Nouveau contact</h3>
    </div>
    <div class="panel-body">
        <form action="../Controler/contacts.ctrl.php" method="post" class= " well form ">
            <input type="hidden" name="add" />
            <div class="row">
              <p class="col-md-9" style="font-size:10px;"><i>Les champs indiqués par une * sont obligatoires.</i></p>
            </div>
            <div class="form-group row">
                <label for="nom" class="col-md-2 control-label">Nom: *</label>
                <div class="col-md-4"><input required type="text" id="nom" class="form-control" placeholder="Ex : Dupont" name="c_nom"></div>
                <label for="prenom" class="col-md-2 control-label">Prénom: *</label>
                <div class="col-md-4"><input required type="text" id="prenom" class="form-control" placeholder="Ex : Charles" name="c_prenom"></div>
             </div>
             <div class="form-group row">
                <label for="mail"  class="col-md-2 control-label">Mail: </label>
                <div class="col-md-10"><input type="email" id="mail" class="form-control" placeholder="exemple@exemple.com" name="c_mail"></div>
             </div>
             <div class="form-group row">
                <label for="adresse"  class="col-md-2 control-label">Adresse: </label>
                <div class="col-md-10"><input  id="adresse" class="form-control" placeholder="3 rue paul Mistral 38000 Grenoble" name="c_adresse"></div>
             </div>
             <div class="form-group row">
                <label for="tel" class="col-md-2 control-label">Tel: </label>
                <div class="col-md-4"><input type="tel" id="tel" class="form-control" placeholder="Ex : 0600000000" name="c_tel"></div>
                <label for="site" class="col-md-2 control-label">Site-web: </label>
                <div class="col-md-4"><input type="url" id="site" class="form-control" placeholder="exemple.fr" name="c_site"></div>
             </div>
              <div class="form-group row">
                  <label for="select" class="col-md-2 control-label">Type: *</label>
                  <div class="col-md-4"><select id="select" class="form-control" name="c_type">
                      <option selected>Choisir un rôle</option>
                    <option>Organisateur</option>
                    <option>Association</option>
                    <option>Festival</option>
                    <option>Musicien</option>
                    <option>Autre</option>
                  </select></div>
                  <label for="select" class="col-md-2 control-label">Travaille à: </label>
                    <?php
                       if(isset($data['structures'])){
                         echo '<div class="col-md-3"><select id="select" class="form-control" name="lieuTravail">';
                         echo "<option>Structure</option>";
                         foreach ($data['structures'] as $s) {
                           echo "<option>$s</option>";
                        }
                        echo "</select></div>";
                        }
                        else {
                          echo '<div class="col-md-3"><select id="select" class="form-control">';
                          echo "<option>Structure</option></select></div>";
                        }
                   ?>
                   <a href="" class="btn btn-xs btn-success">
                           <span class="glyphicon glyphicon-plus"></span>
                    </a>
              </div>
               <div class="form-group row">
                  <label for="textarea" class="col-md-2 control-label">Notes:</label>
                  <div class="col-md-10"><textarea id="textarea" class="form-control" rows="2" name="c_notes">Détails sur ce contact</textarea></div>
                </div>
                <div class="form-group row">
                      <label  class="col-md-4 ">Date mise à jour minimum: *</label>
                      <input type="radio" name ="c_dureeMAJ" value="1">1 mois
                      <input type="radio" name ="c_dureeMAJ" value="3" checked>3 mois
                      <input type="radio" name ="c_dureeMAJ" value="6">6 mois
                      <input type="radio" name ="c_dureeMAJ" value="12">12 mois
                </div>
                <div class="form-group row">
                      <button type="submit" class="btn btn-success pull-right boutonPlus"><span class="glyphicon glyphicon-ok"> Créer</span></button>
                </div>
      </form>
    </div><!--panel body-->
  </div><!--panel-->
