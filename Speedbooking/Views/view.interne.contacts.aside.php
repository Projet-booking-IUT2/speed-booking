<!--
Page d'affichage des dates déjà existantes (liste dans un aside).
A inclure dans view.interne.contacts.php
--------------------------------------------------------------
Par défaut, cette vue affiche le nom/prenom de tous les contacts déjà existants dans la BD sous forme de liste de liens.

Elle a donc besoin de :
$data['AllContacts']
            ['nom']
            ['prenom']
qui contient les noms et prénoms de tous les contacts.
Si la liste est vide, la vue affiche une alerte et le controler ne crée pas la variable ci dessus.

Si l'user clique sur un lien, le controler est appelé avec en param $_GET['nom_booker'].
Le controler doit afficher la fiche contact correspondante en redonnant la variable $data['contact'] remplie correctement

Si l'user clique sur l'icone plus, le controler est appelé et doit afficher un formulaire tout vide.

A faire :


Améliorations :


-->

<div class="col-md-4">
  <div class="panel panel-info">
    <div class="panel-heading">
      <div class="row">
          <h3 class="panel-title col-md-8">Vos contacts :</h3>
          <a href="../Controler/contacts.ctrl.php?arg=addContact" class="btn btn-lg btn-success pull-right boutonPlus"><span class="glyphicon glyphicon-plus"></span></a>
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
            echo '<li><a href="../Controler/contacts.ctrl.php?selected='.$nomPrenom.'" class="list-group-item">'.
              "<span class=\"glyphicon glyphicon-chevron-right pull-right\"></span> $nomPrenom</a></li>";
            }
          }
         ?>
        </ul>
    </div><!--panel body-->
  </div><!--panel info-->
</div><!--col md 4-->
