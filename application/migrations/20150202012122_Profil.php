<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 17:35
 * author : GROLA ELmahdi
 */

defined('BASEPATH') OR exit ('No direct script access');

class Migration_Profil extends CI_Migration
{

    public  function up()
    {
        echo '<tr><td>Profil</td>';
        $this->dbforge->add_field(array(
            'id_profil' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'url_profil' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'nom_profil' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'email_profil' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'password_profil' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'profession_profil' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'date_creation_profil' => array(
                'type' => 'DATE'
            ),
            'sexe_profil' => array(
                'type' => 'CHAR',
                'constraint' => '1'
            ),
            'image_profil' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'description_profil' => array(
                'type' => 'TEXT'
            ),
            'id_utilisateur' => array(
                'type' => 'INT',
                'constraint' => '11'
            )
        ));
        $this->dbforge->add_key('id_profil',TRUE);
        $this->dbforge->create_table('profil');
        $this->db->query('ALTER TABLE profil ADD CONSTRAINT FK_UtilisateurID_Profil FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur) ON DELETE CASCADE;');
        $this->seed();
    }

    public  function down()
    {
        $this->dbforge->drop_table('profil');

    }

    public  function seed()
    {
        $this->load->model('entities/profil');
        $profil = new Profil();


        for($i=0;$i<1;$i++)
        {
            $profil->url_profil=$i;
            $profil->nom_profil='profil'.$i;
            $profil->email_profil='profil@mailservice.com';
            $profil->password_profil='123';
            $profil->profession_profil='etudiant'.$i;
            $profil->date_creation_profil=date('d-m-Y');
            $profil->sexe_profil='M';
            $profil->image_profil='profil'.$i.'.png';
            $profil->description_profil='Etudiant en SMI S5-S6';
            $profil->id_utilisateur=$i;
            $this->db->insert('profil',$profil);
        }
    }
}