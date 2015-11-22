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
<!DOCTYPE html>
<htlm lang="fr">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="../../favicon.ico">
      <!-- Bootstrap -->
      <link href="../Views/bootstrap/css/bootstrap.css" rel="stylesheet">
      <link href="index.css" rel="stylesheet">
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
                <ul class=" nav navbar-nav navbar-right">
