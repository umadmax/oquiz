<?php

namespace OQuiz;
use OQuiz\Utils\Database;

class App {

  public $router;
  public $basePath;

  public function __construct() {

    $config = parse_ini_file(__DIR__. '/../config.ini');
    Database::setConfig($config);

    $this->router = new \AltoRouter();

    $this->basePath = isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '';
    $this->router->setBasePath($this->basePath);

    $this->mapping();
  }

  private function mapping() {
    $this->router->map('GET', '/', ['MainController', 'index'], 'index');
    $this->router->map('GET|POST', '/quiz/[i:id]', ['QuizController', 'show'], 'quiz');
    $this->router->map('GET', '/users/[i:id]/quizzes', ['QuizController', 'showUserQuizzes'], 'user_quizzes');
    $this->router->map('GET|POST', '/users/login', ['UserController', 'login'], 'login');
    $this->router->map('GET', '/users/logout', ['UserController', 'logout'], 'logout');
  }

  public function run () {

    $match = $this->router->match();

    if(!$match) {
      $controllerName = "OQuiz\Controllers\MainController";
      $method = 'error404';
    } else {
      $controllerName = "OQuiz\Controllers\\" .$match['target'][0];
      $method = $match['target'][1];
    }

    $controller = new $controllerName($this->router, $this->basePath);
    $controller->$method($match['params']);
  }

}