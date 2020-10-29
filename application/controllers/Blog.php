<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Blog_model");
		$this->load->helper(array("text","typography","auxiliar_helper"));
		
		//Armazenar cache da página por 24 horas
        //$this->output->cache(1440);
	}

	public function index()
	{	
		$data['titulo'] = "Techcode";
		$data['conteudos'] = $this->Blog_model->listarConteudo();
		
		$this->load->view("blog/estrutura/header", $data);
		$this->load->view("blog/pages/index",$data);
		$this->load->view("blog/estrutura/footer");
	}

	public function Conteudo()
	{
		$id = $this->uri->segment(3);
		$conteudo = $this->Blog_model->getIdConteudo($id);

		$data['titulo'] = "Techcode - " . $conteudo['titulo'];
		$data['conteudo'] = $conteudo;
		
		$this->load->view("blog/estrutura/header", $data);
		$this->load->view("blog/pages/conteudo");
		$this->load->view("blog/estrutura/footer");
	}

	public function Sobre()
	{
		$data['titulo'] = "Techcode - Sobre";
		$data['Autor'] = "Thomas Vinicius de Moraes";
		
		$this->load->view("blog/estrutura/header", $data);
		$this->load->view("blog/pages/sobre");
		$this->load->view("blog/estrutura/footer");
	}
}
