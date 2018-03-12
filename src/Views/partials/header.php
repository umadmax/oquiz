<header class="header">
  <nav class="navbar is-link" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item has-text-warning" href="<?= $baseURL ?>">
      <span class="icon is-medium">
        <i class="fas fa-question-circle"></i>
      </span>
      Oquiz
    </a>
    <div class="navbar-burger" data-target="navMenu">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="navbar-menu" id="navMenu">
    <div class="navbar-end">
      <?php if($user): ?>
      <p class="navbar-item">Bonjour <?= $user->first_name ?></p>
      <a href="<?= $router->generate('index') ?>" class="navbar-item">
        <span class="icon">
          <i class="fas fa-home"></i>
        </span>
        Accueil
      </a>
      <a href="<?= $router->generate('user_quizzes', ['id' => $user->id]) ?>" class="navbar-item">
        <span class="icon">
          <i class="fas fa-user"></i>
        </span>
        Mon compte
      </a>
      <a href="<?= $router->generate('logout') ?>" class="navbar-item">
        <span class="icon">
          <i class="fas fa-sign-out-alt"></i>
        </span>
        Se déconnecter
      </a>
      <?php else: ?>
      <a href="<?= $router->generate('index') ?>" class="navbar-item">
        <span class="icon">
          <i class="fas fa-home"></i>
        </span>
        Accueil
      </a>
      <a href="<?= $router->generate('login') ?>" class="navbar-item">
        <span class="icon">
          <i class="fas fa-sign-in-alt"></i>
        </span>
        Se connecter
      </a>
      <?php endif; ?>
    </div>
  </div>
</nav>
</header>