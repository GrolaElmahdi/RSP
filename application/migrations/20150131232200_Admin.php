<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 12:39
 * author : GROLA ELmahdi
 */

defined('BASEPATH') OR exit ('No direct script access');

class Migration_Admin extends CI_Migration
{
    public function up()
    {
        echo '<tr><td>Admin</td>';
        $this->dbforge->add_field(array(

                'id_admin' => array(
                    'type' => 'INT',
                    'constraint' => '11',
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'nom_admin' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '200'
                ),
                'prenom_admin' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                ),
                'pseudonom_admin' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                ),
                'motdepasse_admin' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                ),
                'email_admin' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                ),
                'tel_admin' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                )

        ));
        $this->dbforge->add_key('id_admin',TRUE);
        $this->dbforge->create_table('admin');
        $this->seed();
    }
    public function down()
    {
        $this->dbforge->drop_table('admin');

    }
    public function seed()
    {
        $this->load->model('entities/admin');

        $temp_admin = new Admin();

        $temp_admin->nom_admin = 'GROLA';
        $temp_admin->prenom_admin = 'Elmahdi';
        $temp_admin->pseudonom_admin = 'GR';
        $temp_admin->motdepasse_admin ='abcd';
        $temp_admin->email_admin = 'grolaelmehdi@gmail.com';
        $temp_admin->tel_admin = '0634424220';
        $this->db->insert('admin',$temp_admin);

    }
}