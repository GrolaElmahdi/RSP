<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 12:27
 * author : GROLA ELmahdi
 */

class AdminManagement extends CI_Model
{
    public static function login_admin($data)
    {
        $ci_instance = & get_instance();

        $ci_instance->load->model('entities/admin');
        $query = $ci_instance->db->where('email_admin',$data->email_admin)
        ->where('motdepasse_admin',$data->motdepasse_admin)
        ->from('admin');

        return $query->count_all_results()>0;
    }

    public static function get_email_admin($id)
    {
            $ci_instance = & get_instance();
            $query = $ci_instance->db->select('email_admin')
                ->where('id_admin',$id)
                ->from('admin')
                ->get();
            return $query->result();
    }
}