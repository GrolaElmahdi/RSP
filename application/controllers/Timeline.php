<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 05/02/2016
 * Time: 19:13
 * author : GROLA ELmahdi
 */

class Timeline extends  CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('management/profilmanagement');
        $this->load->model('management/amitiemanagement');

        $this->load->model('entities/profil');
        $this->load->library('session');


        $profilManagement = new ProfilManagement();
        $amitieManagement = new AmitieManagement();
        
        $profil = new Profil();
        $profil = $profilManagement->get_profil($this->session->userdata('id_profil'));
        if($profil !=NULL)
        {
            $this->load->model('management/publicationmanagement');

            $pubs = new PublicationManagement();
            $friends = $amitieManagement->get_friends($profil->id_profil);

            $this->load->view('head');
            $this->load->view('header',Array('profil'=>$profil,'profilmanagement'=>$profilManagement));
            $this->load->view('sidebar',Array('profil'=>$profil,'profilmanagement'=>$profilManagement));


                $this->load->view('timeline',Array('profil'=>$profil,'friends' => $friends));


            $this->load->view('footer');
        }
        else
        {
            redirect('Login','location');
        }

    }
    public function sub()
    {

        $ca = $this->input->post('comment');
        //$pub =$this->input->post('box-body');
        //echo $ca;

        $this->load->helper('form');
        $this->load->model('entities/commentaire');
        $this->load->model('management/commentairemanagement');
        $this->load->model('management/profilmanagement');
        $this->load->library('session');

        $profilManagement = new ProfilManagement();
        $profil = $profilManagement->get_profil($this->session->userdata('id_profil'));

        $c = new Commentaire();
        $cm = new CommentaireManagement();
        $c = new Commentaire();
        $c->id_profil= $profil->id_profil;
        $c->date_commentaire = date('Y-m-d H:m:s');
        $c->id_publication=1;
        $c->contenu_commentaire=$ca;
        $cm->add_comment($c);




            $date_comment = date('Y-m-d H:m:s');
            echo '
                <div class="box-footer box-comments" >
                     <div class="box-comment" >
                        <!--User image-->
                        <img class="img-circle img-sm" src = "dist/img/' . $profil->image_profil . '" alt = "user image" >
                     <div class="comment-text" >
                          <span class="username" >
                            ' . $profil->nom_profil . '
                            <span class="text-muted pull-right"> ' . $date_comment . ' </span >
                          </span ><!-- /.username-->
                            ' . $c->contenu_commentaire . '
                        </div ><!-- /.comment - text-->
                    </div ><!-- /.box - comment-->
                </div ><!-- /.box - footer-->
            ';

    }
    public function sub_pub()
    {
        $ca = $this->input->post('publication');

        $this->load->helper('form');
        $this->load->model('entities/commentaire');
        $this->load->model('management/commentairemanagement');
        $this->load->model('management/profilmanagement');
        $this->load->library('session');

        $profilManagement = new ProfilManagement();
        $profil = $profilManagement->get_profil($this->session->userdata('id_profil'));

        $date_pub = date('Y-m-d ');

        echo '

            <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="ist/img/'.$profil->image_profil.'" alt="user image">
                        <span class="username">
                          <a href="#">'.$profil->nom_profil.'.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                        <span class="description">Public - '.$date_pub.'</span>
                      </div><!-- /.user-block -->
                      <p>
                        '.$ca.'
                      </p>
                      <ul class="list-inline">
                      </ul>

                      <input class="form-control input-sm" placeholder="Type a comment" type="text">
                    </div>

             ';
    }
}