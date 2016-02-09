<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 19:18
 * author : GROLA ELmahdi
 */

defined('BASEPATH') OR exit ('No direct script access');

class Migration_Groupe extends CI_Migration
{
    public function up()
    {
        echo '<tr><td>Utilisateur</td>';
        $this->dbforge->add_field(array(
            'id_groupe' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nom_groupe' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'date_creation_groupe' => array(
                'type' => 'DATE'
            ),
            'description_groupe' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'id_profil' => array(
                'type' => 'INT',
            'constraint' => '11'
            )

        ));
        $this->dbforge->add_key('id_groupe',TRUE);
        $this->dbforge->create_table('groupe');
        $this->db->query('ALTER TABLE groupe ADD CONSTRAINT FK_createurID_Groupe FOREIGN KEY (id_profil) REFERENCES profil(id_profil) ON DELETE CASCADE;');
        $this->seed();

    }

    public function down()
    {
        $this->dbforge->drop_table('groupe');
    }

    public function seed()
    {
        $this->load->model('entities/groupe');
        $groupe= new Groupe();


        $groupe->nom_groupe='groupe1';
        $groupe->date_creation_groupe=date('d-m-Y');
        $groupe->description_groupe='your private space';
        $groupe->id_profil=1;
        $this->db->insert('groupe',$groupe);
    }
}