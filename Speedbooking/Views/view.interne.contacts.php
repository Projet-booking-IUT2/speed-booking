<!--
Page d'affichage des contacts.
-header
-fiche contacts (formulaire)
-Liste des contacts existantes (aside)
-footer
--------------------------------------------------------------
Par défaut, la page affiche la fiche du premier contact. Mais l'user peut selectionner un autre contact via le aside
La fiche a donc besoin des variables suivantes :
$data['contact']
          ['nom']
          ['prenom']
          ['mail']
          ['tel']
          ['site']
          ['type']
          ['notes']
          ['maj']
          ['lieuTravail']
          ['dernièreMaj']
S'il n'y existe aucun contact, le controler ne doit pas créer de variable.

A faire :
- les fonctions ajouter/supprimer/modifier
- différentes alertes selon si le contact est à jour ou non.

Améliorations :


-->
<?php include('../Views/view.interne.header.php'); ?>

        <li><a href="#"><span class="glyphicon glyphicon-calendar"></span> Mes dates</a></li>
        <li class="active"><a href="#"><span class="glyphicon glyphicon-phone-alt"></span> Mes contacts</a></li>
        <li><a href="#" ><span class="glyphicon glyphicon-file"></span> Mes fichiers</a></li>
        <li><a href="#" ><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
        <li><a href="#" ><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
      </ul>
    </div><!--container nav-->
  </div><!-- nav-->
</header>
<?php include('../Views/view.interne.contacts.aside.php'); ?>
<?php
    if(isset ($data['contact'])) {
     ?>
          
<div class="col-md-8">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">
        <?php
         
            echo $data['contact']['nom']; echo " "; echo $data['contact']['prenom'];
        ?>
         </h3>
    </div>
    <div class="panel-body">
        <form action="../Controler/contacts.ctrl.php" method="post" class= " well form ">
<!--        <input type="text" id="nom" class="form-control" name="c_nom">-->


          <div class="row">
              <!-- A afficher si à jour : -->
                <div class="alert alert-info col-md-3 pull-right">
                <strong>Contact à jour :)</strong>
                </div>
              <!-- A afficher si PAS à jour : -->
                <div class="alert alert-danger col-md-3 pull-right">
                <strong>Contact Obsolète ! </strong>
                </div>
          </div>
          <div class="form-group row">
              <label for="nom" class="col-md-2 control-label">Nom : </label>
              <div class="col-md-4"><input type="text" id="nom" class="form-control" name="c_nom" value ="<?= $data['contact']['nom'] ?>" /></div>
              <label for="prenom" class="col-md-2 control-label">Prénom : </label>
              <div class="col-md-4"><input type="text" id="prenom" class="form-control" name="c_prenom" value ="<?= $data['contact']['prenom'] ?>" /></div>
          </div>
          <div class="form-group row">
              <label for="mail"  class="col-md-2 control-label">Mail : </label>
              <div class="col-md-10"><input type="email" id="mail" class="form-control" name="c_mail" value ="<?= $data['contact']['mail'] ?>" /></div>
          </div>
          <div class="form-group row">
              <label for="tel" class="col-md-2 control-label">Tel : </label>
              <div class="col-md-4"><input type="tel" id="tel" class="form-control" name="c_tel" value ="<?= $data['contact']['tel'] ?>" /></div>
              <label for="site" class="col-md-2 control-label">Site-web : </label>
              <div class="col-md-4"><input type="url" id="site" class="form-control" name="c_site" value ="<?php // $data['contact']['site'] ?>" /></div>
          </div>
          <div class="form-group row">
              <label for="select" class="col-md-2 control-label">Type : </label>
                    <div class="col-md-10"><select id="select" class="form-control" name="c_type">
                     <?php
                        if ($data['contact']['metier'] == "Organisateur") {
                            echo '<option selected>Organisateur</option>';
                            echo "<option>Association</option>";
                            echo "<option>Festival</option>";
                        } else if($data['contact']['metier'] == "Association"){
                            echo '<option selected>Association</option>';
                            echo "<option>Organisateur</option>";
                            echo "<option>Festival</option>";
                        } else if ($data['contact']['metier'] == "Festival"){
                            echo '<option selected>Festival</option>';
                            echo "<option>Organisateur</option>";
                            echo "<option>Association</option>";
                        }
                      ?>
                    </select></div>
            </div>
            <div class="form-group row">
                    <label for="orga" class="col-md-3 control-label">Lieu de travail : </label>
                    <div class="col-md-9"><input id="orga" class="form-control" name="c_lieuTravail" value ="<?= $data['lieuTravail'] ?>"></div>
            </div>
             <div class="form-group row">
                    <label for="textarea" class="col-md-2 control-label">Notes :</label>
                    <div class="col-md-10"><textarea id="textarea" class="form-control" rows="2" name="c_notes"><?= $data['contact']['notes'] ?>
                    </textarea></div>
            </div>
            <div class="form-group">
                        <label  class="col-md-4 control-label">Date de mise à jour minimum :</label>
                        <input type="radio" name ="c_dureeMAJ" value="1_month">1 mois
                        <input type="radio" name ="c_dureeMAJ" value="3_month" checked>3 mois
                        <input type="radio" name ="c_dureeMAJ" value="6_month">6 mois
                        <input type="radio" name ="c_dureeMAJ" value="12_month">12 mois
            </div>
            <div lcass="row">
              <div class="alert alert-sucess  pull-left">
                <i>Date de dernière mise à jour : <?= $data['contact']['derniere_maj'] ?></i>
              </div>
            </div>
            <div class="form-group row">
                <a href="#" class="btn btn-danger pull-left"><span class="glyphicon glyphicon-trash"></span></a>
                <button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-ok"></span></button>
            </div>
      </form>
      
    </div><!--panel body-->
  </div><!--panel-->
</div><!--col md 8-->
      <?php } else {
     include '../Views/view.interne.contactNouveau.php';
      } ?>
<?php include('../Views/view.interne.footer.php'); ?>
