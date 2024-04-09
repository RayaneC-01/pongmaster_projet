<?php
// Démarrer la session
session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Inclure le fichier de configuration de la base de données
    require 'config.php';

    // Récupérer les données du formulaire
    $exercice = $_POST["exercice"] ?? "";
    $numero = $_POST["numero"] ?? "";
    $vitesse_propulsion = $_POST["vitesse-de-propulsion"] ?? "";
    $cadence_ejection = $_POST["cadence-d-ejection"] ?? "";
    $vitesse_oscillation = $_POST["vitesse-d-oscillation"] ?? "";
    $nombre_balles = $_POST["nombre-de-balles"] ?? "";
    $nombre_cibles = $_POST["nombre-de-cibles-a-viser"] ?? "";
    $animation_cibles = $_POST["type-d-animation-des-cibles"] ?? "";
    $zones_impact = $_POST["zones-d-impact"] ?? "";

    try {
        // Préparer la requête SQL d'insertion des données
        $insert_query = $connexion->prepare("INSERT INTO exercices (exercice, numero, vitesse_propulsion, cadence_ejection, 
            vitesse_oscillation, nombre_balles, nombre_cibles, animation_cibles, zones_impact) 
            VALUES (:exercice, :numero, :vitesse_propulsion, :cadence_ejection, :vitesse_oscillation, 
            :nombre_balles, :nombre_cibles, :animation_cibles, :zones_impact)");
        $insert_query->bindParam(':exercice', $exercice);
        $insert_query->bindParam(':numero', $numero);
        $insert_query->bindParam(':vitesse_propulsion', $vitesse_propulsion);
        $insert_query->bindParam(':cadence_ejection', $cadence_ejection);
        $insert_query->bindParam(':vitesse_oscillation', $vitesse_oscillation);
        $insert_query->bindParam(':nombre_balles', $nombre_balles);
        $insert_query->bindParam(':nombre_cibles', $nombre_cibles);
        $insert_query->bindParam(':animation_cibles', $animation_cibles);
        $insert_query->bindParam(':zones_impact', $zones_impact);
        // Exécuter la requête
        $insert_query->execute();

        // Rediriger vers la page d'accueil avec un message de succès
        $_SESSION['message_succes'] = "Les données ont été ajoutées avec succès.";
        header('Location: ../index.php');
        exit;
    } catch (PDOException $e) {
        // En cas d'erreur, enregistrer le message d'erreur dans la session et rediriger vers la page d'accueil
        $_SESSION['message_erreur'] = "Erreur lors de l'ajout des données : " . $e->getMessage();
        header("Location: ../index.php");
        exit;
    }
} else {
    // Si le formulaire n'a pas été soumis, rediriger vers la page d'accueil
    header('Location: ../index.php');
    exit;
}
?>