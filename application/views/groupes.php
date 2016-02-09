<div class="col-md-6">
    <!-- USERS LIST -->
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Groupes</h3>
            <div class="box-tools pull-right">
                <span class="label label-danger"><?php echo $profilmanagement->count_groupe($profil).' Groupes';?></span>
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
            <ul class="users-list clearfix">

                <?php

                if(count($groupem)>0)
                {
                        foreach($groupem as $key => $value)
                        {
                            echo '
                            <li>
                                <img src="dist/img/groupe.png" alt="User Image">
                                <a class="users-list-name" href="#">'.$value->nom_groupe.'</a>
                                <span class="users-list-date">'.$value->date_creation_groupe.'</span>
                            </li>
                            ';
                        }

                }

                ?>



            </ul><!-- /.users-list -->
            <?php
            if(count($groupem)>0)
            {

            echo '
                </div><!-- /.box-body -->
                  <div class="box-footer text-center">
                        <a href="Groupe" class="uppercase">Voir tous les groupes</a>
                  </div><!-- /.box-footer -->
                 </div><!--/.box -->
                ';
            }
            ?>
</div>

</div>