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

	public function index($data = null)
	{	
		$this->load->library("pagination");

		 //Configurações de funcionamento
		 $config['base_url'] = base_url("Blog");          		//Onde a paginação será retornada
		 $config['per_page'] = ""; //3                          //Número de registros por página
		 $config['num_links'] = 3;                              //Número de links na paginação 
		 $config['uri_segment'] = 2;                            //Segmento da url
		 $config['total_rows'] = $this->Blog_model->CountAll(); //número total de registros da tabela
 
		 //Configurações de CSS
		 $config['full_tag_open'] = "<ul class='pagination admin-paginacao justify-content-center mt-4'>";
		 $config['full_tag_close'] = "</ul>";                                                       
		 $config['first_link'] = FALSE;
		 $config['last_link'] = FALSE;
		 $config['first_tag_open'] = "<li>" ;
		 $config['first_tag_close'] = "</li>" ;
		 $config['prev_link'] = "Anterior";
		 $config['prev_tag_open'] = "<li class='prev page-item page-link'>" ;
		 $config['prev_tag_close'] = "</li>" ;
		 $config['next_link'] = "Próximo";
		 $config['next_tag_open'] = "<li class='next page-item page-link'>";
		 $config['next_tag_close'] = "</li>";
		 $config['last_tag_open'] = "<li>";
		 $config['last_tag_close'] = "</li>";
		 $config['cur_tag_open'] = "<li class='active page-item' aria-current='page'><a class='page-link' href='#'>";
		 $config['cur_tag_close'] = "</a></li>";
		 $config['num_tag_open'] = "<li class='page-item page-link'>";
		 $config['num_tag_close'] = "<li>";
 
		 $this->pagination->initialize($config);
 
		 $data['pagination'] = $this->pagination->create_links();
 
		 $offset = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		 $data['conteudos'] = $this->Blog_model->getContentPage($config['per_page'], $offset);
		 //fim paginação


		$data['titulo'] = "Techcode";
		//$data['conteudos'] = $this->Blog_model->listarConteudo();
		$data['categorias'] = $this->Blog_model->categorias();

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

	public function searchCategoria()
	{
		$categoria = $this->input->post("categoria");
		
		$data['titulo'] = "Techcode";
		$data['conteudos'] = $this->Blog_model->buscaCategoria($categoria);
		$data['categorias'] = $this->Blog_model->categorias();

		$this->load->view("blog/estrutura/header", $data);
		$this->load->view("blog/pages/index",$data);
		$this->load->view("blog/estrutura/footer");
	}
}
