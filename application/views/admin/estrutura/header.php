<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/css/estilo.css") ?>">
    <title><?php echo $titulo ?></title>
</head>
<body>

<nav class="container">
    <ul class="nav nav-tabs nav-pills flex-column flex-sm-row mt-3">
        <li class="nav-item">
            <a class="nav-link"  href="<?php echo base_url("Admin/Home") ?>">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url("admin/cadastrar-conteudo") ?>">Cadastrar Conteúdo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url("admin/cadastrar-usuario") ?>">Cadastrar Usuário</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url("admin/gerenciar") ?>">Gerênciar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url("admin/logout"); ?>">Sair</a>
        </li>
        <li class="nav-item ml-auto">
            <a class="nav-link disabled">Usuário: <?php echo $this->session->userdata("usuario")['nome'] ?> </a>
        </li>
    </ul>
</nav>