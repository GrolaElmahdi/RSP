<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 12:29
 * author : GROLA ELmahdi
 */

class PublicationManagement extends CI_Model
{
    public function get_timeline_publication($id)
    {
        $query = $this->db->where('id_publication',$id)
                            ->from('publication')
                            ->get();

        $result = $query->result();

        if(count($result)>0)
        {
            $value=$result[0];
            $this->load->model('entities/publication');
            $pub = new Publication();
            $pub->id_publication = $value->id_publication;
            $pub->date_ajout_publication =$value->date_ajout_publication;
            $pub->contenu_publication = $value->contenu_publication;
            $pub->id_groupe = $value->id_groupe;
            $pub->id_profil = $value->id_profil;

            return $result;
        }
    }
    public function get_all_publications($id_profil)
    {
        $this->db->where('id_profil',$id_profil)
                 //->where('id_groupe',1);
                ->from('publication');
        $result = $this->db->get();
        $result = $result->result();

        if(count($result)>0)
        {
            $this->load->model('entities/publication');
            $pub = new Publication();
            foreach ( $result as $key => $value)
            {
                $pub->id_publication = $value->id_publication;
                $pub->date_ajout_publication =$value->date_ajout_publication;
                $pub->contenu_publication = $value->contenu_publication;
                $pub->id_groupe = $value->id_groupe;
                $pub->id_profil = $value->id_profil;
                $pubs[$key]= $pub;
            }
            return $pubs;
        }
    }

    public function get_publications($id_friend,$number_of_publication)
    {
        $this->load->database();
        $query = $this->db->select('*')
                        ->where('id_profil',$id_friend)
                        ->from('publication')
                        ->limit($number_of_publication)
                        ->get();

        $result = $query->result();

        if(count($result)>0)
        {
            $this->load->model('entities/publication');
            $pub = new Publication();
            foreach($result as $key => $value)
            {
                $pub->id_publication = $value->id_publication;
                $pub->date_ajout_publication =$value->date_ajout_publication;
                $pub->contenu_publication = $value->contenu_publication;
                $pub->id_groupe = $value->id_groupe;
                $pub->id_profil = $value->id_profil;
                $publications[$key] = $pub;
            }
            return $publications;

        }
        return NULL;
    }

    public function get_publications_by_date($date)
    {

    }

    public function add_publication($pub)
    {
        $this->db->insert('publication',$pub);
    }
    public function delete_publication($id)
    {
        $this->where('id',$id);
        $this->db->delete('publication');
    }
}