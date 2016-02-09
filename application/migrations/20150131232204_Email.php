<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 16:10
 * author : GROLA ELmahdi
 */

defined('BASEPATH') OR exit ('No direct script access');

class Migration_Email extends CI_Migration
{

    public function up()
    {
        echo '<tr><td>Email</td>';
        $this->dbforge->add_field(array(
            'id_email' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'sujet_email' => array(
                'TYPE' => 'VARCHAR',
                'constraint' => '50'
            ),
            'contenu_email' => array(
                'type' => 'TEXT'
            ),
            'date_email' => array(
                'type' => 'VARCHAR',
                'constraint' => '200'
            ),
            'id_discussion_email' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'id_profil' => array(
                'type' => 'INT',
                'constraint' => '11'
            )
        ));
        $this->dbforge->add_key('id_email',TRUE);
        $this->dbforge->create_table('email');
        $this->db->query('ALTER TABLE email ADD CONSTRAINT FK_DiscussionIDMail_Message FOREIGN KEY (id_discussion_email) REFERENCES discussion(id_discussion) ON DELETE CASCADE;');
        $this->db->query('ALTER TABLE email ADD CONSTRAINT FK_Profil_Message FOREIGN KEY (id_profil) REFERENCES profil(id_profil) ON DELETE CASCADE;');
        $this->seed();
    }

    public function down()
    {
        $this->dbforge->drop_table('email');

    }

    public function seed()
    {
        $this->load->model('entities/email');
        $email = new Email();

        for($i=0;$i<3;$i++)
        {
            ;
            $email->sujet_email='sujet de msg';
            $email->contenu_email='contenu de msg ';
            $email->date_email=date('d-m-Y');
            $email->id_discussion_email = 1;
            $email->id_profil = 1;
            $this->db->insert('email',$email);
        }
    }
}