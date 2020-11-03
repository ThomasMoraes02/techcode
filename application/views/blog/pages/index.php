<section class="">
		<div class="mx-auto text-center">
			<div class=""> <!-- slide -->
				<!--<img src="<?php echo base_url("/assets/img/png/container-black.png") ?>" alt="Galeria-Blog" class="img-fluid">
				<img src="<?php echo base_url("/assets/img/png/container-white.png") ?>" alt="Galeria-Blog" class="img-fluid"> -->
			</div>
		</div>
</section>

<section class="container">
		<div class="grid-12">
			<h1 class="text-center mt-4 h2">Techcode o blog de tecnologia</h1>
			<p class="text-center lead">Aqui você encontrará artigos sobre programação, tecnologia, frameworks de desenvolvimento e muito mais !!!</p>
		</div>
</section>

<section class="container">
			<div class="col-md-12 blog-categoria">
				<?php echo form_open("Blog/searchCategoria") ?>
				<form>
					<div class="row d-flex align-items-center">
					<div class="col-md-2">
							<label for="categoria" class="lead">Filtrar Categorias:</label>
					</div>
					<div class="col-md-8">
							<select class="form-control form-control-sm" id="categoria" name="categoria">
								<option value="todas">Todas</option>
								<?php if($categorias): ?>
									<?php foreach($categorias as $categoria): ?>
										<option value="<?php echo $categoria['categoria'] ?>"><?php echo $categoria['categoria'] ?></option>
									<?php endforeach ?>
								<?php endif ?>
							</select>
					</div>
					<div class="col-md-2">
						<button class="btn btn-dark btn-block" type="submit">Filtrar</button>
					</div>
					</div>
				</form>
				<?php form_close() ?>
		</div>

									<!--
		<div class="col-md-12 blog-categoria">
				<?php echo form_open("Blog/searchConteudo") ?>
				<form>
					<div class="row d-flex align-items-center">
					<div class="col-md-2">
							<label for="conteudo" class="lead">Buscar conteúdo:</label>
					</div>
					<div class="col-md-8">
							<input type="text" name="conteudo" class="form-control form-control-sm" id="conteudo" placeholder="Digite o titulo que procura..." required>
					</div>
					<div class="col-md-2">
						<button class="btn btn-dark btn-block" type="submit">Buscar</button>
					</div>
					</div>
				</form>
				<?php form_close() ?>
		</div>
									-->
</section>		

<section class="container">
		<div class="estrutura-conteudo">
			<div class="row">
				<?php if($conteudos == TRUE): ?>
				<?php foreach($conteudos as $conteudo): ?>
				<div class="col-lg-4 col-md-6 mt-4">
					<div class="card">
					<img src="<?php echo base_url("artigo_img/" . $conteudo['imagem']) ?>" alt="<?php echo $conteudo['titulo'] ?>" class="card-img-top"> <!-- img-thumbnail  img-fluid mx-auto -->
					<div class="card-body">
						<h5 class="card-title"><?php echo $conteudo['titulo']; ?></h5>
						<p class="card-text estrutura-descricao"><?php echo character_limiter($conteudo['descricao'],50) ?></p>
						<div class="estrutura-card">
						<a href="<?php echo base_url("blog/conteudo/") . $conteudo['id'] ?>" class="btn btn-dark">Vizualizar</a>
						<p class="data"><?php echo formataData($conteudo['create']) ?></p>
						</div>
					</div>
					</div>
				</div>
				<?php endforeach ?>
				<?php else: ?>
					<p class="lead conteudo-erro">CONTEÚDO NÃO ENCONTRADO !!!</p>
				<?php endif ?>
			</div>
	
			<?php if($pagination == TRUE): ?>
			<?php echo $pagination ?>
			<?php endif ?>
			
		</div>
</section>