<?php

namespace OQuiz\Models;
use OQuiz\Utils\Database;

class CoreModel {

  protected static $table;

  public static function findAll() {
    $db = Database::getDB();
    $stmt = $db->query('SELECT * FROM ' .static::$table);
    return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
  }
}