<?php include('../Views/view.interne.header.php'); ?>

        <li class="active"><a href="#"><span class="glyphicon glyphicon-calendar"></span> Mes dates</a></li>
        <li><a href="../Views/view.interne.contacts.php"><span class="glyphicon glyphicon-phone-alt"></span> Mes contacts</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Mes groupes</a></li>
        <li><a href="#" ><span class="glyphicon glyphicon-file"></span> Mes fichiers</a></li>
        <li><a href="#" ><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
        <li><a href="#" ><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
      </ul>
    </div>
  </div>
</header>

<div class="col-md-1"
<div class="row">
    <a class="btn btn-default" href="view.interne.date.php" role="button">Retour</a>
</div>
<div class="col-md-8">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">
            <?php
            //affiche la date en titre
              echo 'date1';
            ?></h3>
        </div>
        <div class="panel-body">
            <!-- Afficher les infos sur la date -->
            <?php
                
            ?>
        </div>
        
    </div>
</div>
</section>
<?php include('../Views/view.interne.footer.php'); ?>