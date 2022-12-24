<?php

class QuestionManager
{
    public static function get_all_questions() {
        require_once "application/models/Database.php";
        require_once "application/models/Question.php";

        $conn = Database::get_connection();
        $query = "SELECT * FROM domanda";

        $stmt = $conn->query($query);

        $result = $stmt->fetchAll();
        $questions = array();

        foreach ($result as $key => $question) {
            $questions[] = new Question(
                $question["id"],
                $question["testo"],
                $question["immagine"],
                $question["risposta_1"],
                $question["risposta_2"],
                $question["risposta_3"],
                $question["risposta_corretta"],
                $question["spiegazione_testo"],
                $question["spiegazione_video"]
            );
        }

        return $questions;
    }

    public static function get_count_questions() {
        require_once "application/models/Database.php";
        require_once "application/models/Question.php";

        $conn = Database::get_connection();
        $query = "SELECT COUNT(1) FROM domanda";

        $stmt = $conn->query($query);
        $result = $stmt->fetchAll();

        return $result;
    }

    public static function get_question($id) {
        require_once "application/models/Database.php";

        $questions = self::get_all_questions();

        foreach ($questions as $key => $question) {
            if (strcmp($question->get_id(), $id) == 0) {
                return $question;
            }
        }

        return null;
    }

    public static function add($question, $image, $answer_1, $answer_2, $answer_3,
                               $correct_answer, $textual_explanation, $video_explanation) {
        require_once "application/models/Database.php";

        $conn = Database::get_connection();
        $query = "INSERT INTO domanda(testo, immagine, risposta_1, risposta_2, risposta_3,
                    risposta_corretta, spiegazione_testo, spiegazione_video) 
                    VALUES(:question, :image, :answer_1, :answer_2, :answer_3, 
                           :correct_answer, :textual_explanation, :video_explanation)";
        $params = array(
            ':question' => $question,
            ':image' => $image,
            ':answer_1' => $answer_1,
            ':answer_2' => $answer_2,
            ':answer_3' => $answer_3,
            ':correct_answer' => $correct_answer,
            'textual_explanation' => $textual_explanation,
            'video_explanation' => $video_explanation
        );

        try {
            $stmt = $conn->prepare($query);
            $stmt->execute($params);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function delete($id) {
        require_once "application/models/Database.php";

        $conn = Database::get_connection();
        $query = "SELECT * FROM domanda WHERE id = :id";
        $params = array(':id' => $id);

        try {
            $stmt = $conn->prepare($query);
            $stmt->execute($params);

            $result = $stmt->fetchAll();
            $files_to_delete = array();

            if (count($result) == 1) {
                $files_to_delete[] = $result[0]["immagine"];
                $files_to_delete[] = $result[0]["spiegazione_testo"];
                $files_to_delete[] = $result[0]["spiegazione_video"];

                $stmt->closeCursor();
                $query = "DELETE FROM domanda WHERE id = :id";

                $stmt = $conn->prepare($query);
                $stmt->execute($params);

                // Unlink related question files (delete from server)
                for ($i = 0; $i < count($files_to_delete); $i++) {
                    if (!unlink($files_to_delete[$i])) {
                        return false;
                    }
                }
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function set_answer($question_id, $answer_id) {
        if(!isset($_SESSION)){
            session_start();
        }

        if ($question_id >= 0 && $question_id <= 49) {
            if ($answer_id >= 1 && $answer_id <= 3) {
                $_SESSION["answ"][$question_id] = (int) $answer_id;
            }
        }
    }
}