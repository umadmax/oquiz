<?php $this->layout('layout') ?>

<section class="section">
  <div class="column">
    <div class="column is-6 is-offset-3">
      <div class="card">
        <div class="card-header">
          <h2 class="card-header-title has-text-link">Connexion</h2>
        </div>
        <div class="card-content">
          <?php if(!empty($errors)): ?>
          <?php foreach($errors as $error): ?>
          <div class="notification is-danger">
            <?= $error ?>
          </div>
          <?php endforeach; ?>
          <?php endif; ?>
          <form id="login-form" action="<?= $router->generate('login') ?>" method="post">
            <div class="field">
              <label class="label" for="email">Adresse email</label>
              <div class="control has-icons-left">
                <input type="email" name="email" id="email" class="input">
                <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
            </div>
            <div class="field">
              <label class="label" for="password">Mot de passe</label>
              <div class="control has-icons-left">
                <input type="password" name="password" id="password" class="input">
                <span class="icon is-small is-left">
                  <i class="fas fa-lock"></i>
                </span>
              </div>
            </div>
            <div class="field">
              <div class="control">
                <button type="submit" class="button is-success">Se connecter</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>