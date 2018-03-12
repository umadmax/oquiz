<?php

namespace OQuiz\Controllers;

use League\Plates\Engine as Plates;
use OQuiz\Utils\Path;

abstract class CoreController {

  protected $templates;
  protected $basePath;
  protected $router;
  protected $user;

  public function __construct($router, $basePath) {
    $this->basePath = $basePath;
    $this->router = $router;
    $this->user = \OQuiz\Models\User::getUser();

    $path_views_folder = Path::buildPath(ABS_BASE_PATH, 'src', 'Views');
    $this->templates = new Plates
    ($path_views_folder);
    $this->templates->addData([
      'baseURL' => $this->basePath,
      'router' => $this->router,
      'user' => $this->user
    ]);
  }
}