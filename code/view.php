<?php
  session_start();
  if(isset($_SESSION['auth'])){
  echo '<header class="header-admin m-2">
  <div>
    <div class="admin-mode-section"><img src="../assets/img/logo/logo2.jpg" height="60px" width="60px" alt="logo Tricatel sur fond noir, orange et rouge"/><h1>Tricatel</h1></a></div>
  </div>
  <div class="admin-mode">
    <div class="admin-mode-section"><a href="admin.php" class="link-edit"><i class="fas fa-chalkboard-teacher fa-utensils-2"></i><span class="hidden">Tableau de bord</span></a></div>
    <div class="admin-mode-section"><a href="deconnexion.php" class="link-edit"><i class="fas fa-power-off fa-utensils-2"></i><span class="hidden">Déconnexion</span></a></div>
  </div>
</header>';
  } else{
    echo '<header class="header-admin m-2">
  <div>
    <div class="admin-mode-section"><img src="../assets/img/logo/logo2.jpg" height="60px" width="60px" alt="logo Tricatel sur fond noir, orange et rouge"/><h1>Tricatel</h1></a></div>
  </div>
  <div class="admin-mode">
    <div class="admin-mode-section"><a href="../index.php" class="link-edit"><i class="fas fa-sign-in-alt fa-utensils-2"></i><span class="hidden">Connexion</span></a></div>
  </div>
</header>';
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tricatel</title>
  <script src="https://kit.fontawesome.com/c70a4c5665.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

  <?php require_once "config.php"?>
  <?php require_once "sql.php"?>

<div class="bg-light">
  <div class="bg-orange">
    <h2 class="view">Plats <span>du moment</span></h2>
    <hr class="hr_index"/>
    <!--TRI-->
    <div id="button_container">
      <form class="form_index" method="POST">
        <div>
          <label for="type_plat">Type</label>
          <select name="type_plat" id="type_plat">
              <option value="">--Choisir un type de plat--</option>
              <option value="entrée">Entrée</option>
              <option value="plat">Plat</option>
              <option value="dessert">Dessert</option>
          </select>
        </div>
        <div>
          <label for="continent_origine">Origine</label>
          <select name="continent_origine" id="continent_origine">
              <option value="">--Choisir un continent--</option>
              <option value="Europe">Europe</option>
              <option value="Amérique">Amérique</option>
              <option value="Afrique">Afrique</option>
              <option value="Asie">Asie</option>
          </select>
        </div>
        <div>
          <label for="regime_alimentaire">Régime</label>
          <select name="regime_alimentaire" id="regime_alimentaire">
              <option value="">--Choisir un régime--</option>
              <option value="normal">Normal</option>
              <option value="flexitarien">Flexitarien</option>
              <option value="végétarien">Végétarien</option>
          </select>
        </div>
       <div>
            <button type="submit" class="btn tri all" name ="search"><i class="fas fa-check fav-creer"></i>Trier</button>
        </div>
      </form>
    </div>
  </div>

<!--THE RESULT OF THE RESEARCH WILL BE DISPLAY THERE-->
<?php if (isset($_POST['search']) AND (!empty($type_plat) OR !empty($continent_origine) OR !empty($regime_alimentaire))): ?>
<div class="bg-grey">
  <h2 class="search">Résultats trouvés :</h2>
  <!--if no result : display error-->
  <?php foreach ($errors as $error): ?>
      <p class="text-center f-3"><?= $error; ?></p>
  <?php endforeach; ?>
  <!--CARDS TRI-->
  <div class="container-grid bg-grey">
    <?php while($row = $stmt_tri->fetch(PDO::FETCH_ASSOC)) : ?>
      <div class="card card-border-bottom-none <?php echo $row['continent_origine']; ?> <?php echo $row['regime_alimentaire']; ?> <?php echo $row['type_plat']; ?>">
        <div>
          <h3><?php echo $row['nom_plat'] ?></h3>
          <?php echo "<img src=".$row['photo_plat']." alt='image dédiée au plat associé' class='img_plat'/>"; ?>
          <p class="description_plat"><?php echo $row['description_plat'] ?></p>
          <p class="details_plats"><i class="fas fa-check"></i><?php echo $row['regime_alimentaire'] ?></p>
          <p class="details_plats"><i class="fas fa-tags"></i><?php echo $row['type_plat'] ?></p>
          <p class="details_plats"><i class="fas fa-globe"></i> <?php echo $row['continent_origine'] ?></p>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>
<?php endif; ?>
<!--END OF RESULTS-->

<!--DISPLAY ALL CARDS OF PLATES-->
  <div class="container-grid">
    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
      <div class="card <?php echo $row['continent_origine']; ?> <?php echo $row['regime_alimentaire']; ?> <?php echo $row['type_plat']; ?>">
        <div>
          <h3><?php echo $row['nom_plat'] ?></h3>
          <?php echo "<img src=".$row['photo_plat']." alt='image dédiée au plat associé' class='img_plat'/>"; ?>
          <p class="description_plat"><?php echo $row['description_plat'] ?></p>
          <p class="details_plats"><i class="fas fa-check"></i><?php echo $row['regime_alimentaire'] ?></p>
          <p class="details_plats"><i class="fas fa-tags"></i><?php echo $row['type_plat'] ?></p>
          <p class="details_plats"><i class="fas fa-globe"></i> <?php echo $row['continent_origine'] ?></p>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

</div>
</body>
</html>