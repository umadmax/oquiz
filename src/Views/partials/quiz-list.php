<div class="notification is-link">
  <span class="icon">
    <i class="fas fa-info-circle"></i>
  </span>
  Hé Michel, il faut être connecté pour pouvoir jouer !
</div>
<div class="columns is-multiline">
<?php foreach($questions as $question): ?>
  <div class="column is-one-third-desktop is-half">
    <div class="panel">
      <div class="panel-heading">
        <h3 class="has-text-white is-size-5"><?= $question->getQuestion() ?></h3>
      </div>
      <?php foreach($question->getShuffledProps() as $prop): ?>
      <div class="panel-block">
        <p><?= $prop ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endforeach; ?>
</div>