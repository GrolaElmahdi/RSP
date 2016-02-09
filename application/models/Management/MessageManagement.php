<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 12:21
 * author : GROLA ELmahdi
 */

class MessageManagement extends CI_Model
{

    public function get_message_discussion($discussion)
    {
        $this->load->database();
        $this->load->view('entites/message');

            $where= array('id_profil ='.$discussion->id_profil_1.'OR id_profil = '.$discussion->id_profil_2);
            $query =$this->db->where('id_discussion',$discussion->id_discussion)
                            ->where($where)
                            ->from('message')
                            ->get();
        $result = $query->result();
        if(count($result) > 0)
        {
            $this->load->model('entities/message');
            $m = new Message();
            foreach($result as $key => $value)
            {
                $m->id_msg = $value->id_msg;
                $m->date_msg = $value->date_msg;
                $m->contenu_msg = $value->contenu_msg;
                $messages[$key]=$m;
            }
            return $messages;
        }
    }


    public function count_msg($discussion)
    {
        return count($this->get_message($discussion));
    }
    public function add_message($message,$disucssion)
    {
        $this->db->where('message.id_discussion',$disucssion->id_discussion);
        $this->db->insert('message',$message);
    }

    public function  get_last_message($id_profil)
    {

    }

}

