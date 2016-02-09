<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 29/01/2016
 * Time: 23:48
 * author : GROLA Elmahdi
 */

class Message extends CI_Model
{
    var $id_msg=NULL;
    var $contenu_msg='';
    var $date_msg ='';
    var $id_discussion='';
    var $id_profil='';

    function __construct()
    {
        parent::__construct();
    }
}

