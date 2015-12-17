<!--
Page d'affichage des contacts.
-header
-toolbar (avec les fonctions de tris + boutons nouveau contact)
-aside (liste des contacts -peut être modifiée selon le tri choisi-)
-structures
-alertes contacts obsolètes

Variables nécessaires :
$data['obsoletes'] -> liste des contacts obsoletes pour les alertes
$data['contact'] -> liste des contacts pour le aside
          ['nom']
          ['prenom']
          ['mail']
          ['adresse']
          ['tel']
          ['site']
          ['type']
          ['notes']
          ['maj']
          ['lieuTravail']
          ['dernièreMaj']

$data['types'] -> liste des types de contacts existants pour la toolbar
$data['structures'] -> liste des structures de contacts existantes pour la toolbar et formulaire contact
$data['tris']->type de tri séléctionné (éventuellement)

A faire :

Améliorations :
//////////////////////////////////
Pour les STRUCTURES lors de la création d'un contact : ///////////////////////////////////////////////////////////////////////////////////
-soit on transforme le champ "travaille à" en <option> qui propose toutes les structures existantes.
Et à coté de ce champ, on met un petit "+" qui permet d'ajouter une nouvelle structure si besoin.
Comme ça, l'user n'a pas besoin de créer d'abord sa structure pour ensuite retourner créer son contact
(ça serait nul et chiant)
-soit on fait une fiche structure pour créer des structures et ensuite lui ajouter des contacts/staff, mais
c'est nul je trouve


-->
<?php include('../Views/view.interne.header.php'); ?>

        <li><a href="../Controler/date.ctrl.php"><span class="glyphicon glyphicon-calendar"></span> Mes dates</a></li>
        <li class="active"><a href="../Controler/contacts.ctrl.php"><span class="glyphicon glyphicon-phone-alt"></span> Mes contacts</a></li>
        <li><a href="../Controler/fichiers.ctrl.php" ><span class="glyphicon glyphicon-file"></span> Mes fichiers</a></li>
        <li><a href="../Controler/compte.ctrl.php" ><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
        <li><a href="../Controler/portail.ctrl.php" ><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
      </ul>
    </div><!--container nav-->
  </div><!-- nav-->
</header>
<div class="row">
  <div class="panel panel-info">
    <div class="panel-heading">
      <?php include('../Views/view.interne.contacts.toolbar.php'); ?>
    </div><!--panelheading-->
    <div class="panel-body">
      <?php include('../Views/view.interne.contacts.aside.php'); ?>
      <div class="col-md-8">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">
                LALALA
               </h3>
          </div>
          <div class="panel-body">
              TRUC sur les structures
          </div><!--panel body-->
        </div><!--panel-->
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
      </div><!--col md 8-->
  </div><!--panelbody-->
</div><!--panel-->
</div><!--row-->
<?php include('../Views/view.interne.footer.php'); ?>
