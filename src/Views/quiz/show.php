<?php $this->layout('layout') ?>

<section class="section">
  <div class="hero is-dark">
    <div class="hero-body">
      <h1 class="title is-3">
        <?= $quiz->getTitle() ?>
        <span class="tag is-link is-medium is-rounded questions-count">
          <?= count($questions) ?> questions
        </span>
      </h1>
      <div class="content">
        <p class="is-size-5"><?= $quiz->getDescription() ?></p>
        <p class="is-size-6">par <?= $quiz->first_name. ' ' .$quiz->last_name?></p>
      </div>
    </div>
</section>

<section class="section questions">
    <?php if($user): ?>
      <?php if(!empty($_POST)): ?>
      <?php $this->insert('partials/quiz-results', [
        'quiz' => $quiz,
        'questions' => $questions,
        'results' => $results
      ]) ?>
      <?php else: ?>
      <?php $this->insert('partials/quiz-form', ['questions' => $questions]) ?>
      <?php endif; ?>
    <?php else: ?>
    <?php $this->insert('partials/quiz-list', ['questions' => $questions]) ?>
    <?php endif; ?>
  </div>
</section>