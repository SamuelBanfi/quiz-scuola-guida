<?php


class Admin extends Controller
{
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

    public function questions() {
        require_once "application/models/User.php";

        session_start();

        if ($this->is_admin()) {
            require "application/views/templates/header.php";
            require "application/views/admin/index.php";
            require "application/views/admin/questions/index.php";
            require "application/views/templates/footer.php";
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

            require "application/views/templates/header.php";
            require "application/views/admin/index.php";
            require "application/views/admin/users/register.php";
            require "application/views/templates/footer.php";
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

            require "application/views/templates/header.php";
            require "application/views/admin/index.php";
            require "application/views/admin/users/edit.php";
            require "application/views/templates/footer.php";
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

            require "application/views/templates/header.php";
            require "application/views/admin/index.php";
            require "application/views/admin/users/edit.php";
            require "application/views/templates/footer.php";
        } else {
            header("location: " . URL);
        }
    }

    public function delete_user($email) {
        require "application/models/UserManager.php";
        require_once "application/models/User.php";

        session_start();

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

            $users = UserManager::get_all_users();

            require "application/views/templates/header.php";
            require "application/views/admin/index.php";
            require "application/views/admin/users/index.php";
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
