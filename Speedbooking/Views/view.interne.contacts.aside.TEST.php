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
qui contient les noms et prénoms de tous les contacts.
Si la liste est vide, la vue affiche une alerte et le controler ne crée pas la variable ci dessus.

Si l'user clique sur un lien, le controler est appelé avec en param $_GET['nom_booker'].
Le controler doit afficher la fiche contact correspondante en redonnant la variable $data['contact'] remplie correctement

Si l'user clique sur l'icone plus, le controler est appelé et doit afficher un formulaire tout vide.

A faire :
-recherches

Améliorations :


-->
<?php
//$data['AllContacts'][0]['nom']="JOESTAR";
//$data['AllContacts'][0]['prenom']="jojo";
//$data['AllContacts'][1]['nom']="TSUKIYAMA";
//$data['AllContacts'][1]['prenom']="Shuu";
//$data['AllContacts'][0]['Ajour']=true;
//$data['AllContacts'][0]['AJour']=false;
 ?>
<div class="row"><div class="col-md-4">
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
              <span class=\"glyphicon glyphicon-chevron-right pull-right\"></span> $nomPrenom</a></li>";
              }
            else  //contact pas à jour donc on affiche en ROUGE
              {
                echo "<li class=\"list-group-item list-group-item-danger\">
                <a href=\"../Controler/contacts.ctrl.php?selected=$nomPrenom\">
              <span class=\"glyphicon glyphicon-chevron-right pull-right\"></span> $nomPrenom</a>
              <span class=\"glyphicon glyphicon-warning-sign \" style=\"color:#f85a00;\">
              </span>
              </li>";

              }
            }
          }
         ?>
    </ul>
    </div><!--panel body-->
  </div><!--panel info-->
</div><!--col md 4-->
