<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats Pongmaster</title>
    <link rel="stylesheet" href="resultat.css">
</head>

<body>

    <?php

    require_once 'config.php';

    // Traitement des données du formulaire ici
    
    // Si des données sont soumises, les récupérer et les traiter
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire
        $exercice = $_POST["exercice"] ?? "Exercice non spécifié";
        $numero = $_POST["numero"] ?? "Numéro non spécifié";
        $vitesse_propulsion = $_POST["vitesse-de-propulsion"] ?? "Vitesse de propulsion non spécifiée";
        $cadence_ejection = $_POST["cadence-d-ejection"] ?? "La Cadence d'ejection non spécifiée";
        $vitesse_oscillation = $_POST["vitesse-d-oscillation"] ?? "La vitesse d'oscillation n'est pas spécifiée";
        $nombre_balles = $_POST["nombre-de-balles"] ?? "Le nombre de balles n'est pas spécifié";
        $nombre_cibles = $_POST["nombre-de-cibles-a-viser"] ?? "Le nombre de cibles à viser n'est pas spécifié";
        $animation_cibles = $_POST["type-d-animation-des-cibles"] ?? "Le type d'animation des cibles n'est pas spécifié";
        $zones_impact = $_POST["zones-d-impact"] ?? "Les zones d'impact ne sont pas spécifiées";

        // // Affichage des données récupérées
        // echo "<div class='centered-text'>";
        // echo "<h2>Résultats de l'exercice :</h2>";
        // echo "<p>Exercice : $exercice</p>";
        // echo "<p>Numéro : $numero</p>";
        // echo "<p>Vitesse de propulsion : $vitesse_propulsion</p>";
        // echo "<p>Cadence d'éjection : $cadence_ejection</p>";
        // echo "<p>Vitesse d'oscillation : $vitesse_oscillation</p>";
        // echo "<p>Nombre de balles : $nombre_balles</p>";
        // echo "<p>Nombre de cibles à viser : $nombre_cibles</p>";
        // echo "<p>Type d'animation des cibles : $animation_cibles</p>";
        // echo "<p>Zones d'impact : $zones_impact</p>";
        // echo "</div>";
    
        // Prépare la requête SQL d'insertion avec des paramètres pour éviter les attaques par injection SQL
        $sql = "INSERT INTO exercices (exercice, numero, vitesse_propulsion, cadence_ejection, vitesse_oscillation,
    nombre_balles, nombre_cibles, animation_cibles, zones_impact)
    VALUES (:exercice, :numero, :vitesse_propulsion, :cadence_ejection, :vitesse_oscillation, :nombre_balles,
    :nombre_cibles, :animation_cibles, :zones_impact)";

        // Préparez la requête
        $stmt = $pdo->prepare($sql);

        // Liez les valeurs récupérées à chaque paramètre de la requête
        $stmt->bindParam(':exercice', $exercice);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':vitesse_propulsion', $vitesse_propulsion);
        $stmt->bindParam(':cadence_ejection', $cadence_ejection);
        $stmt->bindParam(':vitesse_oscillation', $vitesse_oscillation);
        $stmt->bindParam(':nombre_balles', $nombre_balles);
        $stmt->bindParam(':nombre_cibles', $nombre_cibles);
        $stmt->bindParam(':animation_cibles', $animation_cibles);
        $stmt->bindParam(':zones_impact', $zones_impact);

        // Exécutez la requête
        $stmt->execute();

        header("Location:../Index.php");
    }
    ?>
</body>

</html>