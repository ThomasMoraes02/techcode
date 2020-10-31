<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/css/slick.css") ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/css/slick-theme.css") ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/assets/css/style.css") ?>">
    <title><?php echo $titulo ?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo base_url("Blog") ?>">Techcode</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("blog/sobre") ?>">Sobre<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Artigos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("admin") ?>">Admin</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
    </form>
  </div>
</nav>
