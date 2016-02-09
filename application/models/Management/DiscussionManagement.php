<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 12:27
 * author : GROLA ELmahdi
 */

class DiscussionManagement
{
    public function get_discussion($profil)
    {

        // discussion made by id_profil  or friends of id_profil

        $query = $this->db->select('*')
            ->where('id_profil_1',$profil->id_profil)
            ->or_where('id_profil_2',$profil->id_profil)
            ->from('discussion')
            ->get();

        $result = $query->result();

        if(count($result)>0)
        {
            $this->load->model('entities/discussion');
            $disc = new Discussion();
            foreach($result as $key => $value)
            {
                $disc->id_discussion = $value->id_discussion;
                $disc->id_profil_2 = $value->id_profil_2;
                $disc->date_creation_discussion = $value->date_creaion_discussion;
                $discussions[$key]=$disc;
            }
            return $discussions;

        }
    }








}