<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 02/02/2016
 * Time: 19:18
 * author : GROLA ELmahdi
 */

class CommentaireManagement extends CI_Model
{
    public function get_comments($publication)
    {
        $this->load->database();
        $query = $this->db->select('*')
                        ->where('id_publication',$publication->id_publication)
                        ->from('commentaire')
                        ->join('profil','commentaire.id_profil = profil.id_profil','left')
                        ->order_by('date_commentaire')
                        ->get();
        $result=$query->result();
        if(count($result) > 0)
        {
            $this->load->model('entities/commentaire');
            $commentaire = new Commentaire();
            $profil = new profil();
            $i=0;
            foreach($result as $key => $value)
            {
                $commentaire = new Commentaire();
                $profil = new profil();

                //$commentaire->id_commentaire = $value->id_commentaire;
                $commentaire->contenu_commentaire = $value->contenu_commentaire;
                $commentaire->date_commentaire = $value->date_commentaire;
                $commentaire->id_publication = $value->id_publication;
                $commentaire->id_profil = $value->id_profil;

                $profil->id_profil = $value->id_profil;
                $profil->image_profil = $value->image_profil;
                $profil->nom_profil = $value->nom_profil;
                //var_dump($profil);
                $data = array('commentaire'=>$commentaire,'profil'=>$profil);
                $commentaires[$key]=$data;
            }
            return $commentaires;

        }
    }

    public function get_last_comment($id_profil)
    {
        $this->load->database();
        $query =   $this->db->select_max('*')
            ->from('commentaire')
            ->where('id_profil',$id_profil)
            ->where('SELECT MAX (date_commentaire) FROM commentaire ')
            ->get();
        $value = $query->result();

        if(count($value) >0)
        {
            $this->load->model('entities/commentaire');
                $commentaire = new Commentaire();
                $commentaire->contenu_commentaire = $value->contenu_commentaire;
                $commentaire->date_commentaire = $value->date_commentaire;
                $commentaire->id_publication = $value->id_publication;
                $commentaire->id_profil = $value->id_profil;

            return $commentaire;
        }
        return NULL;
    }

    public function add_comment($comment)
    {
        $this->load->database();
        $this->db->insert('commentaire',$comment);
    }

    public function delete_comment($comment)
    {
        $this->load->database();
        $this->db->where('id_commentaire',$comment->id_commentaire);
        $this->db->delete('commentaire',$comment);
    }
    public function count_comment($publication)
    {
        $this->load->database();
        $query = $this->db->select('*')
                        ->where('id_publication',$publication->id_publication)
                        ->from('commentaire')
                        ->get();

        $result = $query->result();

        return count($result);
    }
    public function get_user($commentaire)
    {
        $this->load->database();
        $query = $this->db->select('id_profil')
                ->where('id_profil',$commentaire->id_profil)
                ->from('commentaire')
                ->get();
        $result = $query->result();
        if(count($result)>0)
        {
            return $result[0];
        }
        return NULL;
    }


}