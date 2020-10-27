<section class="container">
        <div class="admin-login">
        <h1 class="text-center mt-3">Admin</h1>
        <p class="lead alert-danger text-center mt-3 rounded"><?php echo $this->session->flashdata("usuarioInvalido"); ?></p>
        <?php echo form_open("admin/admin"); ?>
        <form>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value("email") ?>" placeholder="email@dominio.com">
            <?php echo form_error("email") ?>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" value="<?php echo set_value("senha") ?>">
            <?php echo form_error("senha") ?>
        </div>
        <button type="submit" class="btn btn-dark">Acessar</button>
        </form>
        <?php echo form_close(); ?>
        </div>
</section>
