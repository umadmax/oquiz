<?php $this->layout('layout') ?>

<section class="section">
  <div class="hero is-dark">
    <div class="hero-body">
      <h1 class="title is-3">Les quizzes de <?= $user->first_name ?></h1>
    </div>
</section>

<section class="section quizzes">
    <div class="columns is-multiline">
    <?php foreach($quizzes as $quiz): ?>
      <div class="column is-one-third-desktop is-half">
        <div class="card">
          <div class="card-header">
           <a href="<?= $router->generate('quiz', ['id' => $quiz->getId()]) ?>"><h3 class="card-header-title has-text-link"><?= $quiz->getTitle() ?></h3></a>
          </div>
          <div class="card-content">
            <div class="content">
              <p class="has-text-black"><?= $quiz->getDescription() ?></p>
              <p class="is-size-7">by <?= $quiz->first_name. ' ' .$quiz->last_name?></p>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>