<?php
// Vérifier si l'utilisateur est connecté avant d'afficher cette page
session_start();
if (empty($_SESSION['utilisateur_connecte'])) {
    header('Location: ../php/sign_in.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil page Pongmaster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/CSS/style_pongmaster.css" />
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="index.php">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <a href="../php/sign_in.php" class="btn btn-danger" role="button">Déconnexion</a>
            </ul>
        </div>
    </nav>
    <h1 class="display-5">Bienvenue sur la page d'accueil de Pongmaster ! </h1>


    <div class="container">
        <?php
        // Afficher les erreurs s'il y en a
        if (isset($_SESSION['message_succes'])) {
            echo '<div class="alert alert-success" role="alert">' . $_SESSION['message_succes'] . '</div>';
            unset($_SESSION['message_succes']); // Effacer le message après l'avoir affiché
        }
        ?>

        <form id="inscriptionForm" action="../php/pongmaster_traitement.php" method="POST" autocomplete="off">
            <!-- Ajoutez ici les autres champs du formulaire -->
            <label for="exercice">Exercice :</label>
            <select name="exercice" id="exercice">
                <option value="none">-- Aucune --</option>
                <option value="Topspin">Topspin</option>
                <option value="Attaque">Attaque</option>
                <option value="Défense">Défense</option>
            </select><br /><br />
            <label for="numero">Numéro :</label>
            <select name="numero" id="numero">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select><br /><br />

            <label for="vitesse-de-propulsion">Vitesse de propulsion :</label>
            <select name="vitesse-de-propulsion" id="vitesse-de-propulsion">
                <option value="nulle">Nulle</option>
                <option value="minimum">Minimum</option>
                <option value="moyenne">Moyenne</option>
                <option value="maximum">Maximum</option>
                <option value="aléatoire">Aléatoire</option>
            </select><br /><br />

            <label for="cadence-d-ejection">Cadence d'éjection :</label>
            <select name="cadence-d-ejection" id="cadence-d-ejection">
                <option value="nulle">Nulle</option>
                <option value="minimum">Minimum</option>
                <option value="moyenne">Moyenne</option>
                <option value="maximum">Maximum</option>
                <option value="aléatoire">Aléatoire</option>
            </select><br /><br />

            <label for="vitesse-d-oscillation">Vitesse d'oscillation :</label>
            <select name="vitesse-d-oscillation" id="vitesse-d-oscillation">
                <option value="nulle">Nulle</option>
                <option value="minimum">Minimum</option>
                <option value="moyenne">Moyenne</option>
                <option value="maximum">Maximum</option>
                <option value="aléatoire">Aléatoire</option>
            </select><br /><br />

            <label for="nombre-de-balles">Nombre de balles :</label>
            <select name="nombre-de-balles" id="nombre-de-balles">
                <option value="demi-panier">Demi panier</option>
                <option value="panier-complet">Panier complet</option>
            </select><br /><br />

            <label for="nombre-de-cibles-a-viser">Nombre de cibles à viser :</label>
            <select name="nombre-de-cibles-a-viser" id="nombre-de-cibles-a-viser">
                <option value="une">Une</option>
                <option value="deux">Deux</option>
                <option value="trois">Trois</option>
            </select><br /><br />

            <label for="type-d-animation-des-cibles">Type d'animation des cibles :</label>
            <select name="type-d-animation-des-cibles" id="type-d-animation-des-cibles">
                <option value="pas-d-animation">Pas d'animation</option>
                <option value="une-cible">Une cible</option>
                <option value="deux-trois-cibles">Deux/Trois cibles</option>
                <option value="alterne-aleatoire">Alterné/Aléatoire</option>
            </select><br /><br />

            <label for="zones-d-impact">Zones d'impact :</label>
            <select name="zones-d-impact" id="zones-d-impact">
                <option value="Z1">Z1</option>
                <option value="Z2">Z2</option>
                <option value="Z3">Z3</option>
                <option value="Z4">Z4</option>
                <option value="Z5">Z5</option>
                <option value="Z6">Z6</option>
                <option value="Z7">Z7</option>
                <option value="Z8">Z8</option>
            </select><br /><br />

            <!-- Bouton de soumission du formulaire -->
            <button type="submit" id="submitValider" class="btn btn-primary btn-lg"
                onclick="afficherMessage()">Valider</button>
        </form>
    </div>
    <!-- Inclure Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <!-- Inclure votre script JavaScript personnalisé -->
    <script src="../Script/script.js"></script>
</body>

</html>