<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 31/01/2016
 * Time: 14:09
 * author : GROLA Elmahdi
 */

class Migration_Rejoindre extends CI_Migration
{
    public function up()
    {
        echo '<tr><td>Rejoindre</td>';
        $this->dbforge->add_field(array(
            'id_profil' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'id_groupe' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'date_rejoindre_groupe' => array(
                'type' => 'DATE'
            )

        ));
        $this->dbforge->add_key('id_profil','id_groupe',TRUE);
        $this->dbforge->create_table('rejoindre');
        $this->db->query('ALTER TABLE Rejoindre ADD CONSTRAINT FK_profilID_Rejoindre FOREIGN KEY (id_profil) REFERENCES profil(id_profil) ON DELETE CASCADE;');
        $this->db->query('ALTER TABLE Rejoindre ADD CONSTRAINT FK_groupeID_Rejoindre FOREIGN KEY (id_groupe) REFERENCES groupe(id_groupe) ON DELETE CASCADE;');

        $this->seed();
    }

    public function down()
    {
        $this->dbforge->drop_table('rejoindre');
    }

    public  function seed()
    {
        $this->load->model('entities/rejoindre');
        $re = new Rejoindre();
        //$re->id_profil_rejoindre=1;
        //$re->id_profil_rejoindre=1;
        $re->date_rejoindre_groupe = date('d-m-Y');

        $this->db->insert('rejoindre',$re);

    }
}