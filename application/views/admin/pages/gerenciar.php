<section class="container">
    <div class="admin-cadastrar mt-5">
        <?php echo form_open("admin/gerenciarUsuario"); ?>
        <form>
            <h2 class="text-center h3">Alterar dados de usuário</h2>
            <p class="lead alert-warning text-center"><?php echo $this->session->flashdata("mensagem"); ?></p>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $this->session->userdata("usuario")['nome'] ?>">
            <?php echo form_error("nome") ?>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $this->session->userdata("usuario")['email'] ?>">
            <?php echo form_error("email") ?>
        </div>

        <div class="form-group">
        <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" value="">
            <?php echo form_error("senha") ?>
        </div>

        <input type="hidden" id="<?= $this->session->userdata("usuario")['id'] ?>" name="hidden_id" value="<?= $this->session->userdata("usuario")['id']?>">
        <button type="submit" name="alterar" class="btn btn-dark">Alterar cadastro</button>

        </form>
        <?php echo form_close(); ?>
    </div>
</section>