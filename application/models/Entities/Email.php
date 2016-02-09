<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 12:13
 * author : GROLA Elmahdi
 */
class Email extends CI_Model
{
    var $id_email = NULL;
    var $date_email='';
    var $sujet_email='';
    var $contenu_email='';
    var $id_discussion_email='';
    var $id_profil='';

    function __construct()
    {
        parent::__construct();
    }
}