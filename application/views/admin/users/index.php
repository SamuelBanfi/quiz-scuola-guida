<div class="container">
    <div class="mt-3"></div>
    <h1 class="text-center">Utenti</h1>
    <div class="mt-3"></div>
    <a href="<?php echo URL . "admin/register"; ?>" class="btn btn-success">NUOVO UTENTE</a>
    <div class="mt-3"></div>
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
        <?php foreach ($users as $key => $user): ?>
            <tr>
                <td><?php echo $user->get_name(); ?></td>
                <td><?php echo $user->get_surname(); ?></td>
                <td><a href="mailto:<?php echo $user->get_email(); ?>"><?php echo $user->get_email(); ?></a></td>
                <td>
                    <a href="<?php echo URL . "admin/edit/" . $user->get_email(); ?>" class="btn btn-warning">
                        MODIFICA
                    </a>
                </td>
                <td>
                    <a href="<?php echo URL . "admin/edit/" . $user->get_email(); ?>" class="btn btn-danger">
                        ELIMINA
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>