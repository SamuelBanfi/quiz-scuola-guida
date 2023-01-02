<div class="container">
    <h1 class="text-center">Modifica domanda</h1>
    <div class="mt-3"></div>
    <form action="<?php echo URL . "admin/update_question" ?>" method="post" enctype="multipart/form-data" class="form-control p-3">
        <input type="hidden" name="id" value="<?php echo $this->question->get_id(); ?>">
        <label for="question" class="form-label">Domanda</label>
        <textarea class="form-control" id="question" name="question">
            <?php echo $this->question->get_question(); ?>
        </textarea>
        <br>
        <label for="image" class="form-label">Immagine</label>
        <input type="file" class="form-control" id="image" name="image" required>
        <br>
        <label for="answer_1" class="form-label">Risposta 1</label>
        <input type="text" class="form-control" id="answer_1" name="answer_1"
               value="<?php echo $this->question->get_answer_1(); ?>" required>
        <br>
        <label for="answer_2" class="form-label">Risposta 2</label>
        <input type="text" class="form-control" id="answer_2" name="answer_2"
               value="<?php echo $this->question->get_answer_2(); ?>" required>
        <br>
        <label for="answer_3" class="form-label">Risposta 3</label>
        <input type="text" class="form-control" id="answer_3" name="answer_3"
               value="<?php echo $this->question->get_answer_3(); ?>" required>
        <br>
        <label for="correct_answer" class="form-label">Risposta corretta</label>
        <input type="number" class="form-control" id="correct_answer" name="correct_answer"
               value="<?php echo $this->question->get_correct_answer(); ?>" required>
        <br>
        <label for="textual_explanation" class="form-label">Spigazione testuale</label>
        <input type="file" class="form-control" id="textual_explanation" name="textual_explanation" required>
        <br>
        <label for="video_explanation" class="form-label">Spigazione video</label>
        <input type="file" class="form-control" id="video_explanation" name="video_explanation" required>
        <br>
        <div class="d-flex justify-content-center">
            <input type="submit" value="MODIFICA" class="btn btn-success ps-5 pe-5">
        </div>
    </form>
    <?php if (isset($_SESSION["update_question_successful"])): ?>
        <div class="alert alert-success" role="alert">
            Domanda modificata con successo
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION["update_question_fail"])): ?>
        <div class="alert alert-danger" role="alert">
            Attenzione! Modifica domanda fallita
        </div>
    <?php endif; ?>
</div>