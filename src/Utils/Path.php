<?php

namespace OQuiz\Utils;

class Path {

  public static function buildPath() {
    $folders = func_get_args();

    return implode(DIRECTORY_SEPARATOR, $folders);
  }
}