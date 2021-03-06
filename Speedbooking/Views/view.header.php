
<?php //défini l'UTF-8 comme encodage par défaut (à placer dans le fichier de configuration par exemple)
 mb_internal_encoding('UTF-8'); ?>
<!DOCTYPE html>

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

<html lang="fr">
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
      <!--script pour les boites de confirmation-->
      <script>
      $(function() {
      	$('a[data-confirm]').click(function(ev) {
      		var href = $(this).attr('href');

      		if (!$('#dataConfirmModal').length) {
      			$('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Merci de confirmer</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Non</button><a class="btn btn-danger" id="dataConfirmOK">Oui</a></div></div></div></div>');
      		}
      		$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
      		$('#dataConfirmOK').attr('href', href);
      		$('#dataConfirmModal').modal({show:true});

      		return false;
      	});
      });

      $(function (){
  $('#menu').on('shown.bs.collapse', function () {
    $('#icone').removeClass('glyphicon glyphicon-sort-by-alphabet').addClass('glyphicon-folder-open');
  })
  $('#menu').on('hidden.bs.collapse', function () {
    $('#icone').removeClass('glyphicon-folder-open').addClass('glyphicon-folder-close');
  })
});
      </script>
      <title>SpeedBooking</title>
    </head>
    <body>
      <div class="container">
        <header class ="row">
          <nav class="navbar navbar-default navbar-static-top" role="navigation">
              <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand hidden-xs hidden-sm" href="#">Speed Booking</a>
                    <a class="navbar-brand hidden-md hidden-lg visible-xs visible-sm" href="#">S.Booking</a>
                </div>
                <div class="collapse navbar-collapse">
                  <ul class=" nav navbar-nav navbar-right">
