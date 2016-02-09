<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 31/01/2016
 * Time: 14:09
 * author : GROLA Elmahdi
 */

class Migration_Amitie extends CI_Migration
{
    public function up()
    {
        echo '<tr><td>Amitie</td>';
        $this->dbforge->add_field(array(
            'id_profil_1' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'id_profil_2' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'date_amitie' => array(
                'type' => 'DATE'
            )

        ));
        $this->dbforge->add_key('id_profil_1','id_profil_2',TRUE);
        $this->dbforge->create_table('amitie');
        $this->db->query('ALTER TABLE amitie ADD CONSTRAINT FK_profil_1_amitie FOREIGN KEY (id_profil_1) REFERENCES profil(id_profil) ON DELETE CASCADE;');
        $this->db->query('ALTER TABLE amitie ADD CONSTRAINT FK_profil_2_amitie FOREIGN KEY (id_profil_2) REFERENCES profil(id_profil) ON DELETE CASCADE;');
        $this->seed();
    }
    public function down()
    {
        $this->dbforge->drop_table('amitie');
    }

public function seed()
    {
        $this->load->model('entities/amitie');
        $amitie = new Amitie();

        $amitie->id_profil_1=0;
        $amitie->id_profil_2=1;
        $amitie->date_amitie=date('d-m-Y');
        $this->db->insert('amitie',$amitie);

    }
}