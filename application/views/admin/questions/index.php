<div class="container">
    <div class="mt-3"></div>
    <h1 class="text-center">Domande</h1>
    <div class="mt-3"></div>
    <a href="<?php echo URL . "admin/newquestion"; ?>" class="btn btn-success">NUOVA DOMANDA</a>
    <div class="mt-3"></div>
    <table class="table">
        <thead>
        <tr>
            <th>Domanda</th>
            <th>Spiegazione testo</th>
            <th>Spiegazione video</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($this->questions as $key => $question): ?>
            <tr>
                <td><?php echo $user->get_name(); ?></td>
                <td><?php echo $user->get_surname(); ?></td>
                <td><a href="mailto:<?php echo $user->get_email(); ?>"><?php echo $user->get_email(); ?></a></td>
                <td>
                    <a href="<?php echo URL . "admin/editquestion/" . $user->get_id(); ?>" class="btn btn-warning">
                        MODIFICA
                    </a>
                </td>
                <td>
                    <a href="<?php echo URL . "admin/deletequestion/" . $user->get_id(); ?>" class="btn btn-danger">
                        ELIMINA
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>