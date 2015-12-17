<!--
Header général à inclure en début des pages :
view.externe.index.php
view.externe.contact.php
view.externe.connexion.php

Les liens pointent vers les pages :
../controler/ctrl.externe.index.php (Accueil)
../controler/ctrl.externe.contact.php (Contact)
../controler.ctrl.externe.connexion.php (Connexion)

Améliorations :
-Logo à mettre
-Liens du menu à remplir pour rendre le menu fonctionnel (href)
-La classe "active" des balises <li> doit être changée selon la page sur laquelle on est.
Il y a une astuce en javascript pour le faire mais j'ai pas le temps tout de suite.
-Balise <title> à remplir

-->
<!DOCTYPE html>
<htlm lang="fr">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="../../favicon.ico">
      <!-- Bootstrap -->
      <link href="../Views/bootstrap/css/bootstrap.css" rel="stylesheet">
      <link href="../Views/index.css" rel="stylesheet">
      <title>SpeedBooking</title>
    </head>
    <body>
      <div class="container">
        <header class ="row">
          <div class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                <div class="navbar-header  col-md-4">
                  <a class="navbar-brand" href="#">Logo trop beau</a>
                </div>
                <ul class="col-md-4 nav navbar-nav navbar-right">
                  <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
                  <li><a href="#" ><span class="glyphicon glyphicon-envelope"></span> Contact</a></li>
                  <li><a href="../Controler/portail.ctrl.php" ><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
                </ul>
              </div>
          </div>
        </header>
