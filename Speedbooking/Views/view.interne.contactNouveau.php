<!--
View pour ajouter un nouveau contact
-header
-formulaire vide
-Liste des contacts existantes (aside)
-footer
--------------------------------------------------------------

A faire :

Améliorations :


-->

<div class="col-md-8">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Nouveau contact</h3>
    </div>
    <div class="panel-body">
        <form action="../Controler/contacts.ctrl.php" method="post" class= " well form ">
            <input type="hidden" name="add" />
            <div class="form-group row">
                <label for="nom" class="col-md-2 control-label">Nom : </label>
                <div class="col-md-4"><input type="text" id="nom" class="form-control" placeholder="Ex : Dupont" name="c_nom"></div>
                <label for="prenom" class="col-md-2 control-label">Prénom : </label>
                <div class="col-md-4"><input type="text" id="prenom" class="form-control" placeholder="Ex : Charles" name="c_prenom"></div>
             </div>
             <div class="form-group row">
                <label for="mail"  class="col-md-2 control-label">Mail : </label>
                <div class="col-md-10"><input type="email" id="mail" class="form-control" placeholder="exemple@exemple.com" name="c_mail"></div>
             </div>
             <div class="form-group row">
                <label for="tel" class="col-md-2 control-label">Tel : </label>
                <div class="col-md-4"><input type="tel" id="tel" class="form-control" placeholder="Ex : 0600000000" name="c_tel"></div>
                <label for="site" class="col-md-2 control-label">Site-web : </label>
                <div class="col-md-4"><input type="url" id="site" class="form-control" placeholder="exemple.fr" name="c_site"></div>
             </div>
              <div class="form-group row">
                  <label for="select" class="col-md-2 control-label">Type : </label>
                  <div class="col-md-10"><select id="select" class="form-control" name="c_type">
                      <option selected>Choisir un rôle pour ce contact</option>
                    <option>Organisateur</option>
                    <option>Association</option>
                    <option>Festival</option>
                  </select></div>
              </div>
              <div class="form-group row">
                  <label for="orga" class="col-md-3 control-label">Lieu de travail : </label>
                  <div class="col-md-9"><input id="orga" class="form-control" placeholder="Hellfest" name="c_lieuTravail"></div>
              </div>
               <div class="form-group row">
                  <label for="textarea" class="col-md-2 control-label">Notes :</label>
                  <div class="col-md-10"><textarea id="textarea" class="form-control" rows="2" name="c_notes">Détails sur ce contact</textarea></div>
                </div>
                <div class="form-group row">
                      <label  class="col-md-4 ">Date mise à jour minimum :</label>
                      <input type="radio" name ="c_dureeMAJ" value="1_month">1 mois
                      <input type="radio" name ="c_dureeMAJ" value="3_month" checked>3 mois
                      <input type="radio" name ="c_dureeMAJ" value="6_month">6 mois
                      <input type="radio" name ="c_dureeMAJ" value="12_month">12 mois
                </div>
                <div class="form-group row">
                      <button type="submit" class="btn btn-success pull-right boutonPlus"><span class="glyphicon glyphicon-ok">Créer</span></button>
                </div>
      </form>
    </div><!--panel body-->
  </div><!--panel-->
</div><!--col md 8-->
