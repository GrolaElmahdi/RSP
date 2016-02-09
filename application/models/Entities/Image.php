<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 12:10
 * author : GROLA ELmahdi
 */

class Image extends CI_Model
{
    var $id_image = NULL;
    var $date_ajout_image='';
    var $description_image='';
    var $image='';
    var $id_profil='';
    var $id_groupe='';

    function __construct()
    {
        parent::__construct();
    }
}