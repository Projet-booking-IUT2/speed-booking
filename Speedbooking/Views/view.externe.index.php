<!DOCTYPE html>
<!-- LIENS UTILES :
*page d'exemple des themes bootstraps -> http://getbootstrap.com/examples/theme/
*THE guide to bootstrap : http://www.webdesignerdepot.com/2014/10/the-ultimate-guide-to-bootstrap/
*site d'édition/test pour bootstrap/JS : http://www.bootply.com/
*site générateur de formulaire et boutons bootstrap : http://bootsnipp.com/
*site icones bootstrap : http://fortawesome.github.io/Font-Awesome/
*icones bootstrap : http://glyphicons.com/
*boutons, toujours et encore : http://bootsnipp.com/buttons
-->
<!--
Page d'accueil par défaut. Rapide présentation de l'agence et de ses groupes.
--------------------------------------------------------------
Aucune variables php envoyées ou nécessaires

A faire :
Lalalala <3

Améliorations :
-Faire une boucle affichage des groupes dynamique, avec en données le lien/chemin d'une image, son nom, une rapide description.

-->

<?php include('../Views/view.externe.header.php'); ?>
      <section class="row">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Notre agence</h3>
          </div>
          <div class="panel-body">Contenu</div>
          <div class="panel-footer">Pied de panneau</div>
        </div>
      </section>
      <section class="row">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Groupe 1</h3>
          </div>
          <div class="panel-body">
            <aside class="col-lg-4">Image du groupe</aside>
            <article class="col-lg-8">
              <p>présentation groupe 1 <br/><br/><br/><br/><br/></p>
            </article>
          </div>
        </div>
      </section>
      <section class="row">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Groupe 2</h3>
          </div>
          <div class="panel-body">
            <aside class="col-lg-4">Image du groupe</aside>
            <article class="col-lg-8">
              <p>présentation groupe 1 <br/><br/><br/><br/><br/></p>
            </article>
          </div>
        </div>
      </section>

<?php include('../Views/view.externe.footer.php'); ?>
