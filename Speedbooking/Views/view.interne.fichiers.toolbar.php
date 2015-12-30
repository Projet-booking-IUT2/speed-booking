<div class="btn-toolbar hidden-xs hidden-sm">
  <div class="btn-group">
    <form class="navbar-form " role="search"  action="" method="post">
      <div class="input-group">
        <input type="search" class="input-sm form-control" placeholder="Recherche"  name="keyword">
        <div class="input-group-btn">
            <button class="btn btn-info btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
    </form>
  </div>
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

<!--Toolbar responsive -->
<div class="btn-toolbar hidden-lg hidden-md visible-xs visible-sm">
    <div class="btn-group btn-group-justified">
      <a href="../Controler/contacts.ctrl.php?create=true" class="btn btn-block btn-success">
        <span class="glyphicon glyphicon-plus"></span>
      </a>
    </div>
    <div class="btn-group">
      <form class="navbar-form " role="search"  action="" method="post">
        <div class="input-group">
          <input type="search" class="input-sm form-control" placeholder="Recherche"  name="keyword">
          <div class="input-group-btn">
              <button class="btn btn-info btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
          </div>
        </div>
      </form>
    </div>
    <div class="btn-group ">
      <div class="btn-group btn-group-justified">
        <a class="btn btn-block btn-info " data-toggle="collapse" href="#MenuRecherche">
          <span class="glyphicon glyphicon-th-list"></span>
        </a>
      </div>
      <ul id="MenuRecherche" class="collapse nav">
        <div class="btn-group btn-group-justified">
        <li  class="btn btn-lg btn-info">
              <a href="#">
                <span class="glyphicon glyphicon-sort-by-alphabet" id="icone"></span>
              </a>
        </li>
        <li class="btn btn-lg btn-info">
          <a href="#" >
            <span class="glyphicon glyphicon-sort-by-attributes-alt"></span>
          </a>
        </li>
      </div>
      </ul>
    </div>
</div>
