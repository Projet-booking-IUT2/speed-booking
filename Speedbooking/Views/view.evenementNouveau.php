<?php include('../Views/view.header.php'); ?>

<li><a href="../Controler/date.ctrl.php"><span class="glyphicon glyphicon-calendar"></span> Mes dates</a></li>
<li class="active"><a href="../Controler/contacts.ctrl.php?accueil=true"><span class="glyphicon glyphicon-phone-alt"></span> Mes contacts</a></li>
<li><a href="../Controler/fichiers.ctrl.php" ><span class="glyphicon glyphicon-file"></span> Mes fichiers</a></li>
<li><a data-toggle="dropdown">Mon Compte<span class="caret"></span></a>
      <ul class="dropdown-menu">
          <li><a href="../Controler/groupe.ctrl.php">Gestion des groupes</a></li>
          <li><a href="#">Gestion des utilisateurs</a></li>
          <li><a href="#">Gestion compte</a></li>
      </ul>
</li>
<li><a href="../Controler/portail.ctrl.php" ><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
</ul>
</div><!--navbar collapse-->
</div><!--container nav-->
</nav><!-- nav-->
</header>
<div class="col-md-8">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Nouvel événement</h3>
    </div>
    <div class="panel-body">
         <form action="../Controler/date.ctrl.php" method="post" class= " well form ">
            <input type="hidden" name="add" />
            <div class="form-group row">
                <label for="nom" class="col-md-4 control-label">Nom de l'événement : </label>
                <div class="col-md-8"><input type="text" id="nom" class="form-control" name="c_nom"></div>
            </div>
            <div class="form-group row">
                <label for="org" class="col-md-4 control-label">Nom de l'organisateur : </label>
                <div class="col-md-8"><input type="text" id="org" class="form-control" name="c_org"></div>
            </div>
            <!-- Afficher les Noms de groupes pour les ajouter à l'event -->

            <div class="form-group row">
                <label for="note" class="col-md-4 control-label">Note : </label>
                <div class="col-md-8"><input type="text" id="note" class="form-control" name="c_note"></div>
            </div>
    </div>
  </div>
</div>
