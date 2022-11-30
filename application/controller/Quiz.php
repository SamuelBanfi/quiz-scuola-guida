<?php


class Quiz extends Controller
{
    public function index() {
        require "application/models/User.php";

        session_start();

        if ($this->is_logged()) {
            $this->view->render("templates/header", true);
            $this->view->render("quiz/index", true);
            $this->view->render("templates/footer", true);
        } else {
            header("location: " . URL);
        }
    }

    public function start() {
        session_start();

        if ($this->is_logged()) {
            require_once 'application/models/QuestionManager.php';

            if (QuestionManager::get_count_questions()[0][0] < 50) {
                $_SESSION['error_question_count'] = true;
                header("location: " . URL);
            }

            $_SESSION["questions"] = QuestionManager::get_all_questions();
            unset($_SESSION["error_question_count"]);
            
            $this->game(1);
        }
    }

    public function game($id) {
        if(!isset($_SESSION)){
            session_start();
        }

        if ($this->is_logged()) {
            if (!isset($_SESSION["questions"])) {
                header("location: " . URL);   
            }

            if ($id < 0 || $id > 50) {
                header("location: " . URL);
            }

            $this->view->id = $id;
            $this->view->question = $_SESSION["questions"][$id - 1];

            $this->view->render("templates/header", true);
            $this->view->render("quiz/game/questions", true);
            $this->view->render("quiz/game/question", true);
            $this->view->render("templates/footer", true);
        } else {
            header("location: " . URL);
        }
    }

    private function is_logged() {
        return isset($_SESSION["user"]);
    }
}
