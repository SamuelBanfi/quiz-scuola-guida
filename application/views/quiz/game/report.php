<div class="container">
    <h1 class="text-center">Risultati</h1>
    <div class="mt-3"></div>
    <div class="d-flex justify-content-evenly">
        <div>
            <h3>
                Risultato:
                <?php if ($this->has_passed_exam): ?>
                    <span style="color:green">promosso</span>
                <?php else: ?>
                    <span style="color:red">bocciato</span>
                <?php endif; ?>
                </h3>
        </div>
        <div>
            <h3>Limite errori: <?php echo $this->limit_errors; ?></h3>
        </div>
        <div>
            <h3>Corrette: <?php echo $this->count_correct_answers; ?> / 50 domande</h3>
        </div>
    </div>
    <div class="mt-3"></div>
    <table class="table table-striped">
        <tr>
            <th>Domanda</th>
            <th>Risposta corretta</th>
            <th>Risposta data</th>
            <th>Esatta</th>
        </tr>
        <?php for ($i = 0; $i < count($this->questions); $i++): ?>
            <tr>
                <td>
                    <div class="form-control">
                        <?php echo $this->questions[$i]->get_question(); ?>
                    </div>
                </td>
                <td>
                    <p>
                        <?php 
                            switch ($this->questions[$i]->get_correct_answer()) {
                                case 1:
                                    echo $this->questions[$i]->get_answer_1();
                                    break;
                                case 2:
                                    echo $this->questions[$i]->get_answer_2();
                                    break;
                                case 3:
                                    echo $this->questions[$i]->get_answer_3();
                                    break;
                            }
                        ?>
                    </p>
                </td>
                <td>
                    <p>
                        <?php 
                            switch ($this->answers[$i]) {
                                case 1:
                                    echo $this->questions[$i]->get_answer_1();
                                    break;
                                case 2:
                                    echo $this->questions[$i]->get_answer_2();
                                    break;
                                case 3:
                                    echo $this->questions[$i]->get_answer_3();
                                    break;
                                case -1:
                                    echo "Nessuna risposta";
                                    break;
                            }
                        ?>
                    </p>
                </td>
                <td>
                    <?php if ($this->questions[$i]->get_correct_answer() == $this->answers[$i]): ?>
                        <p style="color: green">Si</p>
                    <?php else: ?>
                        <p style="color: red">No</p>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endfor; ?>
    </table>
    <div class="mt-3"></div>
    <div class="d-flex justify-content-center">
        <a href="<?php echo URL; ?>quiz/start" class="btn btn-primary">Ricomincia</a>
    </div>
</div>