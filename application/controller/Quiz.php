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
            require_once 'application/models/Question.php';
            require_once 'application/models/QuestionManager.php';

            if (QuestionManager::get_count_questions()[0][0] < 50) {
                $_SESSION['error_question_count'] = true;
                header("location: " . URL);
            }

            $questions = QuestionManager::get_all_questions();
            shuffle($questions);
            $_SESSION["questions"] = $questions;

            $answers = array();
            for ($i = 0; $i < 50; $i++) {
                $answers[] = -1;
            }
            $_SESSION["answ"] = $answers;

            unset($_SESSION["error_question_count"]);

            $this->game(1);
        }
    }

    public function game($id) {

        require_once 'application/models/Question.php';

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

            echo "<pre>";
            //var_dump($_SESSION['answ']);
            echo "</pre>";

            $this->view->render("templates/header", true);
            $this->view->render("quiz/game/questions", true);
            $this->view->render("quiz/game/question", true);
            $this->view->render("quiz/game/changeQuestion", true);
            $this->view->render("templates/footer", true);

            
        } else {
            header("location: " . URL);
        }
    }

    public function stop() {
        require_once 'application/models/Question.php';

        if (!isset($_SESSION)) {
            session_start();
        }

        $this->view->questions = $_SESSION["questions"];
        $this->view->answers = $_SESSION["answ"];

        $this->view->render("quiz/game/report");
    }

    public function set_question() {
        require_once 'application/models/Question.php';
        require_once 'application/models/QuestionManager.php';

        if (!isset($_SESSION)) {
            session_start();
        }

        QuestionManager::set_answer($_POST['qid'] - 1, $_POST['aid']);
    }

    private function is_logged() {
        return isset($_SESSION["user"]);
    }
}
