<?php


class Quiz extends Controller
{
    public function index() {
        require_once "application/models/User.php";

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
        require_once 'application/models/User.php';

        if(!isset($_SESSION)){
            session_start();
        }

        if ($this->is_logged()) {
            require_once 'application/models/User.php';
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
        require_once 'application/models/User.php';
        require_once 'application/models/Question.php';

        if(!isset($_SESSION)){
            session_start();
        }

        if ($this->is_logged()) {
            if (!isset($_SESSION["questions"])) {
                header("location: " . URL);   
            }

            $id = $id == null ? 1 : $id;
            $id = $id < 1 ? 1 : $id;
            $id = $id > 50 ? 50 : $id;

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

    public function stop() {
        require_once 'application/models/User.php';
        require_once 'application/models/Question.php';
        require_once 'application/models/QuestionManager.php';

        if (!isset($_SESSION)) {
            session_start();
        }

        if ($this->is_logged()) {
            if ($_SESSION["questions"] == null) {
                header("location: " . URL);
            }
    
            $this->view->questions = $_SESSION["questions"];
            $this->view->answers = $_SESSION["answ"];
            $this->view->limit_errors = QuestionManager::get_limit_errors();
            $this->view->count_correct_answers = $this->get_count_correct_answers();
            $this->view->has_passed_exam = $this->has_passed_exam();
    
            $this->view->render("quiz/game/report");
        } else {
            header("location: " . URL);
        }
    }

    public function set_question() {
        require_once 'application/models/User.php';
        require_once 'application/models/Question.php';
        require_once 'application/models/QuestionManager.php';

        if (!isset($_SESSION)) {
            session_start();
        }

        QuestionManager::set_answer($_POST['qid'] - 1, $_POST['aid']);
    }

    private function get_count_correct_answers() {
        require_once 'application/models/User.php';
        require_once 'application/models/Question.php';
        require_once 'application/models/QuestionManager.php';

        if (!isset($_SESSION)) {
            session_start();
        }

        $count = 0;
        $questions = $_SESSION["questions"];
        $answers = $_SESSION["answ"];

        for ($i = 0; $i < 50; $i++) {
            if ($questions[$i]->get_correct_answer() == $answers[$i]) {
                $count++;
            }
        }

        return $count;
    }

    private function has_passed_exam() {
        require_once 'application/models/User.php';
        require_once 'application/models/Question.php';
        require_once 'application/models/QuestionManager.php';

        if (!isset($_SESSION)) {
            session_start();
        }

        $limit_errors = QuestionManager::get_limit_errors();

        if ($limit_errors == -1) {
            return false;
        } else {
            $count_errors = 50 - $this->get_count_correct_answers();
            return $count_errors <= $limit_errors;
        }
    }

    private function is_logged() {
        return isset($_SESSION["user"]);
    }
}
