<div style="min-height: 1096px;" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Votre Profil
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">
        <?php
            echo '
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="dist/img/'.$profil->image_profil.'" alt="User profile picture">
                        <a href="Home"><h3 class="profile-username text-center">'.$profil->nom_profil.'</h3></a>
                        <p class="text-muted text-center">'.$profil->profession_profil.'</p>

                        <ul class="list-group list-group-unbordered">

                            <li class="list-group-item">
                                <b>Amis</b> <a class="pull-right">'.$profilmanagement->count_friend($profil).'</a>
                            </li>
                            <li class="list-group-item">
                                <b>Profession </b> <a class="pull-right">'.$profil->profession_profil.'</a>
                            </li>
                        </ul>

                        <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            ';
        ?>
                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Description</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i>  Education</strong>
                        <p class="text-muted">
                            <?php  echo $profil->description_profil; ?>
                        </p>

                        <hr><strong><i class="fa fa-flag margin-r-5"></i>  Email</strong>
                        <p class="text-muted">
                            <?php  echo $profil->email_profil; ?>
                        </p>

                        <hr>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li></li>

                        <li class="active"><a href="#activity" data-toggle="tab">Activités</a></li>


                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <div class="modal-content">


                            </div>

                            <br>
            <?php

            if(count($friends)>0) {
                foreach ($friends as $key => $value) {

                    $pubm = new PublicationManagement();
                    $pubs = $pubm->get_publications($value->id_profil, 1);

                    if (count($pubs) > 0) {

                        $friend_ = new ProfilManagement();
                        $friend_profil = $friend_->get_profil($value->id_profil);
                        $this->load->model('management/commentairemanagement');
                        foreach ($pubs as $keypub => $valuepub) {

                            $comments = new CommentaireManagement();
                            $c_user = new CommentaireManagement();
                            $comments = $comments->get_comments($valuepub);

                            echo '

                             <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="dist/img/' . $friend_profil->image_profil . '" alt="user image">
                        <span class="username">
                          <a href="Home">' . $friend_profil->nom_profil . '.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                    <span class="description">Public  - ' . $valuepub->date_ajout_publication . '</span>
                                </div><!-- /.user-block -->
                                <p>
                                    ' . $valuepub->contenu_publication . '
                                </p>
                                    <ul class="list-inline">
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> </a></li>
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> </a></li>
                                    <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> </a></li>                                </ul>

                                ';
                            if (count($comments) > 0) {
                                foreach ($comments as $keycomment => $valuecomment) {

                                    $user = $c_user->get_user($valuecomment['commentaire']);
                                    //var_dump($user);
                                    //$f_p = new ProfilManagement();
                                    //$f_profil = $f_p->get_profil($user);
                                    echo '
                                        <div class="box-footer box-comments" >
                                    <div class="box-comment" >
                                        <!--User image-->
                                        <img class="img-circle img-sm" src = "dist/img/' . $valuecomment['profil']->image_profil . '" alt = "user image" >
                                        <div class="comment-text" >
                                                  <span class="username" >
                                ' . $valuecomment['profil']->nom_profil . '
                                <span class="text-muted pull-right"> ' . $valuecomment['commentaire']->date_commentaire . ' </span >
                                                  </span ><!-- /.username-->
                                            ' . $valuecomment['commentaire']->contenu_commentaire . '
                                         </div ><!-- /.comment - text-->
                                      </div ><!-- /.box - comment-->
                                    </div ><!-- /.box - footer-->


                                     ';
                                }
                            }


                        }

                    }


                }
            }


            ?>
                        </div><!-- /.post -->

                        </div><!-- /.tab-pane -->


                    </div><!-- /.tab-content -->
                </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
        </div><!-- /.row -->

    </section><!-- /.content -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $('form.jsform').on('submit',function(form){
            form.preventDefault();
            $.post('Timeline/sub',$('form.jsform').serialize(),function(data){
                $('div.publication_set').html(data);
                document.getElementById("pub").value = "";



            });
        });
    });

</script>

