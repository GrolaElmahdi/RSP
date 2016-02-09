<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 12:30
 * author : GROLA ELmahdi
 */

class GroupeManagement extends CI_Model
{
    public function get_groupes($id_profil)
    {
        $this->load->database();
        $query = $this->db->select('*')
                        ->from('groupe')
                        ->where('id_profil',$id_profil)
                        ->get();

        $result = $query->result();

        if(count($result) > 0)
        {
            $this->load->model('entities/groupe');
            $groupe = new Groupe();
            foreach($result as $key => $value)
            {
                $groupe->id_groupe = $value->id_groupe;
                $groupe->nom_groupe = $value->nom_groupe;
                $groupe->date_creation_groupe = $value->date_creation_groupe;
                $groupe->description_groupe = $value->description_groupe;
                $groupe->id_profil = $value->id_profil;
                $groupes[$key]=$groupe;
            }
            return $groupes;
        }
    }

    public function get_membres($groupe)
    {

    }
}