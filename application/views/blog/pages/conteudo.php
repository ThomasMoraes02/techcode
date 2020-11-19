<section class="container">
        <div class="conteudo mt-4">
            <div class="row">
            <div class="col-md-4 text-center">
                    <p class="conteudo-titulo"><?php echo $conteudo['titulo'] ?></p>
                    <span>Categoria: <?php echo $conteudo['categoria'] ?></span> </br>
                    <?php if($conteudo['imagem'] == TRUE): ?>
                        <img src="<?php echo base_url("artigo_img/" . $conteudo['imagem']) ?>" alt="<?php echo $conteudo['titulo'] ?>" class="img-thumbnail img-fluid">
                    <?php endif ?>
            </div>
            <div class="col-md-8">
                    <p class="lead"><?php echo nl2br_except_pre(auto_typography($conteudo['descricao'], TRUE)) ?></p>
                    <p class="lead text-center p-5">Thomas Moraes - <?php echo formataData($conteudo['create']) ?></p>
            </div>
            </div>
        </div>
        <a href="<?php echo base_url("")?>" class="btn btn-dark mt-4">Voltar</a>
</section>