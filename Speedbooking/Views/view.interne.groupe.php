<!-- Page d'affichage des groupes d'un booker
    

-->
<?php include('../Views/view.interne.header.php'); ?>
        <li><a href="../Controler/date.ctrl.php"><span class="glyphicon glyphicon-calendar"></span> Mes dates</a></li>
        <li><a href="../Controler/contacts.ctrl.php"><span class="glyphicon glyphicon-phone-alt"></span> Mes contacts</a></li>
        <li><a href="../Controler/fichiers.ctrl.php" ><span class="glyphicon glyphicon-file"></span> Mes fichiers</a></li>
        <li class="active"><button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Mon Compte<span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="#">Gestion des groupes</a></li>
                <li><a href="#">Gestion compte</a></li>
            </ul>
        </li>
        <li><a href="../Controler/portail.ctrl.php" ><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
      </ul>
    </div>
  </div>
</header>
<?php include('../Views/view.interne.groupe.aside.php'); ?>
<?php
   if(isset ($data['groupe'])) {
     ?>
<div class="col-md-8">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">
        <?php
            echo $data['groupe'][0]['nom'];
        ?></h3>
    </div>
    <div class="panel-body">
            <form action="../Controler/groupe.ctrl.php" method="post" class= " well form ">
                <input type="hidden" name ="maj">
                <?php
                $idG=$data['groupe'][0]['id'];?>
                <input type="hidden" name="idG" value="<?php echo $idG ?>">
                <div class="from-group row">
                    <label for="nom" class="col-md-4 control-label">Nom du groupe : </label>
                    <div class="col-md-8"><input type="text" id="nom" class="form-control" name="c_nom" value ="<?= $data['groupe'][0]['nom'] ?>" /></div>
                </div>
                </br>
                <div class=" from-group row">
                    <label for="membre" class="col-md-5 control-label">Membres du groupe : </label>
                    <ul class="list-group list-unstyled col-md-4">
                    <?php
                        foreach($data['groupe'][1] as $g){
                            $nomPrenom = $g['nom'].' '.$g['prenom'];
                            echo '<li><a href="../Controler/contacts.ctrl.php?selected='.$nomPrenom.'" class="list-group-item">'."<span class=\"glyphicon glyphicon-chevron-right pull-right\"></span> $nomPrenom</a></li>";
                        }
                    ?>
                    </ul>
                    
                    <a href="../Controler/groupe.ctrl.php?selected=<?php echo $data['groupe'][0]['nom'];?>&selectContact=true&idG=<?php echo $idG?>" class="btn btn-default btn-info pull-right boutonPlus col-md-1"><span class="glyphicon glyphicon-plus"></span></a>
                        <?php
                        if(isset($data['Contacts'])){
                            echo "<ul class=\"list-group list-unstyled col-md-4\">";
                            echo "<form>";
                            foreach ($data['Contacts'] as $c){
                                $nomPrenom=$c['nom'].' '.$c['prenom'];
                                $idM = $c['id'];
                                    echo"<li> <input type=\"checkbox\" name=\"membres[]\" value=\"$idM\">$nomPrenom</li>";
                                    echo"<br>";
                            }
                            echo"</from>";
                            echo "</ul>";
                        }
                        ?>
                </div>
                </br>
                <div class="form-group row">
                    <label for="mail"  class="col-md-4 control-label">Mail : </label>
                    <div class="col-md-8"><input type="email" id="mail" class="form-control" name="c_mail" value="<?= $data['groupe'][0]['mail']?>"/></div>
                </div>
                <div class="form-group row">
                    <label for="style"  class="col-md-4 control-label">Style : </label>
                    <div class="col-md-8"><input type="text" id="mail" class="form-control" name="c_style" value ="<?= $data['groupe'][0]['style'] ?>" /></div>
                </div>
                <div class="from-group row">
                     <label for="textarea" class="col-md-4 control-label">Notes :</label>
                    <div class="col-md-8"><textarea id="textarea" class="form-control" rows="2" name="c_notes"></textarea></div>
                </div>
                </br>
                <div class="form-group row">
                    <a href="../Controler/groupe.ctrl.php?delete=true&id=<?= $data['groupe'][0]['nom'] ?>" class="btn btn-danger pull-left"><span class="glyphicon glyphicon-trash"></span></a>
                    <button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-ok"></span></button></a>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
</section>
<?php
    } else{
        include '../Views/view.interne.groupeNouveau.php';
    }
?>
<?php include('../Views/view.interne.footer.php'); ?>