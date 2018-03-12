<?php

namespace OQuiz\Models;
use OQuiz\Utils\Database;

class User extends CoreModel {

  protected static $table = 'users';
  protected $id;
  protected $first_name;
  protected $last_name;
  protected $email;
  protected $password;

  public static function checkAccount($email, $password) {
    $user = self::findByMail($email);
    if($user) {
      $verified = password_verify($password, $user->getPassword());
      if($verified) {
        return $user;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public static function connect($user) {
    $_SESSION['user'] = [
      'id' => $user->getId(),
      'first_name' => $user->getFirstname(),
      'last_name' => $user->getLastname(),
      'email' => $user->getEmail()
    ];

  }

  public static function disconnect() {
    unset($_SESSION['user']);
  }

  public function isConnected() {
    return isset($_SESSION['user']);
  }

  public static function getUser() {
    if(!isset($_SESSION['user'])) return false;

    return (object) $_SESSION['user'];
  }

  public static function findByMail($email) {
    $db = Database::getDB();
    $stmt = $db->prepare('SELECT * FROM users WHERE email LIKE :email');
    $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
    $stmt->execute();

    $stmt->setFetchMode(\PDO::FETCH_CLASS, static::class);
    return $stmt->fetch(\PDO::FETCH_CLASS);
    
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of first_name
   */ 
  public function getFirstname()
  {
    return $this->first_name;
  }

  /**
   * Set the value of first_name
   *
   * @return  self
   */ 
  public function setFirstname($first_name)
  {
    $this->first_name = $first_name;

    return $this;
  }

  /**
   * Get the value of last_name
   */ 
  public function getLastname()
  {
    return $this->last_name;
  }

  /**
   * Set the value of last_name
   *
   * @return  self
   */ 
  public function setLastname($last_name)
  {
    $this->last_name = $last_name;

    return $this;
  }

  /**
   * Get the value of email
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */ 
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of password
   */ 
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @return  self
   */ 
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }
}