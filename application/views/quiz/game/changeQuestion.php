<div class="container">
    <div class="d-flex justify-content-between">
        <a href="<?php echo URL . "quiz/game/" . $this->id - 1; ?>" class="btn btn-dark">Precedente</a>
        <a href="<?php echo URL . "quiz/stop"; ?>" class="btn btn-dark">Termina</a>
        <a href="<?php echo URL . "quiz/game/" . $this->id + 1; ?>" class="btn btn-dark">Successivo</a>
    </div>
</div>