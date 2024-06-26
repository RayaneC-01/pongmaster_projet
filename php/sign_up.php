<?php
// Démarrer la session
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Page d'inscription</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- Bootstrap icons (optional) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

    <div class="container">
        <form id="inscriptionForm" method="POST" action="/php/sign_up_processing.php">
            <h2>Inscription</h2>

            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" placeholder="Nom d'utilisateur">

            <label for="email">E-mail :</label>
            <input type="email" id="email" name="email" placeholder="E-mail">

            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Mot de passe">

            <label for="confirmation_mot_de_passe">Confirmer le mot de passe :</label>
            <input type="password" id="confirmation_mot_de_passe" name="confirmation_mot_de_passe"
                placeholder="Confirmez le mot de passe">

            <button type="submit" class="submit btn btn-primary">S'inscrire</button>
        </form>
        <p class="login-link">Déjà un compte? <a href="sign_in.php">Se Connecter</a></p>
        <?php
        // Afficher le message d'erreur s'il est défini
        if (isset($_SESSION['message_erreur'])) {
            echo '<p class="text-danger">' . $_SESSION['message_erreur'] . '</p>';
            // Une fois affiché, effacer le message d'erreur de la session
            unset($_SESSION['message_erreur']);
        }
        ?>
        <?php
        // Afficher le message de succès s'il est défini
        if (isset($_SESSION['message_succes'])) {
            echo '<p class="text-success">' . $_SESSION['message_succes'] . '</p>';
            // Une fois affiché, effacer le message de succès de la session
            unset($_SESSION['message_succes']);
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    <script src="/Script/script.js"></script>
</body>

</html>