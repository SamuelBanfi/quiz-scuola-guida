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
            $questions[] = new Question($question["id"], $question["testo"],
                $question["risposta_1"], $question["risposta_2"],
                $question["risposta_3"], $question["risposta_corretta"],
                $question["spiegazione_testo"], $question["spiegazione_video"]
            );
        }

        return $questions;
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

    public static function add($question, $answer_1, $answer_2, $answer_3,
                               $correct_answer, $textual_explaination, $video_explaination) {
        require_once "application/models/Database.php";

        $conn = Database::get_connection();
        $query = "INSERT INTO domanda(testo, risposta_1, risposta_2, risposta_3,
                    risposta_corretta, spiegazione_testo, spiegazione_video) 
                    VALUES(:question, :answer_1, :answer_2, :answer_3, 
                           :correct_answer, :textual_explaination, :video_explaination)";
        $params = array(
            ':question' => $question,
            ':answer_1' => $answer_3,
            ':answer_2' => $answer_2,
            ':answer_3' => $answer_3,
            ':correct_answer' => $correct_answer,
            'textual_explaination' => $textual_explaination,
            'video_explaination' => $video_explaination
        );

        try {
            $stmt = $conn->prepare($query);
            $stmt->execute($params);

            return true;
        } catch(PDOException $e) {
            return false;
        }
    }
}