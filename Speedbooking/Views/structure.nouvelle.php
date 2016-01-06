
<!-- Modal -->
<div id="structure" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Votre contact travaille dans une nouvelle structure</h4>
            </div>
            <div class="modal-body">
            <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nouvelle structure</h3>
                    </div>
                    <div class="panel-body">
                        <form action="../Controler/structures.ctrl.php" method="post" class= " well form ">
                            <div class="row">
                                    <p class="col-md-9" style="font-size:10px;"><i>Les champs indiqués par une * sont obligatoires.</i></p>
                            </div>
                            <div class="form-group row">
                                    <label for="nom" class="col-md-2 control-label">Nom: *</label>
                                    <div class="col-md-10"><input required type="text" id="nom" class="form-control" placeholder="Ex : Hellfest" name="s_nom"></div>
                            </div>
                            <div class="form-group row">
                                    <label for="adresse"  class="col-md-2 control-label">Adresse: *</label>
                                    <div class="col-md-10"><input  id="adresse" class="form-control" placeholder="3 rue paul Mistral 38000 Grenoble" name="s_adresse"></div>
                            </div>
                            <div class="form-group row">
                                    <label for="tel" class="col-md-2 control-label">Tel: </label>
                                    <div class="col-md-4"><input type="tel" id="tel" class="form-control" placeholder="Ex : 0600000000" name="s_tel"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success pull-right boutonPlus" data-dismiss="modal" name="addStruct">Créer</button>                              
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
