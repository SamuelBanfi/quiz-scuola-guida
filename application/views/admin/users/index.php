<div class="container">
    <div class="mt-3"></div>
    <h1 class="text-center">Utenti</h1>
    <div class="mt-3"></div>
    <a href="<?php echo URL . "admin/register"; ?>" class="btn btn-success">NUOVO UTENTE</a>
    <div class="mt-3"></div>
    <?php if (isset($_SESSION["delete_user_successful"])): ?>
        <div class="alert alert-success" role="alert">
            Utente eliminato con successo
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION["delete_user_fail"])): ?>
        <div class="alert alert-danger" role="alert">
            Attenzione! Eliminazione utente fallita
        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>E-Mail</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($this->users as $key => $user): ?>
            <tr>
                <td><?php echo $user->get_name(); ?></td>
                <td><?php echo $user->get_surname(); ?></td>
                <td><a href="mailto:<?php echo $user->get_email(); ?>"><?php echo $user->get_email(); ?></a></td>
                <td>
                    <a href="<?php echo URL . "admin/edit_user/" . $user->get_email(); ?>" class="btn btn-warning">
                        MODIFICA
                    </a>
                </td>
                <td>
                    <?php if (strcmp($user->get_email(), $_SESSION['user']->get_email()) != 0): ?>
                        <a href="<?php echo URL . "admin/delete_user/" . $user->get_email(); ?>" class="btn btn-danger">
                            ELIMINA
                        </a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>