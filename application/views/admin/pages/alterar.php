<section class="container">
    <div class="admin-cadastrar mt-5">
        <?php echo form_open("admin/alterarConteudo"); ?>
        <form>
            <h2 class="text-center h3">Alterar Contéudo</h2>
            <p class="lead alert-warning text-center"><?php echo $this->session->flashdata("mensagem"); ?></p>
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $conteudo['titulo'] ?>">
            <?php echo form_error("titulo") ?>
        </div>

        <div class="form-group">
            <label for="categoria">Categoria</label>
            <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo $conteudo['categoria'] ?>">
            <?php echo form_error("categoria") ?>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" rows="3" name="descricao"><?php echo $conteudo['descricao']?></textarea>
        </div>

        <input type="hidden" id="<?= $conteudo['id'] ?>" name="hidden_id" value="<?= $conteudo['id']?>">
        <button type="submit" name="alterar" class="btn btn-dark">Alterar Conteúdo</button>

        </form>
        <?php echo form_close(); ?>
    </div>
</section>