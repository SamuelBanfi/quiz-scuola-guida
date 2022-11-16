<?php


class Admin extends Controller
{
    function __construct() {
        parent::__construct();
    }

    public function index() {
		$this->users();
    }

    public function users() {
        require "application/models/UserManager.php";
        require_once "application/models/User.php";

        session_start();

        if (isset($_SESSION["delete_user_successful"])) {
            unset($_SESSION["delete_user_successful"]);
        }

        if (isset($_SESSION["delete_user_fail"])) {
            unset($_SESSION["delete_user_fail"]);
        }

        $this->view->users = UserManager::get_all_users();

        if ($this->is_admin()) {
            $this->view->render("templates/header", true);
            $this->view->render("admin/index", true);
            $this->view->render("admin/users/index", true);
            $this->view->render("templates/footer", true);
        } else {
            header("location: " . URL);
        }
    }

    public function settings() {
        require_once "application/models/User.php";

        session_start();

        if ($this->is_admin()) {
            $this->view->render("templates/header", true);
            $this->view->render("admin/index", true);
            $this->view->render("admin/quiz/index", true);
            $this->view->render("templates/footer", true);
        } else {
            header("location: " . URL);
        }
    }

    public function questions() {
        require_once "application/models/User.php";

        session_start();

        if ($this->is_admin()) {
            $this->view->render("templates/header", true);
            $this->view->render("admin/index", true);
            $this->view->render("admin/questions/index", true);
            $this->view->render("templates/footer", true);
        } else {
            header("location: " . URL);
        }
    }

    public function newquestion() {
        require_once "application/models/Question.php";

        session_start();

        if ($this->is_admin()) {
            if (isset($_SESSION["create_question_successful"])) {
                unset($_SESSION["create_question_successful"]);
            }

            if (isset($_SESSION["create_question_fail"])) {
                unset($_SESSION["create_question_fail"]);
            }

            $this->view->render("templates/header", true);
            $this->view->render("admin/index", true);
            $this->view->render("admin/questions/new_question", true);
            $this->view->render("templates/footer", true);
        } else {
            header("location: " . URL);
        }
    }

    public function register() {
        require_once "application/models/User.php";

        session_start();

        if ($this->is_admin()) {
            if (isset($_SESSION["create_user_successful"])) {
                unset($_SESSION["create_user_successful"]);
            }

            if (isset($_SESSION["create_user_fail"])) {
                unset($_SESSION["create_user_fail"]);
            }

            $this->view->render("templates/header", true);
            $this->view->render("admin/index", true);
            $this->view->render("admin/users/register", true);
            $this->view->render("templates/footer", true);
        } else {
            header("location: " . URL);
        }
    }

    public function add_user() {
        require "application/models/UserManager.php";
        require_once "application/models/User.php";

        session_start();

        if ($this->is_admin()) {
            $email = $_POST["email"];
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $password = $_POST["password"];
            $admin = $_POST["admin"];

            if (UserManager::add($email, $name, $surname, $password, $admin)) {
                $_SESSION["create_user_successful"] = true;

                if (isset($_SESSION["create_user_fail"])) {
                    unset($_SESSION["create_user_fail"]);
                }
            } else {
                $_SESSION["create_user_fail"] = true;

                if (isset($_SESSION["create_user_successful"])) {
                    unset($_SESSION["create_user_successful"]);
                }
            }

            $this->view->render("templates/header", true);
            $this->view->render("admin/index", true);
            $this->view->render("admin/users/register", true);
            $this->view->render("templates/footer", true);
        } else {
            header("location: " . URL);
        }
    }

    public function edit_user($email) {
        require "application/models/UserManager.php";
        require_once "application/models/User.php";

        session_start();

        if ($this->is_admin()) {
            if (isset($_SESSION["update_user_successful"])) {
                unset($_SESSION["update_user_successful"]);
            }

            if (isset($_SESSION["update_user_fail"])) {
                unset($_SESSION["update_user_fail"]);
            }

            $user = UserManager::get_user($email);

            $this->view->render("templates/header", true);
            $this->view->render("admin/index", true);
            $this->view->render("admin/users/edit", true);
            $this->view->render("templates/footer", true);
        }
    }

    // TODO: Finire i controlli per l'update dell'utente.
    public function update_user() {
        require "application/models/UserManager.php";
        require_once "application/models/User.php";

        session_start();

        if ($this->is_admin()) {
            $email = $_POST["email"];
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $new_password = $_POST["new_password"];
            $chk_password = $_POST["chk_password"];

            if (strcmp($new_password, $chk_password) == 0) {
                if (UserManager::update($email, $name, $surname, $new_password)) {
                    $_SESSION["update_user_successful"] = true;

                    if (isset($_SESSION["update_user_fail"])) {
                        unset($_SESSION["update_user_fail"]);
                    }
                } else {
                    $_SESSION["update_user_fail"] = true;

                    if (isset($_SESSION["update_user_successful"])) {
                        unset($_SESSION["update_user_successful"]);
                    }
                }
            } else {
                $_SESSION["update_user_fail"] = true;

                if (isset($_SESSION["update_user_successful"])) {
                    unset($_SESSION["update_user_successful"]);
                }
            }

            $user = UserManager::get_user($email);

            $this->view->render("templates/header", true);
            $this->view->render("admin/index", true);
            $this->view->render("admin/users/edit", true);
            $this->view->render("templates/footer", true);
        } else {
            header("location: " . URL);
        }
    }

    public function delete_user($email) {
        require "application/models/UserManager.php";
        require_once "application/models/User.php";

        session_start();

        if (strcmp($email, $_SESSION['user']->get_email()) != 0) {
            if ($this->is_admin()) {
                if (UserManager::delete($email)) {
                    $_SESSION["delete_user_successful"] = true;
    
                    if (isset($_SESSION["delete_user_fail"])) {
                        unset($_SESSION["delete_user_fail"]);
                    }
                } else {
                    $_SESSION["delete_user_fail"] = true;
    
                    if (isset($_SESSION["delete_user_successful"])) {
                        unset($_SESSION["delete_user_successful"]);
                    }
                }
    
                $this->view->users = UserManager::get_all_users();
    
                $this->view->render("templates/header", true);
                $this->view->render("admin/index", true);
                $this->view->render("admin/users/index", true);
                $this->view->render("templates/footer", true);
            } else {
                header("location: " . URL);
            }
        }else{
            header("location: " . URL);
        }
    }

    private function is_admin()
    {
        if (isset($_SESSION["user"])) {
            return strcmp($_SESSION["user"]->get_admin(), "1") == 0;
        } else {
            return false;
        }
    }
}
