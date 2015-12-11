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
                <a href="../Controler/groupe.ctrl.php?selectContact=true" class="btn btn-default btn-info pull-right boutonPlus col-md-1"><span class="glyphicon glyphicon-plus"></span></a>
                <ul class="list-group list-unstyled col-md-4">
                    <form action="../Controler/groupe.ctrl.php" method="post" class= " well form ">
                    <?php
                    if(isset($data['Contacts'])){
                        $i=0;
                        echo "<form>";
                        foreach ($data['Contacts'] as $c){
                            $nomPrenom=$c['nom'].' '.$c['prenom'];
                                echo"<li> <input type=\"checkbox\" name=\"membres[]\" value=\"$nomPrenom\">$nomPrenom</li>";
                                echo"<br>";
                            $i++;
                        }
                        echo"</from>";
                    }
                    ?>
                </ul>
            
            </div>
            </br>
            <div class="form-group row">
                <label for="mail"  class="col-md-4 control-label">Mail : </label>
                <div class="col-md-8"><input type="email" id="mail" class="form-control" name="c_mail" placeholder="xyz@exemple.com"/></div>
            </div>
            <div class="form-group row">
                <label for="style"  class="col-md-4 control-label">Style : </label>
                <div class="col-md-8"><in              put type="text" id="mail" class="form-control" name="c_style" placeholder="Rock" /></div>
            </div>
            <div class="from-group row">
                <label for="textarea" class="col-md-4 control-label">Notes :</label>
                <div class="col-md-8"><textarea id="textarea" class="form-control" rows="2" name="c_notes"></textarea></div>
            </div>
            </br>
            <div class="form-group row">
                <button type="submit" class="btn btn-success pull-right boutonPlus"><span class="glyphicon glyphicon-ok">Créer</span></button>
            </div>
        </form>
    </div>
  </div>
</div>