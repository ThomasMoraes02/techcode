<section class="container">
	<div class="admin-grafico">
		<div class="row">
			<?php if($artigos && $categorias): ?>
			<div class="col-sm-6">
				<h1>Artigos: <span class="badge badge-secondary"><?php echo $artigos ?></span></h1>
			</div>
			<div class="col-sm-6">
				<h1>Categorias: <span class="badge badge-secondary"><?php echo $categorias ?></span></h1>
			</div>
			<?php endif ?>
		</div>
	</div>
</section>

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
					<th scope="col">Publicado</th>
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
                        <td><?php echo formataData($conteudo['create']) ?></td>
                        <td><a href="<?php echo base_url("admin/alterar/" . $conteudo['id']) ?>"><img class="mx-auto d-flex" src="<?php echo base_url("/assets/img/png/spreadsheet-3x.png") ?>" ></a></td>	
                        <td><a href="<?php echo base_url("admin/deletar/" . $conteudo['id']) ?>"><img class="mx-auto d-flex" src="<?php echo base_url("/assets/img/png/trash-3x.png") ?>"></a></td>	
				</tr>
			<?php endforeach ?>
			</tbody>
			</table>
    </div>
	<?php echo $pagination ?>
    </div>
</section>

<section class="container">
		<div class="admin-categorias">
			<div class="row">
				<div class="col-sm-6">
					<table class="table table-sm table-dark">
						<thead>
							<tr>
								<th scope="col" class="text-center">Categorias:</th>
							</tr>
						</thead>
						<tbody>
							<?php if($tipoCategoria): ?>
								<?php foreach($tipoCategoria as $categoria): ?>
									<tr>
										<th> - <?php echo $categoria['categoria'] ?></th>
									</tr>
								<?php endforeach ?>
							<?php endif ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
</section>



