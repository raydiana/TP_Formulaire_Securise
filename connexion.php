<?php
// Connexion à la base de données

$host = 'localhost';
$dbname = 'formulaire';
$Username = 'root';
$password = '';

if(isset($_POST['valider'])){

    $conn = new PDO("mysql:host=$host;dbname=$dbname","$Username","$password");

    // Récupération des données de connexion de l'utilisateur
    $username = $_POST['username'];
    $mot_de_passe_hache = sha1($_POST['mot_de_passe']);

    // Requête SQL pour récupérer les informations de l'utilisateur
    $sql = "SELECT * FROM connexion WHERE username = :username AND mot_de_passe=:mot_de_passe";
    $stmt = $conn->prepare($sql);
    //$stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute(array("username"=>$username, "mot_de_passe"=>$mot_de_passe_hache));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$user){
        echo 'Erreur, recommencez';
    }
    else{
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        echo 'Vous etes connecté';
    }
}


