<?php

// Démarrer la session
session_start();

// Inclure le fichier de configuration de la base de données
require 'config.php';

// Vérifier si le formulaire d'inscription a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["mot_de_passe"];
    $confirm_password = $_POST["confirmation_mot_de_passe"];

    // Vérifier si les mots de passe correspondent
    if ($password !== $confirm_password) {
        // Enregistrer un message d'erreur dans la session et rediriger vers la page d'inscription
        $_SESSION['message_erreur'] = "Les mots de passe ne correspondent pas.";
        header("Location: ../php/sign_up.php");
        exit;
    }

    // Hasher le mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Préparer la requête SQL d'insertion des données
        $insert_query = $connexion->prepare("INSERT INTO utilisateurs (username, email, mot_de_passe) VALUES (:username, :email, :password)");
        $insert_query->bindParam(':username', $username);
        $insert_query->bindParam(':email', $email);
        $insert_query->bindParam(':password', $hashed_password);
        // Exécuter la requête
        $insert_query->execute();

        // Rediriger vers la page d'accueil avec un message de succès
        $_SESSION['message_succes'] = "Inscription réussie! Bienvenue sur le site.";
        echo "Redirection en cours..."; // Ajoutez cette ligne pour le débogage
        header('Location: ../index.php');
        die();

    } catch (PDOException $e) {
        // En cas d'échec, enregistrer le message d'erreur dans la session et rediriger vers la page d'inscription
        $_SESSION['message_erreur'] = "Échec de l'inscription : " . $e->getMessage();
        header("Location: ../php/sign_up.php");
        exit;
    }
}
?>