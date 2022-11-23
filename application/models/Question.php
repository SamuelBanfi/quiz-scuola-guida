<?php

class Question
{
    private $id;
    private $question;
    private $image;
    private $answer_1;
    private $answer_2;
    private $answer_3;
    private $correct_answer;
    private $textual_explanation;
    private $video_explanation;

    /**
     * @param $id
     * @param $question
     * @param $image
     * @param $answer_1
     * @param $answer_2
     * @param $answer_3
     * @param $correct_answer
     * @param $textual_explaination
     * @param $video_explaination
     */
    public function __construct($id, $question, $image, $answer_1, $answer_2, $answer_3,
                                $correct_answer, $textual_explanation, $video_explanation)
    {
        $this->id = $id;
        $this->question = $question;
        $this->image = $image;
        $this->answer_1 = $answer_1;
        $this->answer_2 = $answer_2;
        $this->answer_3 = $answer_3;
        $this->correct_answer = $correct_answer;
        $this->textual_explanation = $textual_explanation;
        $this->video_explanation = $video_explanation;
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
    public function get_image()
    {
        return $this->image;
    }

    /**
     * @param mixed $id
     */
    public function set_image($image)
    {
        $this->image = $image;
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
    public function get_textual_explanation()
    {
        return $this->textual_explanation;
    }

    /**
     * @param mixed $textual_explanation
     */
    public function set_textual_explanation($textual_explanation)
    {
        $this->textual_explanation = $textual_explanation;
    }

    /**
     * @return mixed
     */
    public function get_video_explanation()
    {
        return $this->video_explanation;
    }

    /**
     * @param mixed $video_explanation
     */
    public function set_video_explanation($video_explanation)
    {
        $this->video_explanation = $video_explanation;
    }
}