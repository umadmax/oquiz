<?php

namespace OQuiz\Utils;

class Database {

  private static $db;
  private static $config;

  public static function setConfig($conf) {
    self::$config = $conf;
  }

  public static function getDB() {
    if(!isset(self::$db)) {
      try {
        self::$db = new \PDO("mysql:host=".self::$config['host'].";dbname=".self::$config['dbname'].";charset=".self::$config['charset'],
                    self::$config['dbuser'],self::$config['dbpassword']);
      }
      catch(\PDOException $e) {
        die('Uh-oh something went wrong');
      }
    }

    return self::$db;
  }

}