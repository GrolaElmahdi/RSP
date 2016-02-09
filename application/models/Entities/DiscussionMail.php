<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 01/02/2016
 * Time: 02:20
 * author : GROLA Elmahdi
 */

class DiscussionMail extends CI_Model
{
    var $id_disc='';
    var $date_creation_disc='';
    var $id_profil_1;
    var $id_profil_2;

    function __construct()
    {
        parent::__construct();
    }
}