<div class="container">
    <h1 class="text-center">Login</h1>
    <div class="mt-3"></div>
    <form action="<?php echo URL . "home/login"; ?>" method="post" class="form-control p-3">
        <label for="email" class="form-label">E-Mail</label>
        <input type="email" class="form-control" id="email" name="email" required>
        <br>
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
        <br>
        <div class="d-flex justify-content-center">
            <input type="submit" value="ACCEDI" class="btn btn-success ps-5 pe-5">
        </div>
    </form>
    <?php if (isset($_SESSION["login_error"])): ?>
        <div class="alert alert-danger" role="alert">
            Accesso fallito! Nome utente o password non corretti
        </div>
    <?php endif; ?>
</div>