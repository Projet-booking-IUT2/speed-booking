<!--
Header général à inclure en début des pages :
view.interne.dates.php
view.interne.contacts.php
view.interne.fichiers.php
view.interne.deconnexion.php
view.interne.comptes.php

Les liens du menu pointent vers les controlers des pages citées ci-dessus
(les balises <li> du menu sont en début de chaque vue pour pouvoir spécifier la class "active")

Améliorations :
-Logo à mettre
-Liens du menu à remplir pour rendre le menu fonctionnel (href)


-->
<?php //défini l'UTF-8 comme encodage par défaut (à placer dans le fichier de configuration par exemple)
 mb_internal_encoding('UTF-8'); ?>
<!DOCTYPE html>
<htlm lang="fr">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="../../favicon.ico">
      <!-- Bootstrap -->
      <link href="../Views/bootstrap/css/bootstrap.css" rel="stylesheet">
      <link href="../Views/index.css" rel="stylesheet">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <title>SpeedBooking</title>
    </head>
    <body>
      <div class="container">
        <header class ="row">
          <div class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                <div class="navbar-header  col-md-4">
                  <a class="navbar-brand" href="#">SpeedBooking</a>
                </div>
                <ul class=" nav navbar-nav navbar-right">
