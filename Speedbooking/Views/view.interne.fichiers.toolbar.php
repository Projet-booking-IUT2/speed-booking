<div class="btn-toolbar">
    <form class="navbar-form btn-group">
      <div class="form-group">
        <input type="search" class="input-sm form-control" placeholder="Recherche">
        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span>
        </button>
      </div>
    </form>
    <div class="btn-group">
      <!--trier par ordre alpha A-Z | PAR DEFAUT-->
      <a href="#" class="btn btn-lg btn-info">
        <span class="glyphicon glyphicon-sort-by-alphabet"></span> Nom
      </a>
      <!--trier par ordre alpha Z-A
      <a href="#" class="btn btn-info">
        <span class="glyphicon glyphicon-sort-by-alphabet-alt"></span> Nom
      </a>
      -->
      <!--trier par plus récent -> moins récent ON -->
      <a href="#" class="btn btn-lg btn-info">
        <span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Date
      </a>
      <!--trier par moins récent -> plus récent ON
      <a href="#" class="btn btn-lg btn-info">
        <span class="glyphicon glyphicon-sort-by-attributes"></span> Date
      </a>
      -->
     <!--N'afficher que les fichiers partagés avec un certain groupe -->
      <a href="#" class="btn btn-lg btn-info">
        <span class="glyphicon glyphicon-tag"></span> Partagé avec
      </a>
    </div>
    <div class="btn-group pull-right">
      <a href="../Controler/contacts.ctrl.php?create=true" class="btn btn-lg btn-success">
        <span class="glyphicon glyphicon-plus"></span>
      </a>
    </div><!--btngroupe-->

</div><!--toolbar-->
