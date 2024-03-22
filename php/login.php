<?php
// Démarrer la session
session_start();
// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'config.php';
    try {
        // Connexion à la base de données avec PDO
        $connexion = new PDO("mysql:host=$DB_SERVER;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);

        // Préparer la requête SQL pour récupérer l'utilisateur
        $requete = $connexion->prepare("SELECT * FROM utilisateurs WHERE (username = :identifier OR email = :identifier)");
        $requete->bindParam(':identifier', $_POST['identifier']);
        $requete->execute();
        $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($utilisateur && password_verify($_POST['password'], $utilisateur['mot_de_passe'])) {

            $_SESSION['utilisateur_connecte'] = true;
            // Rediriger vers la page d'accueil connectée
            header("Location:../Index.php");
            exit; // Assurez-vous d'arrêter l'exécution du script après la redirection
        } else {
            $message_erreur = "Identifiants incorrects.";
            // Stocker le message d'erreur dans la session
            $_SESSION['message_erreur'] = $message_erreur;
            // Rediriger vers la page de connection
            header("Location: connection.php");
            exit;
        }

        // Fermeture de la connexion à la base de données
        $connexion = null;
    } catch (PDOException $e) {
        $message_erreur = "Échec de la connexion : " . $e->getMessage();
    }
}
?>