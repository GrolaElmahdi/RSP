<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 02/02/2016
 * Time: 18:30
 * author : GROLA ELmahdi
 */

class Commentaire extends CI_Model
{
    //var $id_commentaire=NULL;
    var $contenu_commentaire;
    var $date_commentaire;
    var $id_profil;
    var $id_publication;

    function __construct()
    {
        parent::__construct();
    }
}