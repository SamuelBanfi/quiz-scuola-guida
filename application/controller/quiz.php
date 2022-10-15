<?php


class Quiz
{
    public function index()
    {
		require "application/views/templates/header.php";
        require "application/views/quiz/index.php";
        require "application/views/templates/footer.php";
    }

    public function start()
    {
        require "application/views/templates/header.php";
        require "application/views/quiz/quiz.php";
        require "application/views/templates/footer.php";
    }
}
