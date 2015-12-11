<div class="row"><div class="col-md-4">
  <div class="panel panel-info">
    <div class="panel-heading">
      <div class="row">
          <div class="col-md-10">
            <div class="row"><h3 class="col-md-12 panel-title">Mes fichiers :</h3></div>
          </div>
      </div>
    </div>
    <div class="panel-body">
        <ul class="list-group list-unstyled">
        <?php
          if (!isset($data['AllFichiers'])) {
            echo "
            <div class=\"alert alert-info\">
            <strong>Vous n'avez pas encore uploadé de fichiers ! </strong>
            </div>
            ";
          }
          else {
            foreach($data['AllFichiers'] as $f ) {
            $nom = $f['nom'];
                echo "<li class=\"list-group-item \">
                  <a href=\"#\">$nom</a>
                  <a href=\"#\" class=\"btn-lg\">
                    <span class=\"glyphicon glyphicon-download-alt pull-right\" style=\"color:#00aa30;\"></span>
                  </a>
                  </li>";
            }
          }
         ?>
        </ul>
    </div><!--panel body-->
  </div><!--panel info-->
</div><!--col md 4-->
