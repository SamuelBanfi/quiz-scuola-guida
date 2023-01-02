<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz scuola guida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="<?php echo URL; ?>application/public/js/question.js"></script>
</head>
<body>
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="<?php echo URL; ?>" class="d-flex align-items-center me-md-auto text-dark text-decoration-none">
        <span class="fs-4">Quiz scuola guida</span>
    </a>
    <ul class="nav nav-pills">
        <?php if (isset($_SESSION['user'])): ?>
            <li class="nav-item"><a href="<?php echo URL; ?>" class="nav-link">Quiz</a></li>
            <?php if ($_SESSION['user']->get_admin() == 1): ?>
                <li class="nav-item"><a href="<?php echo URL . "admin"; ?>" class="nav-link">Admin</a></li>
            <?php endif; ?>
            <li class="nav-item"><a href="<?php echo URL . "home/logout"; ?>" class="nav-link">Logout</a></li>
        <?php endif; ?>
    </ul>
</header>
<div class="mt-3"></div>