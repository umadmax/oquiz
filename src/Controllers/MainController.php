<?php
namespace OQuiz\Controllers;
use \OQuiz\Models\Quiz;

class MainController extends CoreController {

  public function index() {

    $quizzes = Quiz::findAllQuizzes();

    echo $this->templates->render('main/index', [
      'quizzes' => $quizzes
    ]);
  }

  public function error404() {
    echo 'You came to the wrong neighborhood kid.';
  }
}