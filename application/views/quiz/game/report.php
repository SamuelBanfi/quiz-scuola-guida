<div class="container">
    <h1 class="text-center">Risultati</h1>
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
                    <textarea class="form-control">
                        <?php echo $this->questions[$i]->get_question(); ?>
                    </textarea>
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
</div>