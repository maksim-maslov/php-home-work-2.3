<?php
/**
 * Created by PhpStorm.
 * User: Guest User
 * Date: 06.08.2017
 * Time: 0:38
 */

class RatingGenerator
{

    public function generate()
    {
        $correctAnswersString = $_POST['correct_answers'];
        $correctAnswers = explode(',', $correctAnswersString);
        $userAnswers = array_slice($_POST, 1, -1);
        $incorrectAnswers = array_diff_assoc($userAnswers, $correctAnswers);
        $countAllAnswers = count($correctAnswers);
        $countIncorrectAnswers = count($incorrectAnswers);
        $countCorrectAnswers = $countAllAnswers - $countIncorrectAnswers;
        $rating = $countCorrectAnswers / ($countAllAnswers / 100);
        $rating > 75 ? $ratingText = $_POST['user_name'] . ': ' . 'Тест пройден' : $ratingText = $_POST['user_name'] . ': ' . 'Тест не пройден';

        return $ratingText;
    }


}