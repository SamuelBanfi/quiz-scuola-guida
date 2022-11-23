<div class="container">
    <div class="mt-3"></div>
    <h1 class="text-center">Domande</h1>
    <div class="mt-3"></div>
    <a href="<?php echo URL . "admin/newquestion"; ?>" class="btn btn-success">NUOVA DOMANDA</a>
    <div class="mt-3"></div>
    <?php if (isset($_SESSION["delete_question_successful"])): ?>
        <div class="alert alert-success" role="alert">
            Domanda eliminata con successo
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION["delete_question_fail"])): ?>
        <div class="alert alert-danger" role="alert">
            Attenzione! Eliminazione domanda fallita
        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
        <tr>
            <th>Domanda</th>
            <th>Immagine</th>
            <th>Risposta 1</th>
            <th>Risposta 2</th>
            <th>Risposta 3</th>
            <th>Risposta corretta</th>
            <th>Spiegazione testuale</th>
            <th>Spiegazione video</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($this->questions as $key => $question): ?>
            <tr>
                <td><textarea class="form-control" disabled><?php echo $question->get_question(); ?></textarea></td>
                <td><a href="<?php echo URL . $question->get_image(); ?>">Visualizza</a></td>
                <td><?php echo $question->get_answer_1(); ?></td>
                <td><?php echo $question->get_answer_2(); ?></td>
                <td><?php echo $question->get_answer_3(); ?></td>
                <td><?php echo $question->get_correct_answer(); ?></td>
                <td><a href="<?php echo URL . $question->get_textual_explanation(); ?>">Visualizza</a></td>
                <td><a href="<?php echo URL . $question->get_video_explanation(); ?>">Visualizza</a></td>
                <td>
                    <a href="<?php echo URL . "admin/edit_question/" . $question->get_id(); ?>" class="btn btn-warning">
                        MODIFICA
                    </a>
                </td>
                <td>
                    <a href="<?php echo URL . "admin/delete_question/" . $question->get_id(); ?>" class="btn btn-danger">
                        ELIMINA
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>