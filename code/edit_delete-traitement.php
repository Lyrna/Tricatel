<?php

	require "config.php";

	//SHOW

	require "sql.php";

	//DELETE

	$delete = false;

	if(isset($_GET['delete']) || isset($_POST['delete'])){
		$id = $_GET['delete'];
		$delete = true;
		$req = $dbco->query("DELETE FROM plats WHERE id_plat =  $id");

		$_SESSION['delete'] = "Un plat a été supprimé avec succès";
	}

	//EDIT

	//default values

	$id = 0;
	$update = false;
	$nom_plat = '';
	$type_plat = '';
	$continent_origine = '';
	$regime_alimentaire = '';
	$description_plat = '';
	$photo_plat = '';


	//check if we are in edit mode in url
	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$update = true;
		$req = $dbco->query("SELECT * FROM plats WHERE id_plat = $id");


			if($req == true){
				$row = $req->fetch();
				$nom_plat = $row['nom_plat'];
				$type_plat = $row['type_plat'];
				$continent_origine = $row['continent_origine'];
				$regime_alimentaire = $row['regime_alimentaire'];
				$description_plat = $row['description_plat'];
				$photo_plat = $row['photo_plat'];
			}
	}

	//ERRORS
	if(!empty($_POST)){

		if(empty($_POST['nom_plat']) || !preg_match('/^[a-zA-Z0-9_éèàêâûî\s]+$/', $_POST['nom_plat'])){
		$errors['nom_plat'] = "Votre nom de plat n'est pas valide";
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
	}

	//UPDATE DATABASE

	if(empty($errors) && isset($_POST['update'])){
		$id = $_POST['id_plat'];
		$nom_plat = $_POST['nom_plat'];
		$type_plat = $_POST['type_plat'];
		$continent_origine = $_POST['continent_origine'];
		$regime_alimentaire = $_POST['regime_alimentaire'];
		$description_plat = $_POST['description_plat'];
		

		//PHOTO

			if(!empty($_FILES['photo_plat']['tmp_name'])){
				$maxSize = 500000;
				$fileSize = $_FILES['photo_plat']['size'];
				$validExtension = array('.jpg', '.jpeg', '.png');
				$fileName = $_FILES['photo_plat']['name'];
				$fileExtension = '.' . strtolower(substr(strchr($fileName,'.'), 1));

				if($fileSize > $maxSize){
					$errors['photo_plat'] = "La taille du fichier excède 500ko : ".$fileSize." ko";
				}

				

				if(!in_array($fileExtension, $validExtension)){
					$errors['photo_plat'] = "L'image n'a pas une extension correcte";
				}

				if(empty($errors)){

					$tmp_fileName = $_FILES['photo_plat']['tmp_name'];
					$uniqueName = md5(uniqid(rand(),true));
					$fileName = "../assets/img/plats/".$uniqueName.$fileExtension;
					$stmpFileName = move_uploaded_file($tmp_fileName, $fileName);

					$dbco->query("
						UPDATE plats 
						SET 
						nom_plat = '$nom_plat',
						type_plat = '$type_plat',
						continent_origine = '$continent_origine',
						regime_alimentaire = '$regime_alimentaire',
						photo_plat = '$fileName',
						description_plat = '$description_plat'
						WHERE id_plat = $id
						");

						$_SESSION['message'] = "Un plat a été modifié avec succès";
				}
			}

			if(empty($_FILES['photo_plat']['tmp_name']) && empty($errors))
			{
				$dbco->query("
					UPDATE plats 
					SET 
					nom_plat = '$nom_plat',
					type_plat = '$type_plat',
					continent_origine = '$continent_origine',
					regime_alimentaire = '$regime_alimentaire',
					description_plat = '$description_plat'
					WHERE id_plat = $id
					");

					$_SESSION['message'] = "Un plat a été modifié avec succès";
			}

	}


?>