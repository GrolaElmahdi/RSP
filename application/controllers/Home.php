<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index($id_profil = NULL)
	{
		$this->load->model('management/profilmanagement');
		$this->load->model('management/amitiemanagement');
		$this->load->model('management/groupemanagement');
		$this->load->model('management/publicationmanagement');
		$this->load->model('management/commentairemanagement');
		$this->load->model('entities/profil');
		$this->load->model('entities/publication');
		$this->load->model('entities/commentaire');
		$this->load->library('session');
		$this->load->helper('form');
		$profil = new Profil();

		$profilManagement = new ProfilManagement();
		$amitiemanagement = new AmitieManagement();
		$groupe = new GroupeManagement();
		$publication = new PublicationManagement();
		$pubs = new Publication();
		$commentaire = new Commentaire();
		$commentaires_et_profils = new CommentaireManagement();
		$profil = $profilManagement->get_profil($this->session->userdata('id_profil'));
		if($profil != NULL)
		{
			$amitiem = $amitiemanagement->get_friends($profil->id_profil);
			$groupem = $groupe->get_groupes($profil->id_profil);
			$pubs = $publication->get_all_publications($profil->id_profil);
			$friends = $amitiemanagement->get_friends($profil->id_profil);

			$this->load->view('head');
			$this->load->view('header',Array('profil'=>$profil,'profilmanagement'=>$profilManagement));
			$this->load->view('sidebar',Array('profil'=>$profil,'profilmanagement'=>$profilManagement));
			$this->load->view('content-wrapper');
			$this->load->view('info-box',Array('profilmanagement'=>$profilManagement,'profil'=>$profil));
			$this->load->view('friends',Array('amitiem' => $amitiem,'profilmanagement'=>$profilManagement,'profil'=>$profil));
			$this->load->view('groupes',Array('profilmanagement' => $profilManagement,'groupem' => $groupem,'profil'=>$profil));
			$this->load->view('publication',Array('pubs'=>$pubs,'commentaire_et_profil'=>$commentaires_et_profils,'profil'=>$profil));
			$this->load->view('space');
			$this->load->view('space');
			$this->load->view('footer');
		}
		else
		{

			redirect('Login','location');
		}

	}


}
