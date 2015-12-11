<div class="btn-toolbar">
    <form class="navbar-form btn-group">
      <div class="form-group">
        <input type="search" class="input-sm form-control" placeholder="Recherche par mots clés">
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
     <!--trier par type OFF -->
      <ul class="btn btn-lg btn-info list-unstyled">
        <li class="dropdown">
          <a href="#" class=" dropdown-toggle LienMenuDeroulant" data-toggle="dropdown">
            <span class="glyphicon glyphicon-tag"></span> Type
          </a>
          <ul class="dropdown-menu list-unstyled menuDeroulant">
            <li><a href="#">Type 1</a></li>
            <li><a href="#">Type 2</a></li>
          </ul>
        </li>
      </ul>
      <!--trier par structures OFF -->
      <a href="#" class="btn btn-lg btn-info">
        <span class="glyphicon glyphicon-tags"></span> Structure
      </a>
      <!--N'afficher que les favoris OFF -->
      <a href="#" class="btn btn-lg btn-success">
        <span class="glyphicon glyphicon-heart"></span> Favoris
      </a>
      <!-- N'afficher que les favoris ON
      <a href="#" class="btn btn-lg btn-success">
        <span class="glyphicon glyphicon-heart" style="color:#e43d48;"> Favoris</span>
      </a>
      -->
      <!-- N'afficher que les OBSOLETES OFF -->
      <a href="#" class="btn btn-lg btn-warning">
        <span class="glyphicon glyphicon-warning-sign"></span> Obsolètes
      </a>
      <!-- N'afficher que les OBSOLETES ON
      <a href="#" class="btn btn-lg btn-warning">
        <span class="glyphicon glyphicon-warning-sign" style="color:#e43d48;"> Obsolètes</span>
      </a>
      -->
    </div>
    <div class="btn-group pull-right">
      <a href="../Controler/contacts.ctrl.php?create=true" class="btn btn-lg btn-success">
        <span class="glyphicon glyphicon-plus"></span>
      </a>
    </div><!--btngroupe-->
</div><!--toolbar-->
