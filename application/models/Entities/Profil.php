<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 12:07
 * author : GROLA ELmahdi
 */

class Profil extends CI_Model
{
    var $id_profil=NULL;
    var $url_profil ;
    var $nom_profil='';
    var $email_profil='';
    var $password_profil='';
    var $profession_profil='';
    var $date_creation_profil='';
    var $sexe_profil='';
    var $image_profil='';
    var $description_profil='';
    var $id_utilisateur='';

    function __construct()
    {
        parent::__construct();
    }
}