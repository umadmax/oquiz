<form id="quiz-form" method="post">
  <div class="notification is-link">
    <p>Votre score : <?= count($results) ?> / <?= count($questions) ?></p>
    <a href="<?= $router->generate('quiz', ['id' => $quiz->getId()]) ?>" class="has-text-dark">Rejouer</a>
  </div>
  <div class="columns is-multiline">
    <?php foreach($questions as $index => $question): ?>

    <div class="column question is-one-third-desktop is-half">
      <div class="panel">
        <?php if(isset($results[$question->getId()])): ?>
          <?php if($results[$question->getId()] === 1): ?>
          <div class="panel-heading panel-success">
          <?php else: ?>
          <div class="panel-heading panel-warning">
          <?php endif; ?>
        <?php else: ?>
        <div class="panel-heading">
        <?php endif; ?>
        <h3 class="has-text-white is-size-5"><?= $question->getQuestion() ?></h3>
        <span class="tag is-rounded level-tag" data-level="<?= $question->levelName ?>"><?= $question->levelName ?></span>
        </div>
        <?php foreach($question->getShuffledProps() as $prop): ?>

        <div class="panel-block">
          <?php if($prop === $question->getAnswer()): ?>
          <span class="panel-icon has-text-success">
            <i class="fas fa-check-circle"></i>
          </span>
          <?= $prop ?>
          <?php else:?>
          <span class="panel-icon has-text-danger">
            <i class="fas fa-times-circle"></i>
          </span>
          <?= $prop ?>
          <?php endif; ?>
        </div>
        <?php endforeach; ?>
        <?php if(isset($results[$question->getId()])): ?>
        <div class="panel-block">
            <span class="panel-icon has-text-info">
              <i class="fas fa-info-circle"></i>
            </span>
            <?= $question->getAnecdote() ?>
        </div>
        <div class="panel-block">
            <span class="panel-icon has-text-info">
              <i class="fab fa-wikipedia-w"></i>
            </span>
            <a href="https://fr.wikipedia.org/wiki/<?= $question->getWiki() ?>" target="_blank">Voir sur Wikipedia</a>
        </div>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>
  </div>

  <div class="field">
    <div class="control has-text-centered">
      <a href="<?= $router->generate('quiz', ['id' => $quiz->getId()]) ?>" class="button is-link is-large">Rejouer</a>
    </div>
  </div>
</form>