<section class="">
		<div class="mx-auto text-center">
			<div class="slide">
				<img src="<?php echo base_url("/assets/img/png/container-black.png") ?>" alt="Galeria-Blog" class="img-fluid">
				<img src="<?php echo base_url("/assets/img/png/container-white.png") ?>" alt="Galeria-Blog" class="img-fluid">
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
				<?php endif ?>
			</div>
		</div>
</section>