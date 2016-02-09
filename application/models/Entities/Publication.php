<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 12:11
 * author : GROLA ELmahdi
 */

class Publication extends CI_Model
{
    var $id_publication;
    var $date_ajout_publication='';
    var $contenu_publication='';
    var $id_profil='';
    var $id_groupe='';

    function __construct()
    {
        parent::__construct();
    }
}