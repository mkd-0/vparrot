# Guide d'installation du projet sous symfony

Ce guide vous montrera comment installer le projet V PARROT

## Prérequis

Avoir installer Symfony, assurez-vous d'avoir les éléments suivants installés sur votre système :

- PHP >= 7.2
- Composer (gestionnaire de dépendances pour PHP)
- Symfony CLI (facultatif, mais recommandé)

## Étapes d'installation

Suivez ces étapes  :

1. Clonez le dépôt  dans le répertoire de votre choix :

cd projects/
git clone https://github.com/mkd-0/vparrot.git


2. Creer le projet symfony
cd my-project/
composer install

3. Démarrer le serveur
cd my-project/
symfony server:start (ou start -d)

4. Créer et installer la bdd (vparrot)


5. Effectuer les migrations


6. Créer un utilisateur ADMIN en lancant la requête dans un fichier .php
<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", vparrot

// Vérifier la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion à la base de données : " . $mysqli->connect_error);
}

// Données de l'utilisateur
$username = "nom_utilisateur_admin";
$password = "mot_de_passe_admin";
$hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash du mot de passe

// Rôle de l'utilisateur (admin)
$role = "admin";

// Requête SQL pour insérer l'utilisateur dans la table des utilisateurs
$query = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("sss", $username, $hashedPassword, $role);

// Exécuter la requête
if ($stmt->execute()) {
    echo "Utilisateur admin créé avec succès.";
} else {
    echo "Erreur lors de la création de l'utilisateur : " . $stmt->error;
}

// Fermer la connexion
$stmt->close();
$mysqli->close();
?>


7.Connectez vous avec vos identifiants

8.Rappel des routes
/admin/user       (accès admin)
/admin/hour       (accès admin)
/admin/service    (accès admin)
/admin/car        (accès moderateur)
/admin/testimony (accès moderateur)


/admin/c


