<section class="container">
<div class="admin-home">
	<h1 class="text-center mt-3">Techcode</h1>
	<p class="lead alert-success text-center rounded "><?php echo $this->session->flashdata("welcome"); ?></p>
	<p class="lead alert-warning text-center rounded"><?php echo $this->session->flashdata("mensagem"); ?></p>
        <div class="col-lg-12">
			<table class="table table-hover table-dark table-bordered table-responsive-lg">
			<thead class="thead-dark">
				<tr>
                    <th scope="row">ID</th>
					<th scope="col">Titulo</th>
					<th scope="col">Categoria</th>
					<th scope="col">Descrição</th>
					<th scope="col">Alterar</th>
					<th scope="col">Deletar</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($conteudos as $conteudo): ?>
				<tr>
						<th scope="row"><?php echo $conteudo['id'] ?></th>
						<td><?php echo $conteudo['titulo'] ?></td>
						<td><?php echo $conteudo['categoria'] ?></td>
                        <td><?php echo character_limiter($conteudo['descricao'],50) ?></td>
                        <td><a href="<?php echo base_url("admin/alterar/" . $conteudo['id']) ?>"><img class="mx-auto d-flex" src="<?php echo base_url("/assets/img/png/spreadsheet-3x.png") ?>" ></a></td>	
                        <td><a href="<?php echo base_url("admin/deletar/" . $conteudo['id']) ?>"><img class="mx-auto d-flex" src="<?php echo base_url("/assets/img/png/trash-3x.png") ?>"></a></td>	
				</tr>
			<?php endforeach ?>
			</tbody>
			</table>
    </div>
    </div>
</section>