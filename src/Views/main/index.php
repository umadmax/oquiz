<?php $this->layout('layout') ?>

<section class="section">
  <div class="hero is-dark">
    <div class="hero-body">
      <h1 class="title is-3">Bienvenue sur O'Quiz</h1>
      <div class="content">
        <p class="is-size-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est mollitia cumque excepturi velit, veniam ea vero perspiciatis error temporibus laboriosam voluptatum quos dolore modi voluptas. Culpa voluptatem doloribus ea quisquam necessitatibus dolore tempore animi omnis repudiandae, labore ab iure cupiditate sequi numquam, amet quasi quia nemo. Ab architecto sit voluptatibus!</p>
      </div>
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