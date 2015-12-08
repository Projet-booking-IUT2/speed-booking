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
          ['adresse']
          ['tel']
          ['site']
          ['type']
          ['notes']
          ['maj']
          ['lieuTravail']
          ['dernièreMaj']
La variable $_GET['VueAvance'] existe et vaut true, le formulaire s'affiche avec tous les détails.
En vue avancé, on doit renseigner tout les événements en lien avec ce contact

A faire :
- les fonctions supprimer/modifier
-les fonctions de recherche
Améliorations :
//////////////////////////////////
Pour les STRUCTURES lors de la création d'un contact : ///////////////////////////////////////////////////////////////////////////////////
-soit on transforme le champ "travaille à" en <option> qui propose toutes les structures existantes.
Et à coté de ce champ, on met un petit "+" qui permet d'ajouter une nouvelle structure si besoin.
Comme ça, l'user n'a pas besoin de créer d'abord sa structure pour ensuite retourner créer son contact
(ça serait nul et chiant)
-soit on fait une fiche structure pour créer des structures et ensuite lui ajouter des contacts/staff, mais
c'est nul je trouve

Pour les recherches :
Je me demande si ça serait pas mieux de faire un menu spécial recherche (avec un champ texte pour les mots clés,
des icones pour rechercher/trier par nom,prénom,type,dernière modification et structure)

-->
<?php include('../Views/view.interne.header.php'); ?>

        <li><a href="../Controler/date.ctrl.php"><span class="glyphicon glyphicon-calendar"></span> Mes dates</a></li>
        <li class="active"><a href="#"><span class="glyphicon glyphicon-phone-alt"></span> Mes contacts</a></li>
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
      <?php include('../Views/view.interne.contacts.aside.TEST.php'); ?>
      <div class="col-md-8">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">
                LALALA
               </h3>
          </div>
          <div class="panel-body">
              TRUC sur les structures + listes des contacts obscolètes
          </div><!--panel body-->
        </div><!--panel-->
      </div><!--col md 8-->
    </div><!--row-->
  </div><!--panelbody-->
</div><!--panel-->
</div><!--row-->
<?php include('../Views/view.interne.footer.php'); ?>
