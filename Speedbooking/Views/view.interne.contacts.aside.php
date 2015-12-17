<!--
Page d'affichage des dates déjà existantes (liste dans un aside).
A inclure dans view.interne.contacts.php
--------------------------------------------------------------
Par défaut, cette vue affiche le nom/prenom de tous les contacts déjà existants dans la BD sous forme de liste de liens.

Elle a donc besoin de :
$data['AllContacts']
            ['nom']
            ['prenom']
            ['Ajour']
            ['Fav']
qui contient les noms et prénoms de tous les contacts.
Si la liste est vide, la vue affiche une alerte et le controler ne crée pas la variable ci dessus.

A faire :
-recherches

Améliorations :


-->

<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">
      <div class="row">
          <div class="col-md-10">
            <div class="row"><h3 class="col-md-12 panel-title">Mes contacts :</h3></div>
          </div>
      </div>
    </div>
    <div class="panel-body">
        <ul class="list-group list-unstyled">
        <?php
          if (!isset($data['AllContacts'])) {
            echo "
            <div class=\"alert alert-info\">
            <strong>Vous n'avez pas encore enregistré de contact ! </strong>
            </div>
            ";
          }
          else {
            foreach($data['AllContacts'] as $c ) {
            $nomPrenom = $c['nom'].' '.$c['prenom'];
            if (isset($c['Ajour']) && $c['Ajour'] == true) //contact à jour
              {
                echo "<li class=\"list-group-item\">
                <a href=\"../Controler/contacts.ctrl.php?selected=$nomPrenom\" >
                </span> $nomPrenom</a>";
              }
            else  //contact pas à jour donc on affiche en ROUGE
              {
                echo "<li class=\"list-group-item list-group-item-danger\">
                <a href=\"../Controler/contacts.ctrl.php?selected=$nomPrenom\">
              $nomPrenom</a>
              <span class=\"glyphicon glyphicon-warning-sign pull-right\" style=\"color:#f85a00;\">
              </span>";
              }
            if (isset($c['Fav']) && $c['Fav'] == true) { //favoris ON
                echo '<a href="#" class="btn-lg"><span class="glyphicon glyphicon-heart pull-left" style="margin-right:5px;"></span></a>';
            }
            else { //favoris OFF
              echo '<a href="#" class="btn-lg "><span class="glyphicon glyphicon-heart-empty pull-left"
              style="color:#00aa30;
              margin-right:5px;">
              </span> </a>';
            }
              echo "</li>";
            }
          }
         ?>
    </ul>
    </div><!--panel body-->
  </div><!--panel info-->
</div><!--col md -->

<?php  if (isset($data['obsoletes'])) { //listes des contacts obscolètes?>
<div class="panel panel-warning ">
  <div class="panel-heading">
    <h3 class="panel-title">
        Contacts obsolètes
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       </h3>
  </div>
  <div class="panel-body">
      <?php //(nom et prénom + lien vers la fiche)
          foreach($data['obsoletes'] as $c){
            $nomPrenom = $c['nom'].' '.$c['prenom'];
            echo '<li><a href="../Controler/contacts.ctrl.php?selected='.$nomPrenom.'" class="list-group-item-danger">'.
        "<span class=\"glyphicon glyphicon-chevron-right pull-right\"></span> $nomPrenom</a></li>";
          }
      ?>
  </div><!--panel body-->
</div><!--panel-->
<?php  } ?>
