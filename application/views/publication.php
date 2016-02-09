

<?php
    // Profil image
    $image = 'dist/img/'.$profil->image_profil;
    if(count($pubs)>0)
    {
        foreach ($pubs as $key => $values)
        {

            echo '
    <div class="box box-danger">
    <div class="box box-widget">
        <div class="box-header with-border">
            <div class="user-block">
                <img class="img-circle" src='.$image.' alt="user image">
                <span class="username"><a href="#">'.$profil->nom_profil.'</a></span>
                <span class="description">public - '.$values->date_ajout_publication.'</span>
            </div><!-- /.user-block -->
            <div class="box-tools">
                <button class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read"><i class="fa fa-circle-o"></i></button>
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <!-- post text -->
            <p>
                    '.$values->contenu_publication.'
            </p>



            <!-- Social sharing buttons -->

            <button class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
            <span class="pull-right text-muted"> - '.$commentaire_et_profil->count_comment($values).' comments</span>
        </div><!-- /.box-body -->
        ';

            $c_and_p = $commentaire_et_profil->get_comments($values);


            if(count($c_and_p)>0)
            {
                foreach($c_and_p as $key => $value)
                {


                    echo '

        <div class="box-footer box-comments" >
            <div class="box-comment" >
                <!--User image-->
                <img class="img-circle img-sm" src = "dist/img/'.$value['profil']->image_profil.'" alt = "user image" >
                <div class="comment-text" >
                          <span class="username" >
        '.$value['profil']->nom_profil.'
        <span class="text-muted pull-right"> '.$value['commentaire']->date_commentaire.' </span >
                          </span ><!-- /.username-->
                    '.$value['commentaire']->contenu_commentaire.'
                </div ><!-- /.comment - text-->
            </div ><!-- /.box - comment-->
        </div ><!-- /.box - footer-->


                ';


}
            }

            //  ,\''.date(\'Y-m-d H:m:s\')

            echo'
                <div class="box-footer" >

                            <img class="img-responsive img-circle img-sm" src = "dist/img/'.$profil->image_profil.'" alt = "alt text" >
                            <!-- .img - push is used to add margin to elements next to floating images-->
                            <div class="img-push" >
                            '.form_open('Timeline/sub',array('class'=>'jsform')).'

                            <div class="comment"></div>
                            <br>
                            <input class="form-control input-sm" placeholder = "Press enter to post comment" type = "text" id="click-me" name="comment" >
                            <br>
                            <input type="submit" value="comment">
                            '.form_close().'
                             </div >

                </div ><!-- /.box - footer-->
                </div >
            </div >
        ';


        }


    }


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $('form.jsform').on('submit',function(form){
            form.preventDefault();


            $.post('Timeline/sub',$('form.jsform').serialize(),function(data){
               $('div.comment').html(data);
                document.getElementById("click-me").value = "";



            });
        });
    });

</script>

