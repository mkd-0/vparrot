<?php
// Informations de connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "dbparrot";

// Création d'une connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données : " . $connexion->connect_error);
}

// Données de l'utilisateur à insérer
$nom = "Doe";
$prenom = "John";
$roles = "ROLE_ADMIN";
//$email = "john.doe@example.com";
//$motDePasse = password_hash("mot_de_passe", PASSWORD_DEFAULT); // Vous devriez toujours hacher les mots de passe !

// Requête SQL préparée pour insérer l'utilisateur
$stmt = $connexion->prepare("INSERT INTO test (nom, prenom, roles) VALUES (?, ?, ?)");

// Liaison des valeurs aux paramètres de la requête
$stmt->bind_param("sss", $nom, $prenom, $roles);

// Exécution de la requête
if ($stmt->execute()) {
    echo "L'utilisateur a été inséré avec succès.";
} else {
    echo "Erreur lors de l'insertion de l'utilisateur : " . $stmt->error;
}

// Fermeture de la requête préparée et de la connexion
$stmt->close();
$connexion->close();
?>

