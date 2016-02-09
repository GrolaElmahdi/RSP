<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 12:27
 * author : GROLA ELmahdi
 */

class AmitieManagement extends  CI_Model
{
    public function add_amitie($id_profil_1,$id_profil_2)
    {
        if($id_profil_1 != $id_profil_2 && $id_profil_2 !=NULL && $id_profil_1 !=NULL)
        {
            $where1 = array('id_profil_1 ' =>$id_profil_1, 'id_profil_2' => $id_profil_2);
            $where2 = array('id_profil_2' => $id_profil_1, 'id_profil_1' => $id_profil_2);

            $query = $this->db->select('*')
                ->where($where1)
                ->where($where2)
                ->from('amitie')
                ->get();
            $result = $query->result();
            if(count($result) == 0)
            {
                $this->load->model('entities/amitie');
                $amitie = new Amitie();
                $amitie->date_amitie = date('Y-m-d');
                $amitie->id_profil_1=$id_profil_1;
                $amitie->id_profil_2=$id_profil_2;

                $this->db->insert('amitie',$amitie);

                $this->load->model('entities/discussion');
                $disc = new Discussion();
                $disc->date_creation_discussion= $amitie->date_amitie;
                $disc->id_profil_2 = $amitie->id_profil_2;
                $disc->id_profil_1 = $amitie->id_profil_1;

                $this->db->insert('discussion',$disc);

            }
        }

    }


    public function get_friends($id_profil_auth)
    {


        $this->load->model('entities/profil');

        $query = $this->db->select('*')
            ->from('amitie')
            ->join('profil','amitie.id_profil_2 = profil.id_profil OR amitie.id_profil_1 = profil.id_profil')
            //s->where('profil.id_profil !=',$id_profil_auth)
            ->where('amitie.id_profil_1 = '.$id_profil_auth.' OR amitie.id_profil_2 = '.$id_profil_auth)
            ->where('id_profil !='.$id_profil_auth)
            ->get();

        $result = $query->result();

        if(count($result)>0)
        {
            foreach($result as $key => $value)
            {
                $profil = new Profil();
                $profil->id_profil = $value->id_profil;
                $profil->image_profil = $value->image_profil;
                $profil->nom_profil = $value->nom_profil;


                $profils[$key] = $profil;
            }

            return $profils;
        }
    }

    public function find_friend_level_two($id_profil_auth)
    {
        $ci =& get_instance();
        $ci->load->model('entities/profil');

        $query = $ci->db->select('*')
            ->from('amitie as a1')
            ->join('profil','a1.id_profil_2 = profil.id_profil OR a1.id_profil_1 = profil.id_profil','right')
            ->where('profil.id_profil !=',$id_profil_auth)
            ->where('a1.id_profil_1',$id_profil_auth)
            ->or_where('a1.id_profil_2',$id_profil_auth)
            ->join('amitie as a2','a2.id_profil_1 = profil.id_profil OR a2.id_profil_2 = profil.id_profil','right')
            //->where('profil.id_profil',)
            ->where('a2.id_profil_1 !=',$id_profil_auth)
            ->or_where('a2.id_profil_2 !=',$id_profil_auth)
            ->join('profil as p2','a2.id_profil_1 = p2.id_profil OR a2.id_profil_2 = p2.id_profil','right')
            ->where('profil.id_profil != p2.id_profil');

            $result = $query->get();
            $result = $result->result();

        if(count($result)>0)
        {
            $profil = new Profil();

            foreach($result as $key => $value)
            {
                $profil->id_profil = $value->id_profil;
                $profil->date_creation_profil = $value->date_creation_profil;
                $profil->description_profil = $value->description_profil;
                $profil->id_utilisateur = $value->id_utilisateur;
                $profil->image_profil = $value->image_profil;
                $profil->nom_profil = $value->nom_profil;
                $profil->profession_profil = $value->profession_profil;
                $profil->sexe_profil = $value->sexe_profil;

                $profils[$key] = $profil;
            }
            return $profils;
        }



    }

}