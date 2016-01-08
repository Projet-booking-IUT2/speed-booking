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

Pour la vue avancé de la fiche contact :
$data['EventContact']['nom']
                    ['date']

$data['types'] -> liste des types de contacts existants pour la toolbar
$data['structures'] -> liste des structures de contacts existantes pour la toolbar et formulaire contact
$data['tris']->type de tri séléctionné (éventuellement)


-->
<?php include('../Views/view.header.php'); ?>

<li><a href="../Controler/date.ctrl.php"><span class="glyphicon glyphicon-calendar"></span> Évènements</a></li>
<li class="active"><a href="../Controler/contacts.ctrl.php?accueil=true"><span class="glyphicon glyphicon-phone-alt"></span> Mes contacts</a></li>
<li><a href="../Controler/fichiers.ctrl.php" ><span class="glyphicon glyphicon-file"></span> Mes fichiers</a></li>
<li><a data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Mon Compte</a>
      <ul class="dropdown-menu">
          <li><a href="../Controler/groupe.ctrl.php">Gestion des groupes</a></li>
          <li><a href="#">Gestion compte</a></li>
      </ul>
</li>
<li><a href="../Controler/portail.ctrl.php" ><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
</ul>
</div><!--navbar collapse-->
</div><!--container nav-->
</nav><!-- nav-->
</header>
<div class="row">
  <div class="panel panel-info">
    <div class="panel-heading">
      <?php include('../Views/view.interne.contacts.toolbar.php'); ?>
    </div><!--panelheading-->
    <div class="panel-body">
      <div class="row">
        <div class="col-md-4">
          <?php include('../Views/view.interne.contacts.aside.php'); ?>
        </div>
        <div class="col-md-8">
          <?php
          if (isset($_GET['accueil']) && $_GET['accueil']=true) {
            if (isset($data['obsoletes'])) { //listes des contacts obscolètes?>
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
                    $id=$data['contact']['id'];
                    echo '<li><a href="../Controler/contacts.ctrl.php?selected='.$nomPrenom.'&id='.$id.'" class="list-group-item-danger">'.
                    "<span class=\"glyphicon glyphicon-chevron-right pull-right\"></span> $nomPrenom</a></li>";
                  }
                  ?>
                </div><!--panel body-->
              </div><!--panel-->
              <?php  }
              else {?>
                <div class="panel panel-warning ">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                      Contacts obsolètes
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </h3>
                  </div>
                  <div class="panel-body">
                    Tous vos contacts sont à jour !
                  </div><!--panel body-->
                </div><!--panel-->

                <?php }
              }
              else { ?>
                <?php include('../Views/view.interne.contacts.php');
              }  ?>
            </div>
          </div>
        </div><!--panelbody-->
      </div><!--panel-->
    </div><!--row-->
    <?php include('../Views/view.footer.php'); ?>
