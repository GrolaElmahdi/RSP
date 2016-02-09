<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 06/02/2016
 * Time: 20:40
 * author : GROLA ELmahdi
 */
class Email extends CI_Controller
{
    public function index()
    {
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


            $this->load->view('email');


            $this->load->view('footer');
        }
        else
        {
            redirect('Login','location');
        }
    }
}