<?php


class Quiz
{
    public function index() {
        require "application/models/User.php";

        session_start();

        if ($this->is_logged()) {
            require "application/views/templates/header.php";
            require "application/views/quiz/index.php";
            require "application/views/templates/footer.php";
        } else {
            header("location: " . URL);
        }
    }

    public function start() {
        session_start();

        if ($this->is_logged()) {
            require "application/views/templates/header.php";
            require "application/views/quiz/questions.php";
            require "application/views/templates/footer.php";
        } else {
            header("location: " . URL);
        }
    }

    private function is_logged() {
        return isset($_SESSION["user"]);
    }
}
