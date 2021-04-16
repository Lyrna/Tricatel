<?php 
	session_start(); 
	if(!isset($_SESSION['auth'])){
		header('Location: ../index.php');
		exit();
	}
?>

<?php require "edit_delete-traitement.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/c70a4c5665.js" crossorigin="anonymous"></script>
	<link rel="icon" type="image/png" sizes="60x60" href="../assets/img/logo/favicon.png">
	<link rel="stylesheet" href="../assets/css/style.css">
	<title>Tricatel - Admin - Editer/Supprimer</title>
</head>
<body>

<header class="header-admin">
	<div>
		<div class="admin-mode-section"><img src="../assets/img/logo/logo.png" height="60px" width="60px" alt="logo Tricatel sur fond noir, orange et rouge"/><h1 class="grey">Tricatel</h1></a></div>
	</div>
	<div class="admin-mode">
		<div class="admin-mode-section"><a href="admin.php" class="link-edit"><i class="fas fa-pen-fancy fa-utensils-2"></i><span class="hidden">Création</span></a></div>
		<div class="admin-mode-section"><a href="edit_delete.php" class="link-edit"><i class="fas fa-edit"></i><span class="hidden">Gestion des plats</span></a></div>
		<div class="admin-mode-section"><a href="view.php" class="link-edit"><i class="fas fa-eye fa-utensils-2"></i><span class="hidden">Voir le site</span></a></div>
		<div class="admin-mode-section"><a href="deconnexion.php" class="link-edit"><i class="fas fa-power-off fa-utensils-2"></i><span class="hidden">Déconnexion</span></a></div>
	</div>
</header>

<div class="bg-light">
	<h2 class="grey p-2">Editer ou supprimer un plat</h2>
	<hr/>
	<?php if($update == true): ?>
	<h2 class="orange admin">Vous éditez un plat</h2>
	<?php endif; ?>

	<!--success message for deleting a plate-->
	<?php if(isset($_SESSION['delete'])): ?>
		<?php if($delete == true): ?>
			<?php 
				echo "<div class='alert-table'><a href='edit_delete.php'><button class='subscribe subscribe-delete-absolute'>
				<i class='fas fa-times'></i>
				Fermer</button></a>" . $_SESSION['delete'] . "</div>";
				unset($_SESSION['delete']);
			?>
		<?php endif; ?>
	<?php endif; ?>

	<!--success message for editing successfully a plate-->
	<?php if(isset($_SESSION['message'])): ?>
		<?php 
			echo "<div class='alert-table'><a href='edit_delete.php'><button class='subscribe subscribe-delete-absolute'>
				<i class='fas fa-arrow-left'></i>
				Retour</button></a>" . $_SESSION['message'] . "</div>";
			unset($_SESSION['message']);
		?>
	<?php endif; ?>

	<?php if($update == false): ?>
	<!--showing cards with all plates with buttons for deleting and editing-->
	<div class="container-grid">
	  <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
	    <div class="card">
	      <div>
	        <h3 class="title-plat"><?php echo $row['nom_plat'] ?></h3>
	        <?php echo "<img src=".$row['photo_plat']." alt='image dédiée au plat associé' class='img_plat'/>"; ?>
	        <?php
	        echo "<a href=edit_delete.php?edit=" . $row['id_plat'] . ">
					<button class='edit' name='edit'>Editer <i class='fas fa-pencil-alt'></i></button></a>
	        <a href=edit_delete.php?delete=" . $row['id_plat'] . ">
			<button class='delete' name='delete'>Supprimer <i class='fas fa-trash-alt'></i></button></a>"
			?>
	        <p class="description_plat"><?php echo $row['description_plat'] ?></p>
	        <p class="details_plats"><i class="fas fa-check"></i><?php echo $row['regime_alimentaire'] ?></p>
	        <p class="details_plats"><i class="fas fa-tags"></i><?php echo $row['type_plat'] ?></p>
	        <p class="details_plats"><i class="fas fa-globe"></i> <?php echo $row['continent_origine'] ?></p>
	      </div>
	    </div>
	  <?php endwhile; ?>
	</div>
	<?php endif; ?>


	<?php if($update == true): ?>
	<!--form for editing the card selected-->
	<div class="container-admin">
		<div class="login-form">
			<form action="" method="POST" enctype="multipart/form-data">

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
				<input type="hidden" name="id_plat" value="<?php echo $id; ?>">
				<div class="form-group">
					<div class="input">
						<label for="nom_plat">Nom du plat <span class="required">*</span></label>
					</div>
					<div>
						<input type="text" name="nom_plat" value="<?php echo $nom_plat; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<div class="input">
						<label for="type_plat">Type de plat <span class="required">*</span></label>
					</div>
					<div>
						<select name="type_plat"class="crud" id="type_plat" required>
				            <option value="<?php echo $type_plat; ?>">--<?php echo $type_plat; ?>--</option>
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
			                <option value="<?php echo $continent_origine; ?>">--<?php echo $continent_origine; ?>--</option>
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
			              <option value="<?php echo $regime_alimentaire; ?>">--<?php echo $regime_alimentaire; ?>--</option>
			              <option value="flexitarien">Flexitarien</option>
			              <option value="végétarien">Végétarien</option>
			          </select>
					</div>
				</div>
				<div class="form-group">
					<div class="input">
						<label for="regime_alimentaire">Photo du plat (max 500ko) <span class="required">*</span></label>
					</div>
					<div>
						<img src="<?php echo $photo_plat; ?>" alt="photo_plat" class="img_plat_crud">
						<input type="file" name="photo_plat" value="<?php echo $photo_plat; ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="input">
						<label for="text">Description <span class="required">*</span></label>
					</div>
					<div>
						<input type="text" name="description_plat" value="<?php echo $description_plat; ?>" required>
					</div>
				</div>
				<div class="form-footer">
					<div>
						<button type="submit" class="subscribe subscribe-create" name ="update">Confirmer <i class="fas fa-check"></i></button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php endif ?>

</div>

</body>
</html>