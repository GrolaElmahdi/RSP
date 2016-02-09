<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 12:09
 * author : GROLA ELmahdi
 */

class Groupe extends CI_Model
{
    var $id_groupe=NULL;
    var $nom_groupe='';
    var $date_creation_groupe='';
    var $description_groupe='';
    var $id_profil='';

    function __construct()
    {
        parent::__construct();
    }
}