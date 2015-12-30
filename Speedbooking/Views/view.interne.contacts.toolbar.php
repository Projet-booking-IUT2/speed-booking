<div class="btn-toolbar hidden-xs hidden-sm">

  <div class="btn-group"><a href="../Controler/contacts.ctrl.php?accueil=true" class="btn btn-lg btn-info">
    <span class="glyphicon glyphicon-home"></span>
  </a></div>
  <div class="btn-group">
    <form class="navbar-form " role="search"  action="../Controler/contacts.ctrl.php" method="post">
      <div class="input-group">
        <input type="search" class="input-sm form-control" placeholder="Recherche"  name="keyword">
        <div class="input-group-btn">
            <button class="btn btn-info btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
    </form>
  </div>
    <div class="btn-group" id="#menu">
      <!--trier par ordre alpha A-Z | PAR DEFAUT-->
      <a href="#" class="btn btn-lg btn-info">
        <span class="glyphicon glyphicon-sort-by-alphabet" id="icone"></span> Nom
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
     <!--trier par type -->
      <ul class="btn btn-lg btn-info list-unstyled">
        <li class="dropdown">
          <a href="#" class=" dropdown-toggle LienMenuDeroulant" data-toggle="dropdown">
            <span class="glyphicon glyphicon-tag"></span> Type
          </a>
          <ul class="dropdown-menu list-unstyled menuDeroulant">
            <?php
                foreach($data['types'] as $t){

                  echo '<li><a href="#" class="list-group-item-info">'.$t.'</a></li>';
                }
            ?>
          </ul>
        </li>
      </ul>
      <!--trier par structures -->
      <ul class="btn btn-lg btn-info list-unstyled">
        <li class="dropdown">
          <a href="#" class=" dropdown-toggle LienMenuDeroulant" data-toggle="dropdown">
            <span class="glyphicon glyphicon-tags"></span> Structure
          </a>
          <ul class="dropdown-menu list-unstyled menuDeroulant">
            <?php
                foreach($data['structures'] as $s){

                  echo '<li><a href="#" class="list-group-item-info">'.$s.'</a></li>';
                }
            ?>
          </ul>
        </li>
      </ul>
      <!--N'afficher que les favoris -->
      <a href="#" class="btn btn-lg btn-success">
        <span class="glyphicon glyphicon-heart"></span> Favoris
      </a>

      <!-- N'afficher que les OBSOLETES-->
      <a href="#" class="btn btn-lg btn-warning">
        <span class="glyphicon glyphicon-warning-sign"></span> Obsolètes
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
      <a href="../Controler/contacts.ctrl.php?accueil=true" class="btn btn-block btn-info">
        <span class="glyphicon glyphicon-home"></span>
      </a>
      <a href="../Controler/contacts.ctrl.php?create=true" class="btn btn-block btn-success">
        <span class="glyphicon glyphicon-plus"></span>
      </a>
    </div>
    <div class="btn-group">
      <form class="navbar-form " role="search"  action="../Controler/contacts.ctrl.php" method="post">
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
        <li class="btn btn-lg btn-success">
          <a href="#" >
            <span class="glyphicon glyphicon-heart"></span>
          </a>
        </li>
        <li class="btn btn-lg btn-warning">
          <a href="#" >
            <span class="glyphicon glyphicon-warning-sign"></span>
          </a>
        </li></div>
      </ul>
    </div>
</div>
