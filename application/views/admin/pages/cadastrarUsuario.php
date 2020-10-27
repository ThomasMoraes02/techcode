<section class="container">
    <div class="admin-cadastrar mt-5">
        <?php echo form_open_multipart("admin/cadastrarUsuario"); ?>
        <form>
            <h2 class="text-center h3">Cadastrar Usuário</h2>
            <p class="lead alert-warning text-center"><?php echo $this->session->flashdata("mensagem"); ?></p>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo set_value("nome") ?>">
            <?php echo form_error("nome") ?>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value("email") ?>">
            <?php echo form_error("email") ?>
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" value="<?php echo set_value("senha") ?>">
            <?php echo form_error("senha") ?>
        </div>

        <button type="submit" class="btn btn-dark">Cadastrar Usuário</button>
        </form>
        <?php echo form_close(); ?>
    </div>
</section>