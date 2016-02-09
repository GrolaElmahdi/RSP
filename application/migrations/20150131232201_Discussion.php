<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 31/01/2016
 * Time: 14:09
 * author : GROLA Elmahdi
 */

defined('BASEPATH') OR exit ('No direct script access');

class Migration_Discussion extends CI_Migration
{
    public function up()
    {
        echo '<tr><td>Discussion</td>';
        $this->dbforge->add_field(array(
            'id_discussion' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'date_creation_discussion' => array(
                'type' => 'DATE'
            ),
            'id_profil_1' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'id_profil_2' => array(
                'type' => 'INT',
                'constraint' => '11'
            )
        ));
        $this->dbforge->add_key('id_discussion',TRUE);
        $this->dbforge->create_table('discussion');
        $this->db->query('ALTER TABLE discussion ADD CONSTRAINT fk_UtilisateurID_Profil_1 FOREIGN KEY (id_profil_1) REFERENCES profil(id_profil) ON DELETE CASCADE;');
        $this->db->query('ALTER TABLE discussion ADD CONSTRAINT fk_UtilisateurID_Profil_2 FOREIGN KEY (id_profil_2) REFERENCES profil(id_profil) ON DELETE CASCADE;');
        $this->seed();
    }

    public function down()
    {
        $this->dbforge->drop_table('discussion');

    }

    public function seed()
    {
        $this->load->model('entities/discussion');
        $discussion = new Discussion();


        for($i=0;$i<3;$i++)
        {

            $discussion->date_creation_discussion=date('d-m-Y');
            $discussion->id_profil_1=1;
            $discussion->id_profil_2=2;
            $this->db->insert('discussion',$discussion);
        }
    }
}