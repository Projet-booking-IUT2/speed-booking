<?php
   if(isset ($data['contact'])) {
     ?>

  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">
        <?php

           echo $data['contact']['nom']; echo " "; echo $data['contact']['prenom'];
        ?>
         </h3>
    </div>
    <div class="panel-body">
        <form action="../Controler/contacts.ctrl.php" method="post" class= " well form ">
        <input type="hidden" name="maj">
        <div class="row">
          <p class="col-md-9" style="font-size:10px;"><i>Les champs indiqués par une * sont obligatoires.</i></p>
        <?php if($data['Ajour'] == true ) {?>

              <!-- A afficher si à jour : -->
                <div class="alert alert-info col-md-3 pull-right">
                <strong style="font-size:10px;">Contact à jour :)</strong>
                </div>
        <?php } else if($data['Ajour'] == false ) { ?>
              <!-- A afficher si PAS à jour : -->
                <div class="alert alert-danger col-md-3 pull-right">
                <strong style="font-size:10px;">Contact Obsolète ! </strong>
                </div>
        <?php }?>
          </div>
          <div class="form-group row">
              <label for="nom" class="col-md-2 control-label">Nom: *</label>
              <div class="col-md-4"><input required  type="text" id="nom" class="form-control" name="c_nom" value ="<?= $data['contact']['nom'] ?>" /></div>
              <label for="prenom" class="col-md-2 control-label">Prénom: *</label>
              <div class="col-md-4"><input required type="text" id="prenom" class="form-control" name="c_prenom" value ="<?= $data['contact']['prenom'] ?>" /></div>
          </div>
          <div class="form-group row">
              <label for="mail"  class="col-md-2 control-label">Mail: </label>
              <div class="col-md-10"><input type="email" id="mail" class="form-control" name="c_mail" value ="<?= $data['contact']['mail'] ?>" /></div>
          </div>
          <div class="form-group row">
             <label for="adresse"  class="col-md-2 control-label">Adresse: </label>
             <div class="col-md-10"><input  id="adresse" class="form-control" name="c_adresse" value ="<?php //$data['contact']['adresse'] ?>" ></div>
          </div>
          <div class="form-group row">
              <label for="tel" class="col-md-2 control-label">Tel: </label>
              <div class="col-md-4"><input type="tel" id="tel" class="form-control" name="c_tel" value ="<?='0'.$data['contact']['tel'] ?>" /></div>
              <label for="site" class="col-md-2 control-label">Site-web: </label>
              <div class="col-md-4"><input type="url" id="site" class="form-control" name="c_site" value ="<?php // $data['contact']['site'] ?>" /></div>
          </div>
          <div class="form-group row">
              <label for="select" class="col-md-2 control-label">Type: *</label>
                    <div class="col-md-4"><select id="select" class="form-control" name="c_type">
                     <?php
                        if ($data['contact']['metier'] == "Organisateur") {
                            echo '<option selected>Organisateur</option>';
                            echo "<option>Association</option>
                            <option>Festival</option>
                            <option>Musicien</option>
                            <option>Autre</option>";
                        } else if($data['contact']['metier'] == "Association"){
                            echo '<option selected>Association</option>';
                            echo "<option>Organisateur</option>";
                            echo "<option>Festival</option>
                            <option>Musicien</option>
                            <option>Autre</option>";
                        } else if ($data['contact']['metier'] == "Festival"){
                            echo '<option selected>Festival</option>';
                            echo "<option>Organisateur</option>";
                            echo "<option>Association</option>
                            <option>Musicien</option>
                            <option>Autre</option>";
                        } else if ($data['contact']['metier'] == "Musicien"){
                              echo '<option selected>Musicien</option>';
                              echo "<option>Organisateur</option>";
                              echo "<option>Association</option>
                              <option>Festival</option>
                              <option>Autre</option>";
                        } else if ($data['contact']['metier'] == "Autre"){
                              echo '<option selected>Autre</option>';
                              echo "<option>Organisateur</option>";
                              echo "<option>Association</option>
                              <option>Festival</option>
                              <option>Musicien</option>";
                        }
                        else {
                                echo '<option>Autre</option>';
                                echo "<option>Organisateur</option>";
                                echo "<option>Association</option>
                                <option>Festival</option>
                                <option>Musicien</option>";
                        }
                         echo "</select></div>";
                      ?>

                    <label for="orga" class="col-md-2 control-label">Travaille à: </label>
                      <?php
                    if(isset($data['structures'])){
                        echo '<div class="col-md-3"><select id="select" class="form-control" name="lieuTravail">';
                        echo "<option>Structure</option>";

                        foreach ($data['structures'] as $s) {
                            if ($s['nom'] == $data['lieuTravail'] ) {
                                echo '<option selected>'.$s['nom'].'</option>';
                            } else {
                                echo '<option>'.$s['nom'].'</option>';
                            } 
                       }
                       echo "</select></div>";
                    } else {
                         echo "<div class=\"col-md-3\"><select id=\"select\" class=\"form-control\" name=\"lieuTravail\">";
                         echo "<option>Structure</option></select></div>";
                       }
                     ?>
                     <!--javascript pour retourner les données du form au controleur :) -->
                     <script>
                     $(function(){
                       $("form").submit(function(e) {
                         e.preventDefault();
                         var $form = $(this);
                         $.post($form.attr("action"), $form.serialize())
                         .done(function(data) {
                           $("#boutonStructurePlus").html(data);
                           $("#structure").modal("hide");
                         })
                         .fail(function() {
                           alert("ça marche pas...");
                         });
                       });
                     });
                     </script>
                     <div id="boutonStructurePlus">
                       <a href="#structure" class="btn btn-xs btn-success"  data-toggle="modal" data-target="#structure">
                         <span class="glyphicon glyphicon-plus"></span>
                       </a>
                     </div>
                </div>
             <div class="form-group row">
                    <label for="textarea" class="col-md-2 control-label">Notes:</label>
                    <div class="col-md-10"><textarea id="textarea" class="form-control" rows="2" name="c_notes"><?= $data['contact']['notes'] ?>
                    </textarea></div>
            </div>
            <div class="form-group row">
                        <label  class="col-md-5 control-label">Date de mise à jour minimum: *</label>
                        <input type="radio" name ="c_dureeMAJ" value="1">1 mois
                        <input type="radio" name ="c_dureeMAJ" value="3" checked>3 mois
                        <input type="radio" name ="c_dureeMAJ" value="6">6 mois
                        <input type="radio" name ="c_dureeMAJ" value="12">12 mois
            </div>
            <div class="row">
                <?php if (isset($_GET['VueAvance']) && $_GET['VueAvance']==true ) { ?>
                  <a href="../Controler/contacts.ctrl.php?selected=<?=$nomPrenom?>&id=<?= $data['contact']['id']?>" class="btn btn-xs btn-info pull-left">
                    <span class="glyphicon glyphicon-chevron-up"></span>Vue avancée
                  </a>
                  <div class="row"><div class="col-md-12"><table class="table table-bordered table-striped table-condensed">
                    <caption>
                      <h4>Evénements en lien avec ce contact :</h4>
                    </caption>
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php //afficher toutes les dates en rapport avec ce contact
                         if(isset($data['EventContact'])){
                           foreach ($data['EventContact'] as $s) {
                             echo "<tr>";
                             echo "<td>".$s['nom']."</td>";
                             echo "<td>".$s['date']."</td>";
                             echo "</tr>";
                             }
                          }
                        ?>
                    </tbody>
                  </table></div></div>
                <?php } else { ?>
                  <a href="../Controler/contacts.ctrl.php?VueAvance=true&selected=<?=$nomPrenom?>" class="btn btn-xs btn-info pull-left">
                    <span class="glyphicon glyphicon-chevron-down"></span>Vue avancée
                  </a>
                <?php } ?>
            </div>
            <div class="row">
              <div class="alert alert-sucess  pull-left">
                <i>Date de dernière mise à jour: <?= $data['contact']['derniere_maj'] ?></i>
              </div>
            </div>
            <div class="form-group row">
                <a href="../Controler/contacts.ctrl.php?delete=confirm&id=<?= $data['contact']['id'] ?>"
                   data-confirm="Voulez-vous vraiment supprimer le contact <?=$nomPrenom?>" class="btn btn-danger pull-left"><span class="glyphicon glyphicon-trash"></span></a>
                <button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-ok"></span></button>
            </div>
      </form>
	<?php include '../Views/structure.nouvelle.php'; ?>
    </div><!--panel body-->
  </div></div><!--panel-->
      <?php
    } else {
     include '../Views/view.interne.contactNouveau.php';
    } ?>
