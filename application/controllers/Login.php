<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 03/02/2016
 * Time: 22:26
 * author : GROLA ELmahdi
 */

class Login extends CI_Controller
{
    public function index()
    {

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');

        $this->load->model('entities/profil');
        $this->load->model('management/profilmanagement');

        $profil = new Profil();
        $profilManagement = new ProfilManagement();

        $this->load->view('head');
        $this->load->view('login');


        //$this->session->unset_userdata();

        if($this->input->post() == true)
        {

            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            //var_dump($data['email']);
            //var_dump($data['password']);

            $id_profil = $profilManagement->is_auth($data);
            //var_dump($id_profil);

            if ($id_profil != NULL) {
                $profilManagement->connected($id_profil);

                $profil = $profilManagement->get_profil($id_profil);
                $auth = array(
                    'email_profil' => $profil->email_profil,
                    'password_profil' => $profil->password_profil,
                    'id_profil' => $id_profil,
                    'logged_in' => TRUE
                );
                $this->load->library('session');
                $this->session->set_userdata($auth);

                redirect('Home','location');


            }

           else
           {
               redirect('Login','location');
           }

        }
    }

    public function Logout()
    {

        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('head');
        $this->session->unset_userdata('id_profil','email_profil','password_profil','logged_in');

        $this->load->view('login');
    }
}