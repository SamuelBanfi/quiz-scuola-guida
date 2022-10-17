<div class="container">
    <h1 class="text-center">Nuovo utente</h1>
    <div class="mt-3"></div>
    <form action="<?php echo URL . "admin/add_user" ?>" method="post" class="form-control p-3">
        <label for="email" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" required>
        <br>
        <label for="email" class="form-label">Cognome</label>
        <input type="text" class="form-control" id="surname" name="surname" required>
        <br>
        <label for="email" class="form-label">E-Mail</label>
        <input type="email" class="form-control" id="email" name="email" required>
        <br>
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
        <br>
        <label for="admin" class="form-label">Tipo</label>
        <select name="admin" id="admin" class="form-control">
            <option value="0" selected>Utente</option>
            <option value="1">Amministratore</option>
        </select>
        <br>
        <div class="d-flex justify-content-center">
            <input type="submit" value="AGGIUNGI" class="btn btn-success ps-5 pe-5">
        </div>
    </form>
    <?php if (isset($_SESSION["create_user_successfull"])): ?>
        <div class="alert alert-success" role="alert">
            Utente creato con successo
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION["create_user_fail"])): ?>
        <div class="alert alert-danger" role="alert">
            Attenzione! Creazione utente fallita
        </div>
    <?php endif; ?>
</div>