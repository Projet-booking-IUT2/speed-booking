<div class="col-md-8">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Nouveau Groupe</h3>
    </div>
    <div class="panel-body">
        <form action="../Controler/groupe.ctrl.php" method="post" class= " well form ">
            <input type="hidden" name="add" />
            <div class="form-group row">
                <label for="nom" class="col-md-4 control-label">Nom du groupe : </label>
                <div class="col-md-8"><input type="text" id="nom" class="form-control" name="c_nom"></div>
            </div>
            <div class=" from-group row">
                <label for="membre" class="col-md-4 control-label">Membres du groupe : </label>
                <a href="../Controler/groupe.ctrl.php?nouveauMembre=true" class="btn btn-default btn-info pull-right boutonPlus col-md-1"><span class="glyphicon glyphicon-plus"></span></a>
            <?php
                if(isset($data['groupe'][1])){
                    foreach($data['groupe'][1] as $g){
                        $nomPrenom = $g['nom'].' '.$g['prenom'];
                        echo '<li><a href="../Controler/contacts.ctrl.php?selected='.$nomPrenom.'" class="list-group-item">'."<span class=\"glyphicon glyphicon-chevron-right pull-right\"></span> $nomPrenom</a></li>";
                    }
                }
                ?>
            </div>
            </br>
            <div class="form-group row">
                <label for="mail"  class="col-md-2 control-label">Mail : </label>
                <div class="col-md-10"><input type="email" id="mail" class="form-control" name="c_mail" placeholder="xyz@exemple.com"/></div>
            </div>
            <div class="form-group row">
                <label for="style"  class="col-md-2 control-label">Style : </label>
                <div class="col-md-10"><input type="text" id="mail" class="form-control" name="c_style" placeholder="Rock" /></div>
            </div>
            <div class="from-group row">
                <label for="textarea" class="col-md-2 control-label">Notes :</label>
                <div class="col-md-10"><textarea id="textarea" class="form-control" rows="2" name="c_notes"></textarea></div>
            </div>
            <div class="form-group row">
                <button type="submit" class="btn btn-success pull-right boutonPlus"><span class="glyphicon glyphicon-ok">Créer</span></button>
            </div>
        </form>
    </div>
  </div>
</div>