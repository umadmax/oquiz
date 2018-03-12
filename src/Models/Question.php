<?php

namespace OQuiz\Models;
use OQuiz\Utils\Database;

class Question extends CoreModel {

  protected static $table;
  protected $id;
  protected $id_quiz;
  protected $question;
  protected $prop1;
  protected $prop2;
  protected $prop3;
  protected $prop4;
  protected $id_level;
  protected $anecdote;
  protected $wiki;

  protected $props;

  public function __construct() {
    $this->props = $this->findAnswers($this->getId());
  }

  private function findAnswers($id) {
    $db = Database::getDB();
    $stmt = $db->prepare('
      SELECT
      prop1,
      prop2,
      prop3,
      prop4
      FROM questions
      WHERE id = :id
    ');
    $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(\PDO::FETCH_ASSOC);
  }

  private function shuffleAssoc($array) {
    $keys = array_keys($array);
    shuffle($keys);

    foreach($keys as $key) {
      $new[$key] = $array[$key];
    }

    $array = $new;
    return $array;
  }

  public function getShuffledProps() {
    return $this->shuffleAssoc($this->props);
  }

  public static function findQuestionsByQuiz($quizID) {
    $db = Database::getDB();
    $stmt = $db->prepare('
      SELECT
      questions.id,
      questions.id_quiz,
      questions.question,
      questions.prop1,
      questions.prop2,
      questions.prop3,
      questions.prop4,
      questions.id_level,
      questions.anecdote,
      questions.wiki,
      levels.id as levelID,
      levels.name as levelName
      FROM questions
      INNER JOIN levels
      ON id_level = levels.id
      WHERE id_quiz = :quizID
    ');
    $stmt->bindValue(':quizID', $quizID, \PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
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
   * Get the value of id_quiz
   */ 
  public function getIdQuiz()
  {
    return $this->id_quiz;
  }

  /**
   * Set the value of id_quiz
   *
   * @return  self
   */ 
  public function setIdQuiz($id_quiz)
  {
    $this->id_quiz = $id_quiz;

    return $this;
  }

  /**
   * Get the value of question
   */ 
  public function getQuestion()
  {
    return $this->question;
  }

  /**
   * Set the value of question
   *
   * @return  self
   */ 
  public function setQuestion($question)
  {
    $this->question = $question;

    return $this;
  }

  /**
   * Get the value of props
   */ 
  public function getProps()
  {
    return $this->props;
  }

  /**
   * Set the value of props
   *
   * @return  self
   */ 
  public function setProps($props)
  {
    $this->props = $props;

    return $this;
  }

  /**
   * Get the value of prop1
   */ 
  public function getAnswer()
  {
    return $this->prop1;
  }

  /**
   * Set the value of prop1
   *
   * @return  self
   */ 
  public function setAnswer($answer)
  {
    $this->prop1 = $answer;

    return $this;
  }

  /**
   * Get the value of anecdote
   */ 
  public function getAnecdote()
  {
    return $this->anecdote;
  }

  /**
   * Set the value of anecdote
   *
   * @return  self
   */ 
  public function setAnecdote($anecdote)
  {
    $this->anecdote = $anecdote;

    return $this;
  }

  /**
   * Get the value of wiki
   */ 
  public function getWiki()
  {
    return $this->wiki;
  }

  /**
   * Set the value of wiki
   *
   * @return  self
   */ 
  public function setWiki($wiki)
  {
    $this->wiki = $wiki;

    return $this;
  }
}