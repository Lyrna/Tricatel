<?php require "config.php" ?>

<?php

   //function debug
  function debug($variable){
   echo '<pre>' . print_r($variable, true) . '</pre>';
  }

  //création d'un tableau des erreurs de connexion possibles
  $errors = array();

//CREATE A PLATE

    if(!empty($_POST)){

		if(empty($_POST['nom_plat']) || !preg_match('/^[a-zA-Z0-9_éèàêâûî\s]+$/', $_POST['nom_plat'])){
		$errors['nom_plat'] = "Votre nom de plat n'est pas valide";
		} else {
			$requete = $dbco->prepare('SELECT id_plat FROM plats WHERE nom_plat = ?');
			$requete->execute([$_POST['nom_plat']]);
			$stmt_plats = $requete->fetch();
				if($stmt_plats){
					$errors['nom_plat'] = "Ce plat existe déjà";
				}
		}

		if(empty($_POST['type_plat']) || !preg_match('/^[a-zA-Zéèàêâûî\s]+$/', $_POST['type_plat'])){
			$errors['type_plat'] = "Votre type de plat n'est pas valide";
		}

		if(empty($_POST['continent_origine']) || !preg_match('/^[a-zA-Zéèàêâûî\s]+$/', $_POST['continent_origine'])){
			$errors['continent_origine'] = "Votre origine de plat n'est pas valide";
		}

		if(empty($_POST['regime_alimentaire']) || !preg_match('/^[a-zA-Zéèàêâûî\s]+$/', $_POST['regime_alimentaire'])){
			$errors['regime_alimentaire'] = "Le régime alimentaire n'est pas valide";
		}

		if(empty($_POST['description_plat']) || !preg_match('/^[a-zA-Zéèàêâûî\s]+$/', $_POST['description_plat'])){
			$errors['description_plat'] = "La description du plat n'est pas valide";
		}

		if(empty($errors) && isset($_POST['create'])){
			
			//mes variables
			$nom_plat = $_POST['nom_plat'];
			$type_plat =  $_POST['type_plat'];
			$continent_origine = $_POST['continent_origine'];
			$regime_alimentaire = $_POST['regime_alimentaire'];
			$description_plat = $_POST['description_plat'];

			//variable photo
			$maxSize = 500000;
			$fileSize = $_FILES['photo_plat']['size'];

			$validExtension = array('.jpg', '.jpeg', '.png');

			if($fileSize > $maxSize){
				$errors['photo_plat'] = "La taille du fichier excède 500ko : ".$fileSize." ko";
			}

			$fileName = $_FILES['photo_plat']['name'];
			$fileExtension = '.' . strtolower(substr(strchr($fileName,'.'), 1));

			if(!in_array($fileExtension, $validExtension)){
				$errors['photo_plat'] = "L'image n'a pas une extension correcte";
			}

			$tmp_fileName = $_FILES['photo_plat']['tmp_name'];
			$uniqueName = md5(uniqid(rand(),true));
			$fileName = "../assets/img/plats/".$uniqueName.$fileExtension;
			$stmpFileName = move_uploaded_file($tmp_fileName, $fileName);


			//requête d'envoi de formulaire
			if(empty($errors)){
				$requete = $dbco->prepare('INSERT INTO plats SET nom_plat = ?, type_plat = ?, continent_origine = ?, regime_alimentaire = ?, description_plat = ?, photo_plat = ?');

				$requete->execute([$nom_plat, $type_plat, $continent_origine, $regime_alimentaire, $description_plat, $fileName]);

				$_SESSION['message'] = "Un plat a été ajouté avec succès";
			}
		}
	}

// debug($errors);

 ?>