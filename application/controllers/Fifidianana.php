<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fifidianana extends CI_Controller 
{

	public function index()
	{
		$this->load->view('home');
	}

	public function saveCandidat() 
	{

        $this->form_validation->set_rules('candidatNumero', 'Numero candidat', array('required', 'integer'));
        $this->form_validation->set_rules('candidatName', 'Nom candidat', array('required', 'min_length[5]'));
		$this->form_validation->set_rules('candidatFirstName', 'Prénom candidat', array('required', 'min_length[5]'));
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		$target_dir = "uploads/";

		if ($this->form_validation->run() == FALSE) 
		{
			
			$this->load->view('home');
			$this->session->set_flashdata('response','Erreur ts fantatra avy aza !');

		} else {

			$candidatNumero = $this->input->post('candidatNumero');
			$candidatName = $this->input->post('candidatName');
			$candidatFirstName = $this->input->post('candidatFirstName');

			$check = getimagesize($_FILES["candidatPhoto"]["tmp_name"]);

			if($check !== false) 
			{ 
	
				$folder=$target_dir."candidats";
	
				$uploadOk = 1;
	
				if(!is_dir($folder))
				{

					mkdir($folder,0777,true);
				
				}
	
				$media_path = $folder."/".basename($_FILES["candidatPhoto"]["name"]);	
	
				if ($uploadOk == 1) 
				{

					if (move_uploaded_file($_FILES["candidatPhoto"]["tmp_name"], $media_path)) 
					{
	
						$this->session->set_flashdata('response','The file '.basename( $_FILES["candidatPhoto"]["name"]).' has been uploaded.');

						$this->load->model('ModelFifidianana');

						if ($this->ModelFifidianana->saveCandidat($candidatNumero, $candidatName, $candidatFirstName, $media_path)) 
						{
							
							$this->session->set_flashdata('response','Candidat enregistré avec succes !');

						} else 
						{
						
							$this->session->set_flashdata('response','Candidat non enregistré !');

						}

						
					} else 
					{

						$this->session->set_flashdata('response','Désolé, une erreur s\'est produit lors de l\'enregistrement de la photo');
					
					}
				}

				$this->load->view('home');

			} else 
			{

				$this->session->set_flashdata('response','Le fichier enregistré n\'est pas une image !');
				$uploadOk = 0;
				$this->load->view('home');
			
			}

		}

	}
	
	public function getAllCandidat()
	{

		$this->load->model('ModelFifidianana');
		$data['allCandidat'] = $this->ModelFifidianana->getAllCandidat();
		$this->load->view('listeCandidat', $data);

	}

	public function insertVote()
	{

		$this->form_validation->set_rules('voteTotal', 'Total vote', array('required', 'integer'));
		$this->form_validation->set_rules('voteBlanc', 'Vote blanc', array('required', 'integer'));
		$this->form_validation->set_rules('voteMort', 'Vote mort', array('required', 'integer'));
		$this->load->model('ModelFifidianana');
		$nombreCandidat = $this->ModelFifidianana->countCandidat();
		for ($i=1; $i <= $nombreCandidat; $i++) { 
			
			$this->form_validation->set_rules($i, $i, array('required', 'integer'));

		}
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		if ($this->form_validation->run() == FALSE) 
		{

			$this->load->model('ModelFifidianana');
			$data['allCandidat'] = $this->ModelFifidianana->getAllCandidat();
			$this->load->view('insertResultVoting', $data);

		} else 
		{

			$this->load->model('ModelFifidianana');

			$voteTotal = $this->input->post('voteTotal');
			$voteBlanc = $this->input->post('voteBlanc');
			$voteMort = $this->input->post('voteMort');

			if ($this->ModelFifidianana->insertToVote($voteTotal, $voteBlanc, $voteMort)) 
			{

				$nombreCandidat = $this->ModelFifidianana->countCandidat();

				for ($i=1; $i <= $nombreCandidat; $i++) { 
					
						$candidatVote = $this->input->post($i);
						$this->ModelFifidianana->updateCandidat($i, $candidatVote);

				}

				$this->load->model('ModelFifidianana');
				$data['allCandidat'] = $this->ModelFifidianana->getAllCandidat();
				$data['allVote'] = $this->ModelFifidianana->selectToVote();
				$this->load->view('seeResult', $data);
				$this->load->view('gaagnant', $data);

			} else 
			{
			
				$this->session->set_flashdata('response','Résultat de vote non enregistré !');

			}

		}

	}

	public function resetAll() {

		$this->load->model('ModelFifidianana'); 
		$this->ModelFifidianana->deleteAllCandidat();
		$this->ModelFifidianana->deleteAllVote();
		$this->load->view('home');

	}

}
?>