<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 13:24
 * author : GROLA ELmahdi
 */

defined('BASEPATH') OR exit ('No direct script access');

class Migration_Utilisateur extends CI_Migration
{
    public function up()
    {
        echo '<tr><td>Utilisateur</td>';
        $this->dbforge->add_field(array(
            'id_utilisateur' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nom_util' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'prenom_util' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'num_inscription' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            ),
            'cne' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            ),
            'date_n_util' => array(
                'type' => 'DATE'
            ),
            'sexe_util' => array(
                'type' => 'char',
                'constraint' => '1'
            ),
            'profession_util' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'email_util' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            ),
            'tel_util' => array(
                'type' => 'VARCHAR',
                'constraint' => '20'
            ),
            'adresse_util' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'id_admin' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'id_profil' => array(
                'type' => 'INT',
                'constraint' => '11'
            )
        ));
        $this->dbforge->add_key('id_utilisateur',TRUE);
        $this->dbforge->create_table('utilisateur');
        $this->db->query('ALTER TABLE utilisateur ADD CONSTRAINT FK_adminID_Utilisateur FOREIGN KEY (id_admin) REFERENCES admin(id_admin) ON DELETE CASCADE;');
        $this->db->query('ALTER TABLE utilisateur ADD CONSTRAINT FK_profilID_Utilisateur FOREIGN KEY (id_profil) REFERENCES profil(id_profil) ON DELETE CASCADE;');

        $this->seed();
    }
    public function down()
    {
        $this->dbforge->drop_table('utilisateur');
    }
    public function seed()
    {
        $this->load->model('entities/utilisateur');

        $j=8;
        $util = new Utilisateur();

        for($i=0;$i<3;$i++)
        {


            $util->nom_util='user first name'.$i;
            $util->prenom_util='user last name'.$i;
            $util->num_inscription=$i.'15SMI'.$j;
            $util->cne=66+$j;
            $util->date_n_util=date('d-m-Y');
            $util->sexe_util='H';
            $util->profession_util='etudiant';
            $util->email_util='utilisateur'.$i.'@mailservice.com';
            $util->tel_util='0634424220';
            $util->adresse_util='block 33, quartier A';
            $util->id_admin=1;
            $util->id_profil=$i;
            $this->db->insert('utilisateur',$util);

        }
    }
}