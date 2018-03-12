<?php

namespace OQuiz\Controllers;
use OQuiz\Models\Quiz;
use OQuiz\Models\Question;

class QuizController extends CoreController {
  public function show($params) {
    $quiz = Quiz::findQuizByID($params['id']);
    $questions = Question::findQuestionsByQuiz($params['id']);

    $results = array();

    if(!empty($_POST)) {
      foreach($questions as $question) {
        if(isset($_POST[$question->getId()])) {
          if($_POST[$question->getId()] === $question->getAnswer()) {
            $results[$question->getId()] =  1;
          } else {
            $results[$question->getId()] =  0;
          }
        }
      }
    }

    echo $this->templates->render('quiz/show', [
      'quiz' => $quiz,
      'questions' => $questions,
      'results' => $results
    ]);
  }

  public function showUserQuizzes() {
    $quizzes = Quiz::findQuizzesByAuthor($this->user->id);

    echo $this->templates->render('quiz/user-quizzes', [
      'quizzes' => $quizzes
    ]);
  }
}