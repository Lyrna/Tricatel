<?php require "code/index-traitement.php" ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tricatel</title>
  <script src="https://kit.fontawesome.com/c70a4c5665.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="header-admin header_absolute">
    <div>
    <div class="admin-mode-section"><h1>Tricatel</h1></a></div>
  </div>
  <div class="admin-mode">
    <div class="admin-mode-section"><a href="code/view.php" class="link-edit"><i class="fas fa-eye fa-utensils-2"></i><span class="hidden">Voir le site</span></a></div>
  </div>
</header>

<div class="container container_index">
  <div class="login-form">
    <form action="" method="POST">
      <h2 class="black">Connexion</h2>
      <!--display errors-->
      <?php if(!empty($errors)): ?>
      <div class="alert">
          <?php foreach ($errors as $error): ?>
            <?= $error; ?>
          <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <!--end of errors-->
      <div class="form-group">
        <div class="input">
          <label for="name_admin">Identifiant <span class="required">*</span></label>
        </div>
        <div>
          <input type="text" name="name_admin" required>
        </div>
      </div>
      <div class="form-group">
        <div class="input">
          <label for="password">Mot de passe <span class="required">*</span></label>
        </div>
        <div>
          <input type="password" name="password" required>
        </div>
      </div>
      <button type="submit" class="subscribe-index">Se connecter</button>
    </form>
  </div>
</div>
  
</body>
</html>