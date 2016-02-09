<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 31/01/2016
 * Time: 14:09
 * author : GROLA Elmahdi
 */

defined('BASEPATH') OR exit ('No direct script access');

class Migration_DiscussionMail extends CI_Migration
{
    public function up()
    {
        echo '<tr><td>DiscussionMail</td>';
        $this->dbforge->add_field(array(
            'id_disc' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'date_creation_disc' => array(
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
        $this->dbforge->add_key('id_disc',TRUE);
        $this->dbforge->create_table('disc_mail');
        $this->db->query('ALTER TABLE disc_mail ADD CONSTRAINT fk_disc_mail_Profil_1
                          FOREIGN KEY (id_profil_1) REFERENCES profil(id_profil) ON DELETE CASCADE;');
        $this->db->query('ALTER TABLE disc_mail ADD CONSTRAINT fk_disc_mail_Profil_2
                          FOREIGN KEY (id_profil_2) REFERENCES profil(id_profil) ON DELETE CASCADE;');
        $this->seed();
    }

    public function down()
    {
        $this->dbforge->drop_table('disc_mail');

    }

    public function seed()
    {
        $this->load->model('entities/discussionmail');
        $discMail = new DiscussionMail();



            $discMail->date_creation_disc=date('d-m-Y');
            $discMail->id_profil_1=0;
            $discMail->id_profil_2=1;
            $this->db->insert('disc_mail',$discMail);

            $this->db->insert('disc_mail',$discMail);

    }
}