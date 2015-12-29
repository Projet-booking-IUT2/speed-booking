<!--
Page d'affichage des fichiers.
-header
-Liste des fichiers existants
-footer
--------------------------------------------------------------
Par défaut, la page affiche la liste des fichiers existants
La vue a donc besoin des variables suivantes :
$data['AllFichiers']
          ['nom']
          ['proprio']
          ['date']
          ['taille']
          ['partageAvec']


A faire :
- les fonctions supprimer/modifier (le nom)/download/upload/ associer à un groupe
-les fonctions de recherche

Améliorations :

////////////////////////////////// -->
<?php
$data['AllFichiers'][0]['nom']="toto";
$data['AllFichiers'][1]['nom']="LALIHOU";
 ?>
<?php include('../Views/view.header.php');
?>
        <li><a href="../Controler/date.ctrl.php"><span class="glyphicon glyphicon-calendar"></span> Mes dates</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-phone-alt"></span> Mes contacts</a></li>
        <li class="active"><a href="../Controler/fichiers.ctrl.php" ><span class="glyphicon glyphicon-file"></span> Mes fichiers</a></li>
        <li><a data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Mon Compte</a>
              <ul class="dropdown-menu">
                  <li><a href="../Controler/groupe.ctrl.php">Gestion des groupes</a></li>
                  <li><a href="#">Gestion du compte</a></li>
              </ul>
        </li>
        <li><a href="../Controler/portail.ctrl.php" ><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
      </ul>
    </div><!--container nav-->
  </div><!-- nav-->
</header>
<div class="row">
  <div class="panel panel-info">
    <div class="panel-heading">
      <?php include('../Views/view.interne.fichiers.toolbar.php'); ?>
    </div><!--panelheading-->
    <div class="panel-body">
      <?php include('../Views/view.interne.fichiers.aside.php');?>
        <div class="col-md-8">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">
                <?php //echo $data['fichier']['nom'];  ?>  </h3>
            </div>
            <div class="panel-body">
              <form action="../Controler/contacts.ctrl.php" method="post" class= " well form ">
                <div class="form-group row">
                    <label for="nom" class="col-md-2 control-label">Nom: *</label>
                    <div class="col-md-10"><input required  type="text" id="nom" class="form-control" name="c_nom" value ="<?php //$data['fichier']['nom'] ?>" /></div>
                </div>
                <div class="form-group row alert alert-info">
                  <div class=\" col-md-10\">
                  <strong>Date : <?php //$data['fichier']['date'] ?></strong>
                  <strong>Taille : <?php //$data['fichier']['taille'] ?></strong>
                  </div>
                </div>
                <div class="form-group row">
                   <label class="col-md-12 control-label">Partagé avec : </label>
                   <div class="checkbox">
                     <label><input type="checkbox" name="partageAvec" value="groupe1">Groupe 1</label>
                   </div>
                   <div class="checkbox">
                     <label><input type="checkbox" name="partageAvec" value="groupe2">Groupe 2</label>
                   </div>
                </div>
                  <div class="form-group row">
                      <a href="#"class="btn btn-danger pull-left" data-confirm="Voulez-vous vraiment supprimer le fichier <?=$data['fichier']['nom']?>"><span class="glyphicon glyphicon-trash"></span></a>
                      <button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-ok"></span></button>
                  </div>
            </form>
            </div><!--panel body-->
          </div><!--panel info-->
      </div><!--col md 8-->
    </div><!--row-->
  </div><!--panelbody-->
</div><!--panel-->
</div><!--row-->

<?php include('../Views/view.footer.php'); ?>
