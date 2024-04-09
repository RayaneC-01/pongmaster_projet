<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require '../php/config.php';

    try {
        $connexion = new PDO("mysql:host=$DB_SERVER;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete = $connexion->prepare("SELECT * FROM utilisateurs WHERE (username = :identifier OR email = :identifier)");
        $requete->bindParam(':identifier', $_POST['identifier']);
        $requete->execute();

        $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur && password_verify($_POST['password'], $utilisateur['mot_de_passe'])) {
            $_SESSION['utilisateur_connecte'] = true;
            header('Location: ../index.php'); // Redirection vers index.php après connexion réussie
            exit;
        } else {
            $message_erreur = "Identifiants incorrects.";
            $_SESSION['message_erreur'] = $message_erreur;
            header("Location: ../php/sign_in.php");
            exit;
        }
    } catch (PDOException $e) {
        $message_erreur = "Échec de la connexion : " . $e->getMessage();
        $_SESSION['message_erreur'] = $message_erreur;
        header("Location: ../php/sign_in.php");
        exit;
    }
}

?>