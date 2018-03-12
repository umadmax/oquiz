<?php

namespace OQuiz\Controllers;
use OQuiz\Models\User;

class UserController extends CoreController {
  public function login() {
    $errors = [];

    if(!empty($_POST)) {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = User::checkAccount($email, $password);

      if(!$user) {
        $errors[] = 'Ce compte n\'existe pas';
      } else {
        User::connect($user);
        header('Location: ' .$this->router->generate('index'));
      }
    }

    echo $this->templates->render('user/login', ['errors' => $errors]);
  }

  public function logout() {
    User::disconnect();
    header('Location: ' .$this->router->generate('index'));
  }
}