<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 31/01/2016
 * Time: 13:44
 * author : GROLA ELmahdi
 */

class Discussion extends CI_Model
{
    var $id_discussion=NULL;
    var $date_creation_discussion='';
    var $id_profil_1='';
    var $id_profil_2='';

    function __construct()
    {
        parent::__construct();
    }
}