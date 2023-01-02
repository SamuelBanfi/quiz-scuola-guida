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
        <?php $lap = 1; ?>
        <?php foreach ($this->questions as $key => $question): ?>
            <tr>
                <td><textarea class="form-control" disabled><?php echo $question->get_question(); ?></textarea></td>
                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showImage<?php echo $lap; ?>">Visualizza</button>
                <div class="modal fade" id="showImage<?php echo $lap; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Image explanation</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="<?php echo URL . $question->get_image(); ?>" class="img-fluid">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div></td>
                <td><?php echo $question->get_answer_1(); ?></td>
                <td><?php echo $question->get_answer_2(); ?></td>
                <td><?php echo $question->get_answer_3(); ?></td>
                <td><?php echo $question->get_correct_answer(); ?></td>
                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showTextual<?php echo $lap; ?>">Visualizza</button>
                <div class="modal fade" id="showTextual<?php echo $lap; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Textual explanation</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php echo file_get_contents(URL . $question->get_textual_explanation()); ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                </td>

                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showVideo<?php echo $lap; ?>">Visualizza</button>
                <div class="modal fade" id="showVideo<?php echo $lap; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Video explanation</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-center">
                                    <video class="" width="95%" controls>
                                        <source src="<?php echo URL . $question->get_video_explanation(); ?>" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                </td>
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
            <?php $lap++; ?>
        <?php endforeach; ?>
        </tbody>
    </table>

<!--
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>-->