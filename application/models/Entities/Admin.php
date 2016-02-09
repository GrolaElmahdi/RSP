<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 12:00
 * author : GROLA ELmahdi
 */

class Admin extends CI_Model
{
    var $id_admin=NULL;
    var $nom_admin = '';
    var $prenom_admin = '';
    var $pseudonom_admin = '';
    var $motdepasse_admin ='';
    var $email_admin = '';
    var $tel_admin = '';


    function __construct()
    {
        parent::__construct();
    }

}