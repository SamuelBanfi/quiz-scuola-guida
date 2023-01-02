<div class="container">
    <h1 class="text-center">Modifica utente</h1>
    <div class="mt-3"></div>
    <form action="<?php echo URL . "admin/update_user" ?>" method="post" class="form-control p-3">
        <input type="hidden" id="email" name="email" value="<?php echo $this->user->get_email(); ?>">
        <label for="email" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $this->user->get_name(); ?>" required>
        <br>
        <label for="email" class="form-label">Cognome</label>
        <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $this->user->get_surname(); ?>" required>
        <br>
        <label for="email" class="form-label">E-Mail</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $this->user->get_email(); ?>" disabled>
        <br>
        <label for="newPassword" class="form-label">Nuova password</label>
        <input type="password" class="form-control" id="newPassword" name="new_password">
        <br>
        <label for="chkPassword" class="form-label">Conferma password</label>
        <input type="password" class="form-control" id="chkPassword" name="chk_password">
        <br>
        <div class="d-flex justify-content-center">
            <input type="submit" value="MODIFICA" class="btn btn-success ps-5 pe-5">
        </div>
</form>
    <?php if (isset($_SESSION["update_user_successful"])): ?>
        <div class="alert alert-success" role="alert">
            Utente modificato con successo
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION["update_user_fail"])): ?>
        <div class="alert alert-danger" role="alert">
            Attenzione! Modifica utente fallita
        </div>
    <?php endif; ?>
</div>