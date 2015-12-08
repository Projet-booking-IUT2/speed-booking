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
<?php include('../Views/view.interne.header.php');
?>
        <li><a href="../Controler/date.ctrl.php"><span class="glyphicon glyphicon-calendar"></span> Mes dates</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-phone-alt"></span> Mes contacts</a></li>
        <li class="active"><a href="../Controler/fichiers.ctrl.php" ><span class="glyphicon glyphicon-file"></span> Mes fichiers</a></li>
        <li><a href="../Controler/compte.ctrl.php" ><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
        <li><a href="../Controler/portail.ctrl.php" ><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
      </ul>
    </div><!--container nav-->
  </div><!-- nav-->
</header>
<div class="row"><nav class="navbar navbar-default col-md-12">
  <form class="navbar-form col-md-4">
    <div class="form-group">
      <input type="search" class="input-sm form-control" placeholder="Recherche">
      <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span>
      </button>
    </div>
  </form>
  Trier par :
  <a href="#" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-sort-by-alphabet"></span> Noms</a>
  <a href="#" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Date</a>
  <a href="#" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-tag"></span> Propriétaire</a>
  +bouton supprimer
  <a href="../Controler/contacts.ctrl.php?create=true" class="btn btn-lg btn-success pull-right boutonPlus">
    <span class="glyphicon glyphicon-plus"></span>
  </a>
</nav></div>

<div class="col-md-8">
  <div class="panel panel-info">
    <div class="panel-heading">
      <div class="row">
          <div class="col-md-10">
            <div class="row"><h3 class="col-md-12 panel-title">Vos fichiers :</h3></div>
          </div>
      </div>
    </div>
    <div class="panel-body">
        <ul class="list-group list-unstyled">
        <?php
          if (!isset($data['AllFichiers'])) {
            echo "
            <div class=\"alert alert-info\">
            <strong>Vous n'avez pas encore uploadé de fichiers ! </strong>
            </div>
            ";
          }
          else {
            foreach($data['AllFichiers'] as $f ) {
            $nom = $f['nom'];
                echo "<li>$nom
              <span class=\"glyphicon glyphicon-download-alt\"></span>
              <span class=\"glyphicon glyphicon-wrench\"></span>
              <span class=\"glyphicon glyphicon-remove\"></span>
              </li>";
            }
          }
         ?>
        </ul>
    </div><!--panel body-->
  </div><!--panel info-->
</div><!--col md 8-->

<?php include('../Views/view.interne.footer.php'); ?>
