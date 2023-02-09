<?php

$host = 'localhost';
$dbname = 'form_securise';
$Username = 'root';
$password = '';

if(isset($_POST['insert'])){

  try {
  // se connecter à mysql
  $pdo = new PDO("mysql:host=$host;dbname=$dbname","$Username","$password");
  } catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
  }
  
  // récupérer les valeurs 
  $username= $_POST['username'];
  $email=$_POST['email'];
  $mot_de_passe = sha1($_POST['mot_de_passe']);

  // Requête mysql pour insérer des données
  $sql = "INSERT INTO `connexion`(`username`, `email`, `mot_de_passe`, date_inscription) VALUES (:username, :email, :mot_de_passe, CURDATE())";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(":username"=>$username, ":email"=>$email, ":mot_de_passe"=>$mot_de_passe));

  // vérifier si la requête d'insertion a réussi
  if($exec){
    echo 'Données insérées';
  }else{
    echo "Échec de l'opération d'insertion";
  }
}
?>