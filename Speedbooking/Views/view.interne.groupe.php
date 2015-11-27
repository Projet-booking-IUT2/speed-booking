<!-- Page d'affichage des groupes d'un booker
    

-->
<?php include('../Views/view.interne.header.php'); ?>

        <li><a href="../Views/view.interne.date.php"><span class="glyphicon glyphicon-calendar"></span> Mes dates</a></li>
        <li><a href="../Views/view.interne.contacts.php"><span class="glyphicon glyphicon-phone-alt"></span> Mes contacts</a></li>
        <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span> Mes groupes</a></li>
        <li><a href="#" ><span class="glyphicon glyphicon-file"></span> Mes fichiers</a></li>
        <li><a href="#" ><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
        <li><a href="#" ><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
      </ul>
    </div>
  </div>
</header>
<?php include('../Views/view.interne.groupe.aside.php'); ?>
<div class="col-md-8">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">
        <?php
            echo "Nouveau Groupe :";
            //echo $data['groupe']['nom'];
        ?></h3>
    </div>
    <div class="panel-body">
      <!--<form action="../controler/ctrl.interne.groupe.php" method="post" class= " well form ">-->
      <?php
          //formulaire rempli
          ?>
          <div class="row">
                <fieldset class="form-group">
                 <label for="nomG" class="col-md-4 control-label">Nom du groupe : </label>
                 <div class="col-md-8"><input type="text" id="nomG" class="form-control" name="c_nomG" ></div>
                </fieldset>
          </div>
          <div class="row">
              <fieldset class="form-group">
                 <label for="nom" class="col-md-4 control-label">Membres du groupe : </label>
                  <?php
                        //récup les membres du groupes et renvoie sur leur fiche contact si clique sur leur nom
                  ?>
              </fieldset>
          </div>
        <?php 
          //formulaire vide
        ?>
        <div class="row">
            <fieldset>
                  <label for="textarea" class="col-md-4 control-label">Note :</label>
                  <textarea id="textarea" class="form-control" rows="2" name="c_notes"></textarea>
                  <div class="form-group">
                      <label  class="col-md-4 control-label">Date de mise à jour minimum :</label>
                      <input type="radio" name ="c_dureeMAJ" value="1_month">1 mois
                      <input type="radio" name ="c_dureeMAJ" value="3_month" checked>3 mois
                      <input type="radio" name ="c_dureeMAJ" value="6_month">6 mois
                      <input type="radio" name ="c_dureeMAJ" value="12_month">12 mois
                  </div>
            </fieldset>
          </div>
        <?php 
        ?>
        <div class="form-group row">
            <button type="submit" class="btn btn-success pull-right boutonPlus"><span class="glyphicon glyphicon-ok">Créer</span></button>
        </div>
      </form>
    </div>
  </div>
</div>
</section>
<?php include('../Views/view.interne.footer.php'); ?>