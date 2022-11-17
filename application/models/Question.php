<?php

class Question
{
    private $id;
    private $question;
    private $answer_1;
    private $answer_2;
    private $answer_3;
    private $correct_answer;
    private $textual_explaination;
    private $video_explaination;

    /**
     * @param $id
     * @param $question
     * @param $answer_1
     * @param $answer_2
     * @param $answer_3
     * @param $correct_answer
     * @param $textual_explaination
     * @param $video_explaination
     */
    public function __construct($id, $question, $answer_1, $answer_2, $answer_3, $correct_answer, $textual_explaination, $video_explaination)
    {
        $this->id = $id;
        $this->question = $question;
        $this->answer_1 = $answer_1;
        $this->answer_2 = $answer_2;
        $this->answer_3 = $answer_3;
        $this->correct_answer = $correct_answer;
        $this->textual_explaination = $textual_explaination;
        $this->video_explaination = $video_explaination;
    }

    /**
     * @return mixed
     */
    public function get_id()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function set_id($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function get_question()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function set_question($question)
    {
        $this->question = $question;
    }

    /**
     * @return mixed
     */
    public function get_answer_1()
    {
        return $this->answer_1;
    }

    /**
     * @param mixed $answer_1
     */
    public function set_answer_1($answer_1)
    {
        $this->answer_1 = $answer_1;
    }

    /**
     * @return mixed
     */
    public function get_answer_2()
    {
        return $this->answer_2;
    }

    /**
     * @param mixed $answer_2
     */
    public function set_answer_2($answer_2)
    {
        $this->answer_2 = $answer_2;
    }

    /**
     * @return mixed
     */
    public function get_answer_3()
    {
        return $this->answer_3;
    }

    /**
     * @param mixed $answer_3
     */
    public function set_answer_3($answer_3)
    {
        $this->answer_3 = $answer_3;
    }

    /**
     * @return mixed
     */
    public function get_correct_answer()
    {
        return $this->correct_answer;
    }

    /**
     * @param mixed $correct_answer
     */
    public function set_correct_answer($correct_answer)
    {
        $this->correct_answer = $correct_answer;
    }

    /**
     * @return mixed
     */
    public function get_textual_explaination()
    {
        return $this->textual_explaination;
    }

    /**
     * @param mixed $textual_explaination
     */
    public function set_textual_explaination($textual_explaination)
    {
        $this->textual_explaination = $textual_explaination;
    }

    /**
     * @return mixed
     */
    public function get_video_explaination()
    {
        return $this->video_explaination;
    }

    /**
     * @param mixed $video_explaination
     */
    public function set_video_explaination($video_explaination)
    {
        $this->video_explaination = $video_explaination;
    }
}