<?php include('../Views/view.interne.header.php'); ?>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
        <li class="active"><a href="../Controler/date.ctrl.php"><span class="glyphicon glyphicon-calendar"></span> Mes dates</a></li>
        <li><a href="../Controler/contacts.ctrl.php?accueil=true"><span class="glyphicon glyphicon-phone-alt"></span> Mes contacts</a></li>
        <li><a href="../Controler/fichiers.ctrl.php" ><span class="glyphicon glyphicon-file"></span> Mes fichiers</a></li>
        <li><a href="../Controler/compte.ctrl.php" ><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
        <li><a href="../Controler/portail.ctrl.php" ><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
      </ul>
    </div><!--container nav-->
  </div><!-- nav-->
  <script type="text/javascript">
      jQuery(function($){
          $('.month').hide();
          $('.month:first').show();
          $('.months a:first').addClass('active');
          var current =1;
          $('.months a').click(function(){
              var month = $(this).attr('id').replace('linkMonth','');
              if(month !== current){
                  $('#month'+current).slideUp();
                  $('#month'+month).slideDown();
                  $('.months a').removeClass('active');
                  $('.months a#linkMonth'+month).addClass('active');
                  current=month;
              }
              return false;
          });
      });
  </script>
</header>
    <div class="periode">
        <div class="year"><?php echo "$year"; ?>
            <nav class="navbar">
            <div class="months form-group container">
                <ul class="nav navbar-nav nav-tabs nav-justified list-group list-unstyled">
                    <?php foreach($months as $id=>$m){ ?>
                    <li><a href="#" id="linkMonth<?php echo $id+1 ?>"><?php echo utf8_encode(utf8_decode($m));?></a></li>       
                    <?php } ?>
                </ul>
            </div>
            </nav>
            <div class="clear"></div>
            <?php $dates= current($dates);?>
            <?php foreach($dates as $m=>$day){ ?>
                <div class="month" id="month<?php echo $m;?>">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <?php foreach ($days as $d) { ?>
                                    <th>
                                     <?php echo $d; ?>
                                    </th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                            $end = end($day);
                            foreach ($day as $d=>$w) { ?>
                                <?php if($d==1){?>
                                    <td colspan="<?php echo $w-1; ?>"></td>
                                <?php } ?>
                                <td>
                                    <div class="relative">
                                        <div class="day">
                                            <?php
                                           /* if(!isset($data['AllDate'])){
                                                echo"<a href=\"../Controler/date.ctrl.php?nouvelEvent=true\">";
                                            }
                                            else {
                                                 echo"<a href=\"../Controler/date.ctrl.php?selectEvent=true\">";
                                            }*/?>
                                            <a href="#"><?php echo $d; ?>
                                        </div>
                                    </div>
                                </td>
                                <?php if($w == 7){?>
                                    </tr><tr>
                                <?php } ?>
                            <?php } ?>
                            <?php if($end !=7) {?>
                                <td colspan="<?php echo 7-$end; ?>"></td>       
                            <?php } ?>           
                            </tr>
                        </tbody>
                    </table>       
                </div>
            <?php } ?>
    </div>
    </div>
</section>
<?php include('../Views/view.interne.footer.php'); ?>