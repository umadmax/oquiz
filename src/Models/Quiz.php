<?php

namespace OQuiz\Models;
use OQuiz\Utils\Database;

class Quiz extends CoreModel {

  protected static $table = 'quizzes';

  private $id;
  private $title;
  private $description;
  private $id_author;

  public static function findAllQuizzes() {
    $db = Database::getDB();
    $stmt = $db->query('
      SELECT
      quizzes.id,
      title,
      description,
      users.first_name,
      users.last_name
      FROM quizzes
      INNER JOIN users
      ON id_author = users.id
    ');
    return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
  }

  public static function findQuizzesByAuthor($id) {
    $db = Database::getDB();
    $stmt = $db->prepare('
      SELECT
      quizzes.id,
      title,
      description,
      users.first_name,
      users.last_name
      FROM quizzes
      INNER JOIN users
      ON id_author = users.id
      WHERE id_author = :id
    ');
    $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
  }

  public static function findQuizByID($id) {
    $db = Database::getDB();
    $stmt = $db->prepare('
      SELECT
      quizzes.id,
      title,
      description,
      users.first_name,
      users.last_name
      FROM quizzes
      INNER JOIN users
      ON id_author = users.id
      WHERE quizzes.id = :id
    ');
    $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(\PDO::FETCH_CLASS, static::class);
    return $stmt->fetch(\PDO::FETCH_CLASS);
  }

  /**
   * Get the value of title
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Set the value of title
   *
   * @return  self
   */
  public function setTitle($title)
  {
    $this->title = $title;

    return $this;
  }

  /**
   * Get the value of description
   */ 
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * Set the value of description
   *
   * @return  self
   */ 
  public function setDescription($description)
  {
    $this->description = $description;

    return $this;
  }

  /**
   * Get the value of id_author
   */ 
  public function getIdAuthor()
  {
    return $this->id_author;
  }

  /**
   * Set the value of id_author
   *
   * @return  self
   */ 
  public function setIdAuthor($id_author)
  {
    $this->id_author = $id_author;

    return $this;
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
}