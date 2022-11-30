<?php

$name = $_SESSION["user"]->get_name();
$surname = $_SESSION["user"]->get_surname();

?>
<div class="container">
    <h1>Benvenuto, <?php echo $name . " " . $surname ?></h1>
    <h1>Inizia il quiz!</h1>
    <div class="mt-5"></div>
    <a href="<?php echo URL . "quiz/start" ?>" class="btn btn-success">INIZIA</a>
    <br>
    <?php if (isset($_SESSION["error_question_count"])): ?>
        <br>
        <div class="alert alert-danger" role="alert">
            Attenzione! Numero di domande insufficiente!
        </div>
    <?php endif; ?>
</div>