<?php

    // $servername = 'sql307.epizy.com';
    // $dbname = 'epiz_28404988_tricatel';
    // $username = 'epiz_28404988';
    // $password = 'Simplon01';

    $servername = 'localhost';
    $dbname = 'tricatel';
    $username = 'root';
    $password = 'Simplon01';

    try{ //creation of the database

        $dbco = new PDO("mysql:host=$servername", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        $dbco->exec($sql);

        echo "DATABASE 'tricatel' is successfully installed.</br>";
    }

    catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
    }

    try{ //creation of all my tables

        $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $table_admin = "CREATE TABLE IF NOT EXISTS admin(
            id_admin INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name_admin VARCHAR(20) NOT NULL,
            password VARCHAR(100) NOT NULL)";

        $table_plats = "CREATE TABLE IF NOT EXISTS plats(
            id_plat INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nom_plat VARCHAR(30) NOT NULL,
            photo_plat VARCHAR(100) NOT NULL,
        	type_plat VARCHAR(100) NOT NULL,
        	description_plat VARCHAR(500) NOT NULL,
        	continent_origine VARCHAR(30) NOT NULL,
        	regime_alimentaire VARCHAR(30) NOT NULL)";

        $dbco->exec($table_admin);
        $dbco->exec($table_plats);

        echo "Tables 'admin' and 'plats' successfully installed.<br/>";
    }
    
    catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
    }

    try{ //creation of values in my tables
    	$dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $plat_1 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Raclette',
        '../assets/img/plats/raclette.jpg',
        'plat',
        'Fromage fondu avec plateau de charcuterie',
        'Europe',
        'flexitarien')";

        $dbco->exec($plat_1);

        $plat_2 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Pizza mozzarella',
        '../assets/img/plats/pizza.jpg',
        'plat',
        'Pizza avec sa mozzarella fondante et ses tomates fraîches',
        'Europe',
        'végétarien')";

        $dbco->exec($plat_2);

        $plat_3 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Couscous',
        '../assets/img/plats/couscous.jpg',
        'plat',
        'Couscous de qualité fait maison',
        'Afrique',
        'flexitarien')";

        $dbco->exec($plat_3);

        $plat_4 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Salade asiatique',
        '../assets/img/plats/sushi.jpg',
        'entrée',
        'Une salade fraîcheur à la saveur orientale',
        'Asie',
        'flexitarien')";

        $dbco->exec($plat_4);

        $plat_5 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Hamburger frites',
        '../assets/img/plats/burger.jpg',
        'plat',
        'Frites dorées au four accompagnées du fidèle Hamburger',
        'Amérique',
        'flexitarien')";

        $dbco->exec($plat_5);

        $plat_6 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Pancakes',
        '../assets/img/plats/pancakes.jpg',
        'dessert',
        'Les pancakes, le petit déjeuner gourmand par excellence',
        'Europe',
        'végétarien')";

        $dbco->exec($plat_6);

        $plat_7 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Salade ananas',
        '../assets/img/plats/salade_ananas.jpg',
        'entrée',
        'La salade aux ananas recommandée pour un rengain de fraîcheur pour combler votre été',
        'Europe',
        'végétarien')";

        $dbco->exec($plat_7);

        $plat_8 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Spaghetti à la tomate',
        '../assets/img/plats/spaghetti.jpg',
        'plat',
        'Des pâtes accompagnées de leur tomate du jardin',
        'Europe',
        'végétarien')";

        $dbco->exec($plat_8);

        $plat_9 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Tomates farcies',
        '../assets/img/plats/tomates_farcies.jpg',
        'plat',
        'Des tomates fraîches et une farce du traiteur qui constituent un plat hivernal à manger en toute saison',
        'Europe',
        'flexitarien')";

        $dbco->exec($plat_9);

        $plat_10 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Gâteau au chocolat',
        '../assets/img/plats/chocolat.jpg',
        'dessert',
        'Gâteau au chocolat accompagnée de son lit de fraises',
        'Europe',
        'végétarien')";

        $dbco->exec($plat_10);

        $plat_11 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Confiseries asiatiques',
        '../assets/img/plats/confiserie_asiatique.jpg',
        'dessert',
        'Confiseries asiatiques à goûter pour les plus curieux',
        'Asie',
        'flexitarien')";

        $dbco->exec($plat_11);

        $plat_12 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Foie gras',
        '../assets/img/plats/foiegras.jpg',
        'entrée',
        'Une luxueuse entrée à prix abordable pour les amateurs de foie gras',
        'Europe',
        'flexitarien')";

        $dbco->exec($plat_12);

        $plat_13 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Curiosité asiatique',
        '../assets/img/plats/plat_asie.jpg',
        'plat',
        'Un plat de légumes frais pour un été au top',
        'Asie',
        'flexitarien')";

        $dbco->exec($plat_13);

        $plat_14 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Gâteau et gelée de fraise',
        '../assets/img/plats/dessert_americain.jpg',
        'dessert',
        'Un dessert américain pour le plaisir de tous',
        'Amérique',
        'flexitarien')";

        $dbco->exec($plat_14);

        $plat_15 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Dessert asiatique',
        '../assets/img/plats/breakfast.jpg',
        'dessert',
        'Un dessert américain végétarien chaud et savoureux',
        'Asie',
        'végétarien')";

        $dbco->exec($plat_15);

        $plat_16 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Apple Pie',
        '../assets/img/plats/applepie.jpg',
        'dessert',
        'Le dessert américain renommé par excellence, un classique à ne pas rater',
        'Amérique',
        'végétarien')";

        $dbco->exec($plat_16);

        $plat_17 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Malvapoeding',
        '../assets/img/plats/malvapoeding.jpg',
        'dessert',
        'Un dessert africain gourmand, avec de la glace vanille et des abricots',
        'Afrique',
        'végétarien')";

        $dbco->exec($plat_17);

        $plat_18 = "INSERT IGNORE INTO plats(
        nom_plat,
        photo_plat,
        type_plat,
        description_plat,
        continent_origine,
        regime_alimentaire)

        VALUES(
        'Roly Poly',
        '../assets/img/plats/rolypoly.jpg',
        'dessert',
        'Un dessert africain gourmand fourré aux abricots',
        'Afrique',
        'flexitarien')";

        $dbco->exec($plat_18);

        //creation of the admin

        $name_admin = 'adminSimplon';
        $password_admin = password_hash('123', PASSWORD_DEFAULT);

        $stmt = $dbco->prepare("INSERT INTO admin (name_admin, password) VALUES (:name_admin, :password)");
        $stmt->bindParam(':name_admin', $name_admin);
        $stmt->bindParam(':password', $password_admin);
        $stmt->execute();

        echo "9 plats and 1 admin are successfully added to the DATABASE.</br></br>DONT REFRESH THIS PAGE ANYMORE.</br></br> Go to the INDEX page.";
        }

    catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
    }

?>