<?php $counter = 1; ?>
<div class="container">
    <h1 class="text-center">Quiz</h1>
    <div class="mt-3"></div>
    <div class="d-flex w-100 justify-content-end">
        <p>Tempo rimanente: <span id="remainingTime" data-url="<?php echo URL; ?>"></span></p>
    </div>
    <div class="mt-3"></div>
    <table class="table">
        <?php for ($i = 0; $i < 5; $i++): ?>
            <tr>
                <?php for ($j = 0; $j < 10; $j++): ?>
                    <td>
                        <?php if ($counter == $this->id): ?>
                            <a href="<?php echo URL . "quiz/game/" . $counter; ?>" class="btn btn-primary">
                                <?php echo $counter; ?>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo URL . "quiz/game/" . $counter; ?>" class="btn btn-light">
                                <?php echo $counter; ?>
                            </a>
                        <?php endif; $counter++ ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</div>