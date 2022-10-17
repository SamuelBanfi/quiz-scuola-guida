<?php


class Admin
{
    public function index() {
		$this->users();
    }

    public function users() {
        require "application/models/UserManager.php";
        require_once "application/models/User.php";

        session_start();

        $users = UserManager::get_all_users();

        if ($this->is_admin()) {
            require "application/views/templates/header.php";
            require "application/views/admin/index.php";
            require "application/views/admin/users/index.php";
            require "application/views/templates/footer.php";
        } else {
            header("location: " . URL);
        }
    }

    public function settings() {
        require_once "application/models/User.php";

        session_start();

        if ($this->is_admin()) {
            require "application/views/templates/header.php";
            require "application/views/admin/index.php";
            require "application/views/admin/quiz/index.php";
            require "application/views/templates/footer.php";
        } else {
            header("location: " . URL);
        }
    }

    public function register() {
        require_once "application/models/User.php";

        session_start();

        if ($this->is_admin()) {
            if (isset($_SESSION["create_user_successfull"])) {
                unset($_SESSION["create_user_successfull"]);
            }

            if (isset($_SESSION["create_user_fail"])) {
                unset($_SESSION["create_user_fail"]);
            }

            require "application/views/templates/header.php";
            require "application/views/admin/index.php";
            require "application/views/admin/users/register.php";
            require "application/views/templates/footer.php";
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
                $_SESSION["create_user_successfull"] = true;

                if (isset($_SESSION["create_user_fail"])) {
                    unset($_SESSION["create_user_fail"]);
                }
            } else {
                $_SESSION["create_user_fail"] = true;

                if (isset($_SESSION["create_user_successfull"])) {
                    unset($_SESSION["create_user_successfull"]);
                }
            }

            require "application/views/templates/header.php";
            require "application/views/admin/index.php";
            require "application/views/admin/users/register.php";
            require "application/views/templates/footer.php";
        } else {
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
