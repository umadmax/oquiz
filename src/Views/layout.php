<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- BULMA -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
  <!-- GOOGLE FONT -->
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="<?= $baseURL ?>/public/css/style.css">
  <!-- FONT AWESOME -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <title>OQuiz</title>
</head>
<body>
  <?php $this->insert('partials/header') ?>
  <main>
    <?= $this->section('content') ?>
  </main>
  <?php $this->insert('partials/footer') ?>
  <script>
    const BASE_PATH = "<?= $baseURL ?>"
  </script>
  <script src="<?= $baseURL ?>/public/js/main.js"></script>
  <script src="<?= $baseURL ?>/public/js/navbar.js"></script>
</body>
</html>