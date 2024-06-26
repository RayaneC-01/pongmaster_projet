<?php

// Configuration de la base de données
// Informations de connexion à la base de données
$DB_SERVER = 'localhost'; // Adresse du serveur MySQL
$DB_NAME = 'pongmaster'; // Nom de la base de données
$DB_USERNAME = 'root'; // Nom d'utilisateur de la base de données
$DB_PASSWORD = ''; // Mot de passe de la base de données

// Connexion à la base de données avec PDO
try {
    $connexion = new PDO("mysql:host=$DB_SERVER;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
    // Définition des attributs PDO pour obtenir les erreurs de requête SQL
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection established !\n";
} catch (PDOException $e) {
    // En cas d'échec de la connexion, afficher l'erreur
    die("Échec de la connexion : " . $e->getMessage());
}
?>