<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Blog_model");
        $this->load->helper("text");

        //Armazenar cache da página por 24 horas
        //$this->output->cache(1440);
    }

    public function login()  //Carrega a tela de login 
	{
		$data['titulo'] = "Techcode - Login";
		
		$this->load->view("blog/estrutura/header", $data);
		$this->load->view("admin/pages/login");
        $this->load->view("blog/estrutura/footer");
	}

    public function admin()
    {
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("senha", "Senha", "trim|required");

        if($this->form_validation->run() == FALSE) {
            $this->login();
        } 
        else 
        {
            $email = $this->input->post("email");
            $senha = $this->input->post("senha");
            $usuario = $this->Blog_model->acesso($email, $senha);

            if($usuario == FALSE) {
                $this->session->set_flashdata("usuarioInvalido", "Usuário ou senha inválidos");
                $this->login();
            } else {
                //SE usuário for encontrado na base de dados, armazene na sessão
                $this->session->set_userdata('usuario', $usuario);
                $this->home();
            }
        }
    }

    public function home() //Carrega a tela Home de Admin
    {
        //SE usuário não estiver na sessão, retorne a tela de login
        if($this->session->userdata("usuario") != TRUE) {
            $this->login();
        }

        $data['titulo'] = "DevTho - Home";
        $data['conteudos'] = $this->Blog_model->listarConteudo();
		
		$this->load->view("admin/estrutura/header", $data);
		$this->load->view("admin/pages/home");
		$this->load->view("admin/estrutura/footer");
    }

    public function cadastrar()
    {
        if($this->session->userdata("usuario") != TRUE) {
            $this->login();
        }

        $data['titulo'] = "DevTho - Cadastrar Conteúdo";
        
		$this->load->view("admin/estrutura/header", $data);
		$this->load->view("admin/pages/cadastrar");
		$this->load->view("admin/estrutura/footer");
    }

    public function cadastrarConteudo()
    {
        if($this->session->userdata("usuario") != TRUE) {
            $this->login();
        }

        $this->form_validation->set_rules("titulo", "Titulo", "required");
        $this->form_validation->set_rules("categoria", "Categoria", "required");
        $this->form_validation->set_rules("descricao", "Descrição", "required");

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("mensagem", "Preencha todos os campos!");
        } else {
            $path = "artigo_img";
            if(!is_dir($path)) {
                mkdir($path, 0777);
            }

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'png';
            $config['file_name'] = date("YmdHis");

            $this->load->library("upload", $config);

            if($this->upload->do_upload('imagem') == FALSE) {
                $this->session->set_flashdata("mensagem", "Erro! Conteúdo não cadastrado");
            } else {
                $conteudo = array(
                    "titulo" => $this->input->post("titulo"),
                    "categoria" => $this->input->post("categoria"),
                    "descricao" => $this->input->post("descricao"),
                    "imagem" => $config['file_name'] . ".png",
                );
    
                $this->Blog_model->cadastrarConteudo($conteudo);
                $this->session->set_flashdata("mensagem", "Conteúdo cadastrado com sucesso");
            }
        }
        $this->cadastrar();
    }

    public function alterar()
    {  
        if($this->session->userdata("usuario") != TRUE) {
            $this->login();
        }

        //Armazenando o terceiro parâmetro da URL como ID
        $id = $this->uri->segment(3);
        $conteudo = $this->Blog_model->getIdConteudo($id);

        $data['titulo'] = "DevTho - Alterar";
        $data['conteudo'] = $conteudo;
		
		$this->load->view("admin/estrutura/header", $data);
		$this->load->view("admin/pages/alterar");
		$this->load->view("admin/estrutura/footer");
    }

    public function alterarConteudo()
    {
        if($this->session->userdata("usuario") != TRUE) {
            $this->login();
        }

        $this->form_validation->set_rules("titulo", "Titulo", "required|min_length[3]");
        $this->form_validation->set_rules("categoria", "Categoria", "required|min_length[3]");
        $this->form_validation->set_rules("descricao", "Descrição", "required|min_length[3]");

        if($this->form_validation->run()) {
            $conteudo = array(
                "titulo" => $this->input->post("titulo"),
                "categoria" => $this->input->post("categoria"),
                "descricao" => $this->input->post("descricao")
            );
            if($this->Blog_model->alterarConteudo($this->input->post("hidden_id"), $conteudo) == TRUE) {
                $this->session->set_flashdata("mensagem", "Erro! Conteúdo não atualizado");
            } else {
                $this->session->set_flashdata("mensagem", "Conteúdo atualizado com sucesso");
            }
        }  
        $this->Home();
    }

    public function deletar()
    {
        $id = $this->uri->segment(3); 
        $conteudo = $this->Blog_model->getIdConteudo($id);

        //SE o conteudo['imagem'] existir, apague o arquivo e delete da base de dados
        if(unlink("artigo_img/{$conteudo['imagem']}") == FALSE) {
            $this->session->set_flashdata("mensagem", "Erro! Conteúdo não deletado");
        } else {
            $this->Blog_model->deletarConteudo($id);
            $this->session->set_flashdata("mensagem", "Conteúdo deletado com sucesso!");
        }
        $this->Home();
    }

    public function logout() //Remova o usuário da sessão
    {
        $this->session->unset_userdata("usuario");
        $this->login();
    }

    public function cadastroUsuario()
    {
        if($this->session->userdata("usuario") != TRUE) {
            $this->login();
        }

        $data['titulo'] = "DevTho - Cadastrar Usuário";
        
		$this->load->view("admin/estrutura/header", $data);
		$this->load->view("admin/pages/cadastrarUsuario");
		$this->load->view("admin/estrutura/footer");
    }

    public function cadastrarUsuario()
    {
        if($this->session->userdata("usuario") != TRUE) {
            $this->login();
        }

        $this->form_validation->set_rules("nome", "Nome", "required|max_length[60]");
        $this->form_validation->set_rules("email", "Email", "required|valid_email");
        $this->form_validation->set_rules("senha", "Senha", "required|min_length[6]");

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("mensagem", "Preencha todos os campos!");
        } else {
            $usuario = array(
                "nome" => $this->input->post("nome"),
                "email" => $this->input->post("email"),
                "senha" => $this->input->post("senha")
            );
                $this->Blog_model->cadastrarUsuario($usuario);
                //$this->sendEmail($usuario['email']);
                //$this->sendEmailPHPMailer($usuario['email']);
                $this->session->set_flashdata("mensagem", "Usuário cadastrado com sucesso!");
            }
        $this->cadastroUsuario();
    }

    private function sendEmail($email) //A aplicação deve estar hospedada para que o email seja efetuado
    {
        $this->load->library("email");

        //Configurações para envio de emails
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "smtp.gmail.com"; //smtp.gmail.com
        $config['smtp_port'] = 587; //465 , 587 , 25
        $config['wordwrap'] = TRUE;
        $config['smtp_user'] = "thomoraes02@gmail.com";
        $config['smtp_pass'] = "11092020";
        $config['charset'] = "UTF-8"; // iso-8859-1
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['crlf']     = "\r\n";
        $config['smtp_crypto'] = 'ssl'; //tls

        $this->email->initialize($config);

        $this->email->from("thomoraes02@gmail.com", "Techcode"); //DE - Remetente
        $this->email->to($email); //PARA - Destinatário
        $this->email->subject("Conteúdo Email"); //Conteúdo
        $this->email->message("Mensagem Email - Email teste - Codeigniter 3"); //Mensagem
       
        if($this->email->send() == FALSE) {
            echo $this->email->print_debugger();
        }
    }

    private function sendEmailPHPMailer($email) //biblioteca PHP Mailer
    {
        $this->load->library("PHPMailer_lib");

        $mail = $this->PHPMailer_lib->load();

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = TRUE;
        $mail->Username = "thomoraes02@gmail.com";
        $mail->Password = "11092020";
        $mail->Port = 587;

        $mail->setFrom("thomoraes02@gmail.com", "Thomas");
        $mail->addAddress($email);

        $mail->Subject = "Conteúdo Email";

        $mail->isHtml(TRUE);

        $mailContent = "<h1>Mensagem Email - Email teste - Codeigniter 3</h1>";
        $mail->Body = $mailContent;

        if(!$mail->sendEmailPHPMailer()) {
            echo "Email não enviado";
            echo $mail->ErrorInfo;
        } else {
            echo "Email enviado com sucesso";
        }
    }
}