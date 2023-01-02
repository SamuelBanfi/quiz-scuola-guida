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
        require_once "application/models/SettingsManager.php";

        if (!isset($_SESSION)) {
            session_start();
        }

        if ($this->is_admin()) {
            if (isset($_SESSION["update_settings_successful"])) {
                unset($_SESSION["update_settings_successful"]);
            }

            if (isset($_SESSION["update_settings_fail"])) {
                unset($_SESSION["update_settings_fail"]);
            }

            $this->view->limit_errors = SettingsManager::get_limit_errors();
            $this->view->limit_time = SettingsManager::get_limit_time();
            $this->view->limit_access = SettingsManager::get_limit_access();

            $this->view->render("templates/header", true);
            $this->view->render("admin/index", true);
            $this->view->render("admin/quiz/index", true);
            $this->view->render("templates/footer", true);
        } else {
            header("location: " . URL);
        }
    }

    public function update_settings() {
        require_once "application/models/User.php";
        require_once "application/models/SettingsManager.php";

        if (!isset($_SESSION)) {
            session_start();
        }

        if ($this->is_admin()) {
            $limit_errors = $_POST["errors"];
            $limit_time = $_POST["time"];
            $limit_access = $_POST["access"];

            if (SettingsManager::update_settings($limit_errors, $limit_time, $limit_access)) {
                $_SESSION["update_settings_successful"] = true;

                if (isset($_SESSION["update_settings_fail"])) {
                    unset($_SESSION["update_settings_fail"]);
                }

                $this->view->limit_errors = SettingsManager::get_limit_errors();
                $this->view->limit_time = SettingsManager::get_limit_time();
                $this->view->limit_access = SettingsManager::get_limit_access();
            } else {
                $_SESSION["update_settings_fail"] = true;

                if (isset($_SESSION["update_settings_successful"])) {
                    unset($_SESSION["update_settings_successful"]);
                }

                $this->view->limit_errors = SettingsManager::get_limit_errors();
                $this->view->limit_time = SettingsManager::get_limit_time();
                $this->view->limit_access = SettingsManager::get_limit_access();
            }

            $this->view->render("templates/header", true);
            $this->view->render("admin/index", true);
            $this->view->render("admin/quiz/index", true);
            $this->view->render("templates/footer", true);
        } else {
            $_SESSION["update_settings_fail"] = true;

            if (isset($_SESSION["update_settings_successful"])) {
                unset($_SESSION["update_settings_successful"]);
            }

            $this->view->render("templates/header", true);
            $this->view->render("admin/index", true);
            $this->view->render("admin/quiz/index", true);
            $this->view->render("templates/footer", true);
        }
    }

    public function questions() {
        require_once "application/models/User.php";
        require_once "application/models/Question.php";
        require_once "application/models/QuestionManager.php";

        session_start();

        if (isset($_SESSION["delete_question_successful"])) {
            unset($_SESSION["delete_question_successful"]);
        }

        if (isset($_SESSION["delete_question_fail"])) {
            unset($_SESSION["delete_question_fail"]);
        }

        $this->view->questions = QuestionManager::get_all_questions();

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
        require_once "application/models/User.php";
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
            $this->view->render("admin/questions/add", true);
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

    public function add_question() {
        require "application/models/QuestionManager.php";
        require_once "application/models/User.php";
        require_once "application/models/Question.php";

        session_start();

        if ($this->is_admin()) {
            $question = $_POST["question"];
            $image = $_FILES["image"];
            $answer_1 = $_POST["answer_1"];
            $answer_2 = $_POST["answer_2"];
            $answer_3 = $_POST["answer_3"];
            $correct_answer = $_POST["correct_answer"];
            $textual_explanation = $_FILES["textual_explanation"];
            $video_explanation = $_FILES["video_explanation"];

            $path_image = $this->save_file($image, "application/quiz_images/");
            $path_textual = $this->save_file($textual_explanation, "application/textual_explanations/");
            $path_video = $this->save_file($video_explanation, "application/video_explanations/");

            if (QuestionManager::add($question, $path_image, $answer_1, $answer_2, $answer_3,
                $correct_answer, $path_textual, $path_video)) {
                $_SESSION["create_question_successful"] = true;

                if (isset($_SESSION["create_question_fail"])) {
                    unset($_SESSION["create_question_fail"]);
                }
            } else {
                $_SESSION["create_question_fail"] = true;

                if (isset($_SESSION["create_question_successful"])) {
                    unset($_SESSION["create_question_successful"]);
                }
            }

            $this->view->render("templates/header", true);
            $this->view->render("admin/index", true);
            $this->view->render("admin/questions/add", true);
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

            $this->view->user = UserManager::get_user($email);

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

            $this->view->user = UserManager::get_user($email);

            $this->view->render("templates/header", true);
            $this->view->render("admin/index", true);
            $this->view->render("admin/users/edit", true);
            $this->view->render("templates/footer", true);
        } else {
            header("location: " . URL);
        }
    }

    public function edit_question($id) {
        require "application/models/QuestionManager.php";
        require_once "application/models/User.php";
        require_once "application/models/Question.php";

        session_start();

        if ($this->is_admin()) {
            if (isset($_SESSION["update_question_successful"])) {
                unset($_SESSION["update_question_successful"]);
            }

            if (isset($_SESSION["update_question_fail"])) {
                unset($_SESSION["update_question_fail"]);
            }

            $this->view->question = QuestionManager::get_question($id);

            $this->view->render("templates/header", true);
            $this->view->render("admin/index", true);
            $this->view->render("admin/questions/edit", true);
            $this->view->render("templates/footer", true);
        }
    }

    // TODO: Finire i controlli per l'update dell'utente.
    public function update_question() {
        require "application/models/QuestionManager.php";
        require_once "application/models/Question.php";
        require_once "application/models/User.php";

        session_start();

        if ($this->is_admin()) {
            $id = $_POST["id"];
            $question = $_POST["question"];
            $image = $_FILES["image"];
            $answer_1 = $_POST["answer_1"];
            $answer_2 = $_POST["answer_2"];
            $answer_3 = $_POST["answer_3"];
            $correct_answer = $_POST["correct_answer"];
            $textual_explanation = $_FILES["textual_explanation"];
            $video_explanation = $_FILES["video_explanation"];

            $path_image = $this->save_file($image, "application/quiz_images/");
            $path_textual = $this->save_file($textual_explanation, "application/textual_explanations/");
            $path_video = $this->save_file($video_explanation, "application/video_explanations/");

            if (QuestionManager::update($question, $path_image, $answer_1, $answer_2, $answer_3,
                $correct_answer, $path_textual, $path_video, $id)) {
                $_SESSION["create_question_successful"] = true;

                if (isset($_SESSION["create_question_fail"])) {
                    unset($_SESSION["create_question_fail"]);
                }
            } else {
                $_SESSION["create_question_fail"] = true;

                if (isset($_SESSION["create_question_successful"])) {
                    unset($_SESSION["create_question_successful"]);
                }
            }

            $this->view->question = QuestionManager::get_question($id);

            $this->view->render("templates/header", true);
            $this->view->render("admin/index", true);
            $this->view->render("admin/questions/edit", true);
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

    public function delete_question($id) {
        require "application/models/QuestionManager.php";
        require_once "application/models/User.php";

        session_start();

        if ($this->is_admin()) {
            if (QuestionManager::delete($id)) {
                $_SESSION["delete_question_successful"] = true;

                if (isset($_SESSION["delete_question_fail"])) {
                    unset($_SESSION["delete_question_fail"]);
                }
            } else {
                $_SESSION["delete_question_fail"] = true;

                if (isset($_SESSION["delete_question_successful"])) {
                    unset($_SESSION["delete_question_successful"]);
                }
            }

            $this->view->questions = QuestionManager::get_all_questions();

            $this->view->render("templates/header", true);
            $this->view->render("admin/index", true);
            $this->view->render("admin/questions/index", true);
            $this->view->render("templates/footer", true);
        } else {
            header("location: " . URL);
        }
    }

    private function is_admin()
    {
        require_once "application/models/User.php";

        if (!isset($_SESSION)) {
            session_start();
        }

        if (isset($_SESSION["user"])) {
            return strcmp($_SESSION["user"]->get_admin(), "1") == 0;
        } else {
            return false;
        }
    }

    private function save_file($file, $directory)
    {
        $path = pathinfo($file["name"]);
        $filename = $this->generate_name();
        $ext = $path["extension"];
        $temp_name = $file["tmp_name"];
        $new_name = $directory . $filename . "." . $ext;

        if (!file_exists($new_name)) {
            move_uploaded_file($temp_name, $new_name);

            return $new_name;
        } else {
            return null;
        }
    }

    private function generate_name()
    {
        $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $name = "";

        for ($i = 0; $i < 20; $i++) {
            $name .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $name;
    }
}
