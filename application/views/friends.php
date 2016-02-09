<div class="row">
<div class="col-md-6">
    <!-- USERS LIST -->
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Amis</h3>
            <div class="box-tools pull-right">
                <span class="label label-danger"><?php echo $profilmanagement->count_friend($profil);?> Amis</span>
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
            <ul class="users-list clearfix">

            <?php

            if(count($amitiem)>0)
            {
                foreach( $amitiem as $key => $value)
                {
                    $img = 'dist/img/'.$value->image_profil;
                    echo '

                        <li>
                        <img src='.$img.' alt="User Image">
                        <a class="users-list-name" href="#">'.$value->nom_profil.'</a>
                        <span class="users-list-date">'.$value->profession_profil.'</span>
                        </li>

                        ';
                }
            }


            ?>


            </ul><!-- /.users-list -->


        </div><!-- /.box-body -->
        <div class="box-footer text-center">
            <a href="Friends" class="uppercase">Voir tous les amis</a>
        </div><!-- /.box-footer -->
    </div><!--/.box -->
</div>