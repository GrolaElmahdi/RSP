<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 30/01/2016
 * Time: 13:24
 * author : GROLA ELmahdi
 */

defined('BASEPATH') OR exit ('No direct script access');

class Migration_Commentaire extends CI_Migration
{
    public function up()
    {
        echo '<tr><td>Commentaire</td>';
        $this->dbforge->add_field(array(
            'contenu_commentaire' => array(
                'type' => 'TEXT'
            ),
            'date_commentaire' => array(
                'type' => 'DATETIME'
            ),
            'id_publication' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'id_profil' => array(
                'type' => 'INT',
                'constraint' => '11'
            )
        ));

        $this->dbforge->add_key('id_publication','id_profil',True);
        $this->dbforge->create_table('commentaire');
        $this->db->query('ALTER TABLE commentaire ADD CONSTRAINT FK_commentaire_publication
                          FOREIGN KEY (id_publication) REFERENCES publication(id_publication) ON DELETE CASCADE;');
        $this->db->query('ALTER TABLE commentaire ADD CONSTRAINT FK_commentaire_profil
                          FOREIGN KEY (id_profil) REFERENCES profil(id_profil) ON DELETE CASCADE;');

        $this->seed();
    }
    public function down()
    {
        $this->dbforge->drop_table('commentaire');
    }
    public function seed()
    {
        $this->load->model('entities/commentaire');
        $commentaire = new Commentaire();

        for($i=0;$i<3;$i++)
        {
            $commentaire->date_commentaire=date('Y-m-d H:i:s');
            $commentaire->contenu_commentaire='Le commentaire numéro'.$i;
            $commentaire->id_profil = $i;
            $commentaire->id_publication=1;
            $this->db->insert('commentaire',$commentaire);
        }
    }
}