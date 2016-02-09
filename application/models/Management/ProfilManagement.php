<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 12:29
 * author : GROLA ELmahdi
 */

class ProfilManagement extends CI_Model
{

    public  function is_auth($data)
    {
        if(isset($data['email']) && isset($data['password']) )
        {

            //$ci = & get_instance();
            $this->load->model('entities/profil');
            $this->load->library('session');
            $this->load->database();

            $query = $this->db->select('id_profil')
                ->from('profil')
                ->where('email_profil',$data['email'])
                ->where('password_profil',$data['password'])
                ->get();

            $result =$query->result();

            //var_dump($result);


            if(count($result) >0)
            {
                $result = $result[0]->{'id_profil'};
                return $result;

            }
            return NULL;
        }
        return NULL;

    }

    public  function connected($id)
    {
        if($id != NULL)
        {
            $this->load->model('entities/profil');
            $profil = new Profil();

            $profil = self::get_profil($id);
            $auth = array(
                'email_profil' => $profil->email_profil,
                'password_profil' => $profil->password_profil,
                'id_profil' => $id,
                'logged_in' => TRUE
            );
            $this->load->library('session');
            $this->session->set_userdata($auth);
            return true;
        }
        return False;
    }

    public static function disconnected($id)
    {
        if($id != NULL)
        {
            $ci = & get_instance();
            $ci->load->model('entities/profil');

            $auth = array(
                'email_profil',
                'password_profil',
                'id_profil',
                'logged_in'
            );
            $ci->load->library('session');
            $ci->session->unset_userdata($auth);
            return false;
        }
    }

    public static function still_connected()
    {
        if(isset($_SESSION['email_profil']) && isset($_SESSION['password_profil']) && isset($_SESSION['id_profil']))
            return TRUE;
        return False;
    }

    public function get_profil($id)
    {
        //$CI_instance =& get_instance();
        $this->load->database();
        $result =$this->db->select('*')
                ->where('id_profil',$id)
                ->from('profil')
                ->get();
        $result=$result->result();

        if(count($result)>0)
        {
            $result = $result[0];
            $this->load->model('entities/profil');
            $profil = new Profil();

            $profil->id_profil=$id;
            $profil->url_profil=$result->url_profil;
            $profil->date_creation_profil=$result->date_creation_profil;
            $profil->nom_profil= $result->nom_profil;
            $profil->email_profil = $result->email_profil;
            $profil->description_profil=$result->description_profil;
            $profil->image_profil=$result->image_profil;
            $profil->profession_profil= $result->profession_profil;
            $profil->sexe_profil=$result->sexe_profil;

            return $profil;
        }
        return NULL;


    }


    public  function add_profil($profil)
    {

        $this->db->insert('profil',$profil);
    }
    public  function modify_profil($profil)
    {
        $CI_instance =& get_instance();

        $CI_instance->db->where('id',$profil->id);
        $CI_instance->db->update('profil',$profil);
    }

    public  function delete_profil($profil)
    {
        $this->load->database();
        $CI_instance =& get_instance();

        $CI_instance->db->where('id',$profil->id);
        $CI_instance->db->delete('profil');
    }

    public function get_emails_sent($profil)
    {
        //$this->load->database();
        $query = $this->db->select('*')
                            ->where('id_profil',$profil->id_profil)
                            ->from('email')
                            ->get();
        $result = $query->result();
        if(count($result)>0)
        {
            $this->load->model('entites/email');
            $email = new Email();
            foreach($result as $key => $value)
            {
                $email->id_email = $value->id_email;
                $email->date_email=$value->date_email;
                $email->contenu_email= $value->contenu_email;
                $email->sujet_email=$value->sujet_email;
                $email->id_discussion_email = $value->id_discussion_email;
                $email->id_profil = $profil->id_profil;
                $emails_sent[$key]=$email;
            }
            return $emails_sent;
        }

    }
    public function get_emails_recieved($profil)
    {
        $this->load->database();
        //$where = 'id_profil.id_profil != '.$profil->id_profil;
        $query = $this->db->select('email.id_email,email.date_email,email.contenu_email,email.sujet_email')
            ->where('email.id_profil !='.$profil->id_profil)
            ->from('email')
            ->join('disc_mail','disc_mail.id_disc = email.id_discussion_email')
            ->where('id_profil_1 = '.$profil->id_profil.' OR id_profil_2 = '.$profil->id_profil)
            ->get();
        $result = $query->result();
        if(count($result)>0)
        {
            $this->load->model('entites/email');
            $email = new Email();
            foreach($result as $key => $value)
            {
                $email->id_email = $value->id_email;
                $email->date_email=$value->date_email;
                $email->contenu_email= $value->contenu_email;
                $email->sujet_email=$value->sujet_email;
                $email->id_profil = $profil->id_profil;
                $emails_recieved[$key]=$email;
            }
            return $emails_recieved;
        }

    }

    public function count_emails_sent($profil)
    {
        $query = $this->db->where('id_profil',$profil->id_profil)
                    ->from('message')
                    ->get();
        return count($query);

    }
    // COUNT NUMBER OF EMAILS
    public function count_emails_recieved($profil)
    {
        $this->load->database();
        //$where = 'id_profil.id_profil != '.$profil->id_profil;
        $query = $this->db->select('email.id_email,email.date_email,email.contenu_email,email.sujet_email')
            ->where('email.id_profil !='.$profil->id_profil)
            ->from('email')
            ->join('disc_mail','disc_mail.id_disc = email.id_discussion_email')
            ->where('id_profil_1 = '.$profil->id_profil.' OR id_profil_2 = '.$profil->id_profil)
            ->get();

        return count($query);

    }
    public function total_message($profil)
    {
        return $this->count_emails_recieved($profil)+$this->count_emails_sent($profil);
    }
    // get discussion
    public function count_discussion($profil)
    {
        $this->load->database();
        $query = $this->db->select('*')
                        ->where('id_profil_1 = '.$profil->id_profil)
                        ->or_where('id_profil_2 ='.$profil->id_profil)
                        ->from('discussion')
                        ->get();
        //$result = $query->result();

        return count($query);
    }

    public function count_friend($profil)
    {
        $this->load->database();
        $query = $this->db->select('*')
            ->where('id_profil_1',$profil->id_profil)
            ->or_where('id_profil_2',$profil->id_profil)
            ->from('amitie')
            ->get();
        return count($query);
    }

    public function count_groupe($profil)
    {
        $this->load->database();
        $query = $this->db->select('*')
            ->where('id_profil',$profil->id_profil)
            ->from('rejoindre')
            ->get();
        return count($query);
    }

    public  function count_profil()
    {

        $this->load->database();
        $query = $this->db->select('*')
                        ->from('profil')
                        ->get();

        return count($query->result());
    }

}