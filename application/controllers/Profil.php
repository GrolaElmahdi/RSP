<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 03/02/2016
 * Time: 20:30
 * author : GROLA ELmahdi
 */

class Profil extends CI_Controller
{
        public function index()
        {
            $this->load->helper('url');
            $this->load->helper('form');

            $this->load->view('head');
            $this->load->view('profil_register');

            //$this->load->model('entities/profil');
            $this->load->model('management/profilmanagement');

            $profil = new Profil();
            $profilManagement = new ProfilManagement();

            if($this->input->post() == true && isset($_POST['nom']) )
            {
                $profil->nom_profil = $this->input->post('nom');
                $profil->url_profil = $profilManagement->count_profil()+1;
                $profil->email_profil = $this->input->post('email');
                $profil->profession_profil = $this->input->post('profession');
                $profil->image_profil = $this->input->post('image');
                $profil->sexe_profil = $this->input->post('sexe');
                $profil->description_profil = $this->input->post('description');
                $profil->id_utilisateur=1;

                $profilManagement->add_profil($profil);
                redirect('Login','location');
            }
        }
            public   function do_upload()
            {
                        $config['upload_path'] = './dist/img/';
                        $config['allowed_types'] = '|jpg|png';
                        $config['max_size']    = '100';
                        $config['max_width']  = '1024';
                        $config['max_height']  = '768';

                         // You can give video formats if you want to upload any video file.

                        $this->load->library('upload', $config);

                        if ( ! $this->upload->do_upload())
                        {
                            $error = array('error' => $this->upload->display_errors());

                        // uploading failed. $error will holds the errors.
                        }
                        else
                        {
                            $data = array('upload_data' => $this->upload->data());

                            // uploading successfull, now do your further actions
                        }
            }
            /*
            public function timeline($timeline = 0)
            {
                if($timeline == 0)
                    redirect('Login','location');
                else
                {

                }
            }
            */



}