<form id="quiz-form" method="post">
  <div class="columns is-multiline">
    <?php foreach($questions as $question): ?>

    <div class="column question is-one-third-desktop is-half">
      <div class="panel">

        <div class="panel-heading">
        <h3 class="has-text-white is-size-5"><?= $question->getQuestion() ?></h3>
        <span class="tag is-rounded level-tag" data-level="<?= $question->levelName ?>"><?= $question->levelName ?></span>
        </div>
        <?php foreach($question->getShuffledProps() as $prop): ?>

        <div class="panel-block">
          <div class="control">
            <label class="radio">
              <input type="radio" name="<?= $question->getId() ?>" id="prop" value="<?= $prop ?>">
              <span class="prop-label">
                <?= $prop ?>
              </span>
            </label>

          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endforeach; ?>
  </div>

  <div class="field">
    <div class="control has-text-centered">
      <button type="submit" class="button is-success is-large">Valider</button>
    </div>
  </div>
</form>