<?php
// Informations de connexion à la base de données
$serveur = "127.0.0.1:3306";
$utilisateur = "root";
$motdepasse = "";
$base_de_donnees = "dbparrot";


// DATABASE_URL="mysql://root@127.0.0.1:3306/dbparrot?serverVersion=10.11.2-MariaDB&charset=utf8mb4"

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $base_de_donnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Erreur de connexion à la base de données : " . $connexion->connect_error);
}

// Données de l'utilisateur à insérer
$email = "vparrot@parrot.fr";
$roles = 'ROLE_ADMIN'; //
$password = password_hash("dbparrot", PASSWORD_DEFAULT); // Hash du mot de passe
$lastname = "Parrot";
$firstname = "Vincent";


// Requête d'insertion de l'utilisateur dans la table "utilisateurs"
$sql = "INSERT INTO user (email, roles, password, lastname, firstname) 
        VALUES ('$email', '$roles, '$password', '$lastname', '$firstname')";




if ($connexion->query($sql) === TRUE) {
    echo "Utilisateur créé avec succès.";
} else {
    echo "Erreur lors de la création de l'utilisateur : " . $connexion->error;
}

// Fermer la connexion à la base de données
$connexion->close();
?>


