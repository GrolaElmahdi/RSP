<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 31/01/2016
 * Time: 14:09
 * author : GROLA Elmahdi
 */

defined('BASEPATH') OR exit ('No direct script access');

class Migration_Image extends CI_Migration
{
    public function up()
    {
        echo '<tr><td>Image</td>';
        $this->dbforge->add_field(array(
            'id_image' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'date_ajout_image' => array(
                'type' => 'DATE'
            ),
            'description_image' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'image' => array(
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
        $this->dbforge->add_key('id_image',TRUE);
        $this->dbforge->create_table('image');
        $this->db->query('ALTER TABLE image ADD CONSTRAINT FK_createurID_Image FOREIGN KEY (id_profil) REFERENCES profil(id_profil) ON DELETE CASCADE;');
        $this->db->query('ALTER TABLE image ADD CONSTRAINT FK_groupeID_Image FOREIGN KEY (id_groupe) REFERENCES groupe(id_groupe) ON DELETE CASCADE;');
        $this->seed();

    }

    public function down()
    {
        $this->dbforge->drop_table('image');
    }

    public function seed()
    {
        $this->load->model('entities/image');
        $image= new Image();


        $image->date_ajout_image=date('d-m-Y');
        $image->image='dist/img/image1.jpeg';
        $image->description_image='your image';
        $image->id_profil=1;
        $image->id_groupe=1;
        $this->db->insert('image',$image);
    }
}