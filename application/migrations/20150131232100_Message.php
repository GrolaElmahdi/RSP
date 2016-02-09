<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 16:58
 * GROLA elmahdi
 */

defined('BASEPATH') OR exit ('No direct script access');

class Migration_Message extends CI_Migration
{

    function up()
    {
        echo '<tr><td>Message</td>';
        $this->dbforge->add_field(array(
            'id_msg' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'date_msg' => array(
                'type' => 'DATE'
            ),
            'contenu_msg' => array(
                'type' => 'TEXT'
            ),
            'id_discussion' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'id_profil' => array(
                'type' => 'INT',
                'constraint' => '11'
            )
        ));
        $this->dbforge->add_key('id_msg',TRUE);
        $this->dbforge->create_table('message');
        $this->db->query('ALTER TABLE message ADD CONSTRAINT fk_DiscussionID_Message FOREIGN KEY (id_discussion) REFERENCES discussion(id_discussion) ON DELETE CASCADE;');
        $this->db->query('ALTER TABLE message ADD CONSTRAINT fk_DiscussionID_Profil FOREIGN KEY (id_profil) REFERENCES profil(id_profil) ON DELETE CASCADE;');
        $this->seed();
    }

    public function down()
    {
        $this->dbforge->drop_table('message');

    }

    public function seed()
    {
        $this->load->model('entities/message');
        $msg = new Message();

        for($i=0;$i<3;$i++)
        {

            $msg->contenu_msg='contenu de msg ';
            $msg->date_msg = date('d-m-Y');
            $msg->id_discussion = 1;
            $msg->id_profil=1;
            $this->db->insert('message',$msg);
        }
    }
}