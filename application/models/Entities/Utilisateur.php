<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 12:04
 * author : GROLA ELmahdi
 */
class Utilisateur extends  CI_Model
{
    var $id_utilisateur;
    var $nom_util='';
    var $prenom_util='';
    var $num_inscription='';
    var $cne='';
    var $date_n_util='';
    var $sexe_util='';
    var $profession_util='';
    var $email_util='';
    var $tel_util='';
    var $adresse_util='';
    var $id_admin='';
    var $id_profil='';


    function __construct()
    {
        parent::__construct();
    }

     function initialize($data)
    {
        $this->nom_util=$data['nom'];
        $this->prenom_util=$data['prenom'];
        $this->num_inscription=$data['num'];
        $this->cne=$data['cne'];
        $this->date_n_util=date('Y-m-d');
        $this->sexe_util=$data['sexe'];
        $this->profession_util=$data['profession'];
        $this->email_util= $data['email'];
        $this->tel_util = $data['telephone'];
        $this->adresse_util=$data['adresse'];
        $this->id_admin=1;
        $this->id_profil='';
    }

}