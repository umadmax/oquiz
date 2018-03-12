document.addEventListener('DOMContentLoaded', () => {
  const basePath = BASE_PATH;

  $levelTags = document.querySelectorAll('.level-tag');

  levelManager();

  function levelManager() {
    $levelTags.forEach($levelTag => {

      switch ($levelTag.dataset.level) {
        case 'Débutant':
          $levelTag.classList.add('is-success');
          break;

        case 'Confirmé':
          $levelTag.classList.add('is-warning');
          break;

        case 'Expert':
          $levelTag.classList.add('is-danger');
          break;
      }
    });
  }
});