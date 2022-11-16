<?php


class Home extends Controller
{
    function __construct() {
        parent::__construct();
    }

    public function index() {
        session_start();

        if ($this->is_logged()) {
            header("location: " . URL . "quiz");
        } else {
            $this->view->render("login/index");
        }
    }

    public function login() {
        require "application/models/UserManager.php";

        session_start();

        if ($this->is_logged()) {
            header("location: " . URL . "quiz");
        } else {
            $email = $_POST["email"];
            $password = $_POST["password"];

            if (!UserManager::check_login($email, $password)) {
                $_SESSION["login_error"] = true;

                $this->view->render("login/index");
            } else {
                if (isset($_SESSION["login_error"])) {
                    unset($_SESSION["login_error"]);
                }

                $user = UserManager::get_user($email);
                $_SESSION["user"] = $user;

                header("location: " . URL . "quiz");
            }
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();

        header("location: " . URL);
    }

    private function is_logged() {
        return isset($_SESSION["user"]);
    }
}
