<?php

  require 'config.php';

  //function debug
  function debug($variable){
   echo '<pre>' . print_r($variable, true) . '</pre>';
  }

  //création d'un tableau des erreurs de connexion possibles
  $errors = array();


  if(isset($_POST['name_admin']) && isset($_POST['password'])){
    //je récupère le pseudo saisie par l'utilisateur
    $name_admin = $_POST['name_admin'];
    //je récupère les pseudo et mots de passe associés de la bdd
    $requete = $dbco->prepare('SELECT name_admin, password FROM admin WHERE name_admin = ?');
    $requete->execute([$_POST['name_admin']]);
    $identification_db = $requete->fetch();

        //je vérifie que le pseudo existe en bdd
        if($identification_db){
          //je vérifie le mot de passe
          if(password_verify($_POST['password'], $identification_db['password'])){
            //si tout est bon, la session peut commencer
            session_start();
            $_SESSION['auth'] = $identification_db;
            header('Location: code/admin.php');
            exit();
          }  else {
              $errors['error'] = "Mot de passe incorrect";
            } 
        } else {
            $errors['error'] = "Identifiant incorrect";  
          }
  }

  // debug($errors);

?>

