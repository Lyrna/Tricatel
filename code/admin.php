<?php 
	session_start(); 
	if(!isset($_SESSION['auth'])){
		header('Location: ../index.php');
		exit();
	}
?>

<?php require "admin-traitement.php" ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/c70a4c5665.js" crossorigin="anonymous"></script>
	<link rel="icon" type="image/png" sizes="60x60" href="../assets/img/logo/favicon.png">
	<link rel="stylesheet" href="../assets/css/style.css">
	<title>Tricatel - Admin</title>
</head>
<body>

<header class="header-admin">
	<div>
		<div class="admin-mode-section"><img src="../assets/img/logo/logo.png" height="60" width="60" alt="logo Tricatel sur fond noir, orange et rouge"/><h1 class="grey">Tricatel</h1></a></div>
	</div>
	<div class="admin-mode">
		<div class="admin-mode-section"><a href="admin.php" class="link-edit"><i class="fas fa-pen-fancy fa-utensils-2"></i><span class="hidden">Création</span></a></div>
		<div class="admin-mode-section"><a href="edit_delete.php" class="link-edit"><i class="fas fa-edit"></i><span class="hidden">Gestion des plats</span></a></div>
		<div class="admin-mode-section"><a href="view.php" class="link-edit"><i class="fas fa-eye fa-utensils-2"></i><span class="hidden">Voir le site</span></a></div>
		<div class="admin-mode-section"><a href="deconnexion.php" class="link-edit"><i class="fas fa-power-off fa-utensils-2"></i><span class="hidden">Déconnexion</span></a></div>
	</div>
</header>

<div class="center">
	<div class="container-admin">
		<div class="login-form">
			<form action="" method="POST" enctype="multipart/form-data">
				<h2 class="grey">Créer un plat</h2>
				<hr/>

				<!--display errors-->
				<div class="inner-container landing-inner-container">
					<?php if(!empty($errors)): ?>
						<div class="alert">
							<p><b>Les informations entrées ne sont pas valides</b></p>
							<ul>
								<?php foreach ($errors as $error): ?>
										<li><i class="fas fa-times-circle favicon-error"></i><?= $error; ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>
				</div>

				<!--message de succès pour edition, création de profil-->
				<?php if(isset($_SESSION['message'])): ?>
					<?php 
						echo "<div class='alert-table'>" . $_SESSION['message'] . "</div>";
						unset($_SESSION['message']);
					?>
				<?php endif; ?>

				<!--formulaire de création de profil-->
				<div class="form-group">
					<div class="input">
						<label for="nom_plat">Nom du plat <span class="required">*</span></label>
					</div>
					<div>
						<input type="text" name="nom_plat" required>
					</div>
				</div>
				<div class="form-group">
					<div class="input">
						<label for="type_plat">Type de plat <span class="required">*</span></label>
					</div>
					<div>
						 <select name="type_plat" id="type_plat" class="crud" required>
				              <option value="">--Choisir un type de plat--</option>
				              <option value="entrée">Entrée</option>
				              <option value="plat">Plat</option>
				              <option value="dessert">Dessert</option>
				          </select>
					</div>
				</div>
				<div class="form-group">
					<div class="input">
						<label for="continent_origine">Origine (continent) <span class="required">*</span></label>
					</div>
					<div>
						<select name="continent_origine" class="crud" id="continent_origine" required>
			              <option value="">--Choisir un continent--</option>
			              <option value="Europe">Europe</option>
			              <option value="Amérique">Amérique</option>
			              <option value="Afrique">Afrique</option>
			              <option value="Asie">Asie</option>
			          </select>
					</div>
				</div>
				<div class="form-group">
					<div class="input">
						<label for="regime_alimentaire">Régime alimentaire <span class="required">*</span></label>
					</div>
					<div>
						<select name="regime_alimentaire" class="crud" id="regime_alimentaire" required>
			              <option value="">--Choisir un régime--</option>
			              <option value="flexitarien">Flexitarien</option>
			              <option value="végétarien">Végétarien</option>
			          </select>
					</div>
				</div>
				<div class="form-group">
					<div class="input">
						<label for="text">Photo du plat (max : 500ko) <span class="required">*</span></label>
					</div>
					<div>
						<input type="file" name="photo_plat" required>
					</div>
				</div>
				<div class="form-group">
					<div class="input">
						<label for="text">Description <span class="required">*</span></label>
					</div>
					<div>
						<input type="text" name="description_plat" required>
					</div>
				</div>
				<div class="form-footer">
					<div>
						<button type="submit" class="subscribe subscribe-create" name ="create">Créer ce plat <i class="fas fa-check fav-creer"></i></button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

</body>
</html>