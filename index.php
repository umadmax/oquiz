<?php


session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

define('ABS_BASE_PATH', __DIR__);

require(__DIR__. '/vendor/autoload.php');

$app = new OQuiz\App();

$app->run();