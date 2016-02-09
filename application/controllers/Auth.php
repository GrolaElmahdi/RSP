<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 03/02/2016
 * Time: 13:26
 * author : GROLA ELmahdi
 */

class Auth extends CI_Controller
{


    public function index()
    {
        $this->load->model('entities/utilisateur');
        $this->load->model('management/utilisateurmanagement');
        $user = new Utilisateur();
        $userManagement = new UtilisateurManagement();

        $this->load->helper('form');
        $this->load->helper('url');

        $this->load->view('head');
        $this->load->view('register');
        if($this->input->post() == true)
        {
            $user->nom_util=$this->input->post('nom');
            $user->prenom_util=$this->input->post('prenom');
            $user->num_inscription=$this->input->post('num');
            $user->cne=$this->input->post('cne');
            $user->date_n_util=date('Y-m-d');
            $user->sexe_util=$this->input->post('sexe');
            $user->profession_util=$this->input->post('profession');
            $user->email_util=$this->input->post('email');
            $user->tel_util = $this->input->post('telephone');
            $user->adresse_util=$this->input->post('adresse');
            $user->id_admin=1;
            $user->id_profil='';

                //var_dump($user);
                $userManagement->add_user($user);

                $this->load->helper('url');
                redirect("Profil","location");

        }
    }





}