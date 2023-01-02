<div class="container">
    <div class="d-flex">
        <div class="image" style="flex: 1">
            <img class="img-fluid" src="<?php echo URL . $this->question->get_image(); ?>" alt="immagine">
        </div>
        <div class="question ms-5" style="flex: 1">
            <div class="time">
                <div>
                    <div class="form-control">
                        <p><?php echo $this->question->get_question(); ?></p>
                    </div>
                    <div class="mt-3"></div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="1" name="q-1" onclick="setQuestion(this, <?php echo $this->id; ?>, '<?php echo URL; ?>/quiz/set_question')" <?php echo $_SESSION["answ"][$this->id - 1] == 1 ? "checked" : ""; ?>>
                        <label class="form-check-label" for="r1">
                            <?php echo $this->question->get_answer_1(); ?>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="2" name="q-1" onclick="setQuestion(this, <?php echo $this->id; ?>, '<?php echo URL; ?>/quiz/set_question')" <?php echo $_SESSION["answ"][$this->id - 1] == 2 ? "checked" : ""; ?>>
                        <label class="form-check-label" for="r2">
                            <?php echo $this->question->get_answer_2(); ?>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="3" name="q-1" onclick="setQuestion(this, <?php echo $this->id; ?>, '<?php echo URL; ?>/quiz/set_question')" <?php echo $_SESSION["answ"][$this->id - 1] == 3 ? "checked" : ""; ?>>
                        <label class="form-check-label" for="r3">
                            <?php echo $this->question->get_answer_3(); ?>
                        </label>
                    </div>
                </div>
                <div class="mt-3"></div>
                <p>
                    Spiegazione:
                    <a href="<?php echo URL . $this->question->get_textual_explanation(); ?>">testo</a>,
                    <a href="<?php echo URL . $this->question->get_video_explanation(); ?>">video</a>
                </p>
                <div class="mt-5"></div>
                <div class="d-flex justify-content-between">
                    <a href="<?php echo URL . "quiz/game/" . (($this->id - 1 <= 0) ? 50 : $this->id - 1); ?>" class="btn btn-dark">&larr; Precedente</a>
                    <a href="<?php echo URL . "quiz/stop"; ?>" class="btn btn-danger">&#9873; Termina &#9873;</a>
                    <a href="<?php echo URL . "quiz/game/" . (($this->id - 1 >= 49) ? 1 : $this->id + 1); ?>" class="btn btn-dark">Successivo &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</div>