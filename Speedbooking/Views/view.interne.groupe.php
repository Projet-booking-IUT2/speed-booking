<!-- Page d'affichage des groupes d'un booker
    

-->
<?php include('../Views/view.interne.header.php'); ?>

        <li><a href="../Controler/date.ctrl.php"><span class="glyphicon glyphicon-calendar"></span> Mes dates</a></li>
        <li><a href="../Controler/contacts.ctrl.php"><span class="glyphicon glyphicon-phone-alt"></span> Mes contacts</a></li>
        <li><a href="../Controler/fichiers.ctrl.php" ><span class="glyphicon glyphicon-file"></span> Mes fichiers</a></li>
        <li class="active"><a href="#" ><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
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
            echo $data['groupe']['nom'];
        ?></h3>
    </div>
    <div class="panel-body">
            <form action="../controler/groupe.ctrl.php" method="post" class= " well form ">
                <div class="row">
                      <fieldset class="form-group">
                       <label for="nomG" class="col-md-4 control-label">Nom du groupe : </label>
                       <div class="col-md-8"><input type="text" id="nom" class="form-control" name="c_nom" value ="<?= $data['groupe']['nom'] ?>" /></div>
                      </fieldset>
                </div>
                <div class=" from-group row">
                    <label for="nom" class="col-md-4 control-label">Membres du groupe : </label>
                    <?php
                        //récup les membres du groupes et renvoie sur leur fiche contact si clique sur leur nom
                    ?>
                </div>
                <div class="from-group row">
                     <label for="textarea" class="col-md-2 control-label">Notes :</label>
                    <div class="col-md-10"><textarea id="textarea" class="form-control" rows="2" name="c_notes"><?= $data['groupe']['notes'] ?></textarea></div>
                </div>
                <div class="form-group">
                <label  class="col-md-4 control-label">Date de mise à jour minimum :</label>
                    <input type="radio" name ="c_dureeMAJ" value="1_month">1 mois
                    <input type="radio" name ="c_dureeMAJ" value="3_month" checked>3 mois
                    <input type="radio" name ="c_dureeMAJ" value="6_month">6 mois
                    <input type="radio" name ="c_dureeMAJ" value="12_month">12 mois
                </div>
                <div class="form-group row">
                    <button type="submit" class="btn btn-success pull-right boutonPlus"><span class="glyphicon glyphicon-ok">Créer</span></button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
</section>
<?php
    }?>
<?php include('../Views/view.interne.footer.php'); ?>