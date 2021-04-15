<?php

$errors = array();


// récupérer les plats
$plats = "
  SELECT * 
  FROM plats";


try{
  $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $dbco->query($plats);

  if($stmt === false){
  die("Erreur");
  }
}

catch (PDOException $e){
  echo $e->getMessage();
}

//fonction de tri

if(isset($_POST['search'])){

  $type_plat = $_POST['type_plat'];
  $continent_origine = $_POST['continent_origine'];
  $regime_alimentaire = $_POST['regime_alimentaire'];

  //all champs are selected
  if(!empty($type_plat) AND !empty($continent_origine) AND !empty($regime_alimentaire)){

    $tri = "SELECT * FROM plats WHERE type_plat = '$type_plat' AND continent_origine = '$continent_origine' AND regime_alimentaire = '$regime_alimentaire'";

     try{
      $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt_tri = $dbco->query($tri);

      $row = $stmt_tri->fetch(PDO::FETCH_ASSOC);
      if ($row == 0){
        $errors['no_result'] = "Aucun plat ne correspond à ces critères";
      } else {$stmt_tri = $dbco->query($tri);}
      
      if($stmt_tri === false){
      die("Erreur");
      } 
    }

    catch (PDOException $e){
      echo $e->getMessage();
    }
  }

  //only type is selected
  if(!empty($type_plat) AND empty($continent_origine) AND empty($regime_alimentaire)){

    $tri = "SELECT * FROM plats WHERE type_plat = '$type_plat'";

     try{
      $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt_tri = $dbco->query($tri);

      $row = $stmt_tri->fetch(PDO::FETCH_ASSOC);
      if ($row == 0){
        $errors['no_result'] = "Aucun plat ne correspond à ces critères";
      } else {$stmt_tri = $dbco->query($tri);}

      if($stmt_tri === false){
      die("Erreur");
      }
    }

    catch (PDOException $e){
      echo $e->getMessage();
    }
  }

  //only origine is selected
  if(empty($type_plat) AND !empty($continent_origine) AND empty($regime_alimentaire)){

    $tri = "SELECT * FROM plats WHERE continent_origine = '$continent_origine'";

     try{
      $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt_tri = $dbco->query($tri);

      $row = $stmt_tri->fetch(PDO::FETCH_ASSOC);
      if ($row == 0){
        $errors['no_result'] = "Aucun plat ne correspond à ces critères";
      } else {$stmt_tri = $dbco->query($tri);}

      if($stmt_tri === false){
      die("Erreur");
      }
    }

    catch (PDOException $e){
      echo $e->getMessage();
    }
  }

  //only regime is selected
  if(empty($type_plat) AND empty($continent_origine) AND !empty($regime_alimentaire)){

    $tri = "SELECT * FROM plats WHERE regime_alimentaire = '$regime_alimentaire'";

     try{
      $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt_tri = $dbco->query($tri);

      $row = $stmt_tri->fetch(PDO::FETCH_ASSOC);
      if ($row == 0){
        $errors['no_result'] = "Aucun plat ne correspond à ces critères";
      } else {$stmt_tri = $dbco->query($tri);}

      if($stmt_tri === false){
      die("Erreur");
      }
    }

    catch (PDOException $e){
      echo $e->getMessage();
    }
  }

  //type AND origine are selected
  if(!empty($type_plat) AND !empty($continent_origine) AND empty($regime_alimentaire)){

    $tri = "SELECT * FROM plats WHERE type_plat = '$type_plat' AND continent_origine = '$continent_origine'";

     try{
      $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt_tri = $dbco->query($tri);

      $row = $stmt_tri->fetch(PDO::FETCH_ASSOC);
      if ($row == 0){
        $errors['no_result'] = "Aucun plat ne correspond à ces critères";
      } else {$stmt_tri = $dbco->query($tri);}

      if($stmt_tri === false){
      die("Erreur");
      }
    }

    catch (PDOException $e){
      echo $e->getMessage();
    }
  }

  //type AND regime are selected
  if(!empty($type_plat) AND empty($continent_origine) AND !empty($regime_alimentaire)){

    $tri = "SELECT * FROM plats WHERE type_plat = '$type_plat' AND regime_alimentaire = '$regime_alimentaire'";

     try{
      $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt_tri = $dbco->query($tri);

      $row = $stmt_tri->fetch(PDO::FETCH_ASSOC);
      if ($row == 0){
        $errors['no_result'] = "Aucun plat ne correspond à ces critères";
      } else {$stmt_tri = $dbco->query($tri);}

      if($stmt_tri === false){
      die("Erreur");
      }
    }

    catch (PDOException $e){
      echo $e->getMessage();
    }
  }

  //origine AND regime are selected
  if(empty($type_plat) AND !empty($continent_origine) AND !empty($regime_alimentaire)){

    $tri = "SELECT * FROM plats WHERE continent_origine = '$continent_origine' AND regime_alimentaire = '$regime_alimentaire'";

     try{
      $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt_tri = $dbco->query($tri);

      $row = $stmt_tri->fetch(PDO::FETCH_ASSOC);
      if ($row == 0){
        $errors['no_result'] = "Aucun plat ne correspond à ces critères";
      } else {$stmt_tri = $dbco->query($tri);}

      if($stmt_tri === false){
      die("Erreur");
      }
    }

    catch (PDOException $e){
      echo $e->getMessage();
    }
  }


}

?>