<?php

$name = $_SESSION["user"]->get_name();
$surname = $_SESSION["user"]->get_surname();

?>
<div class="container">
    <h1>Benvenuto, <?php echo $name . " " . $surname ?></h1>
    <h1>Inizia il quiz!</h1>
</div>