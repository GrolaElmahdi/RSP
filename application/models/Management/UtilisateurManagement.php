<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 12:29
 * author : GROLA ELmahdi
 */

class UtilisateurManagement extends CI_Model
{
    public function add_user($user)
    {
        $this->load->database();
        $this->db->set($user);
         $this->db->insert('utilisateur',$user);

    }


}