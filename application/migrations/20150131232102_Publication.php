<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 31/01/2016
 * Time: 14:09
 * author : GROLA Elmahdi
 */

defined('BASEPATH') OR exit ('No direct script access');

class Migration_Publication extends CI_Migration
{
    public function up()
    {
        echo '<tr><td>Publication</td>';
        $this->dbforge->add_field(array(
            'id_publication' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'date_ajout_publication' => array(
                'type' => 'DATE'
            ),
            'contenu_publication' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'id_profil' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'id_groupe' => array(
                'type' => 'INT',
                'constraint' => '11'
            )

        ));
        $this->dbforge->add_key('id_publication',TRUE);
        $this->dbforge->create_table('publication');
        $this->db->query('ALTER TABLE publication ADD CONSTRAINT FK_createurID_Publication FOREIGN KEY (id_profil) REFERENCES profil(id_profil) ON DELETE CASCADE;');
        $this->db->query('ALTER TABLE publication ADD CONSTRAINT FK_groupeID_Publication FOREIGN KEY (id_groupe) REFERENCES groupe(id_groupe) ON DELETE CASCADE;');
        $this->seed();

    }

    public function down()
    {
        $this->dbforge->drop_table('publication');
    }

    public function seed()
    {
        $this->load->model('entities/publication');
        $publication= new Publication();


        $publication->date_ajout_publication=date('d-m-Y');
        $publication->contenu_publication='salut tout le monde !';
        $publication->id_profil=1;
        $publication->id_groupe=1;
        $this->db->insert('publication',$publication);
    }
}