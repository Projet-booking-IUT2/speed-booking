<!-- Vue de création de groupe


-->

<div class="col-md-4">
  <div class="panel panel-info">
    <div class="panel-heading">
        <div class="row">
            <h3 class="panel-title">Vos Groupes :</h3>
            <a href="../Controler/groupe.ctrl.php" class="btn btn-lg btn-success pull-right boutonPlus"><span class="glyphicon glyphicon-plus"></span></a>
        </div>
    </div>
    <div class="panel-body">
        <ul class="list-group list-unstyled">
        <?php
            if(isset($data['AllGroupe'])){
                echo "
                <div class=\"alert alert-info\">
                <strong>Vous n'avez pas encore enregistré de groupe ! </strong>
                </div>
                ";
            }
            else {
                foreach($data['AllGroupe'] as $c ) {
                    $nom=$c['nom'];
                    echo '<li><a href="../Controler/groupe.ctrl.php?selected='.$nom.'" class="list-group-item">'.
              "<span class=\"glyphicon glyphicon-chevron-right pull-right\"></span> $nom</a></li>";
                }
            }
         ?>
        </ul>
    </div>
  </div>
</div>
