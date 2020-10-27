<section class="container">

    <div class="admin-cadastrar mt-5">
        <?php echo form_open_multipart("admin/cadastrarConteudo"); ?>
        <form>
            <h2 class="text-center h3">Cadastrar Contéudo</h2>
            <p class="lead alert-warning text-center rounded"><?php echo $this->session->flashdata("mensagem"); ?></p>
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo set_value("titulo") ?>">
            <?php echo form_error("titulo") ?>
        </div>

        <div class="form-group">
            <label for="categoria">Categoria</label>
            <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo set_value("categoria") ?>">
            <?php echo form_error("categoria") ?>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" rows="3" name="descricao"><?php echo set_value("descricao") ?></textarea>
            <?php echo form_error("descricao") ?>
        </div>

        <div class="form-group mt-2">
            <label>Insira uma imagem para capa do artigo</label>
            <input type="file" name="imagem" id="imagem" class="mt-4">
        </div>

        <button type="submit" class="btn btn-dark mt-4">Cadastrar Conteúdo</button>
        </form>
        <?php echo form_close(); ?>
    </div>
</section>