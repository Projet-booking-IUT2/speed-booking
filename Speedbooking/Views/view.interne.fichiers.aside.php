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
                echo "<li>
              <div class=\"btn-toolbar list-group-item\">
                <div class=\"btn-group\">
                  <a href=\"#\" class=\"btn btn-md\">$nom</a>
                </div>
                <div class=\"btn-group pull-right\">
                  <a href=\"#\" class=\"btn btn-md btn-info\">
                    <span class=\"glyphicon glyphicon-download-alt\"></span>
                  </a>
                </div>
                <div class=\"btn-group pull-right\">
                  <a href=\"#\" class=\"btn btn-md btn-info\">
                    <span class=\"glyphicon glyphicon-wrench\"></span>
                  </a>
                </div>
                <div class=\"btn-group pull-right\">
                  <a href=\"#\" class=\"btn btn-md btn-danger\">
                    <span class=\"glyphicon glyphicon-remove\"></span>
                  </a>
                </div>
              </div></li>";
            }
          }
         ?>
        </ul>
    </div><!--panel body-->
  </div><!--panel info-->
</div><!--col md 4-->
