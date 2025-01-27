<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>

<div class="container-fluid bg-success text-white text-center py-5">
    <h1>LIVRE D'OR</h1>
    <p>N'hésitez pas à venir découvrir votre livre d'or!</p>
    <p>Chaque événement est l'occasion de venir poster des commentaires et des photos!</p>
</div>

<div class="container bg-info mb-3 py-4">
    <div class="d-flex justify-content-center">
        <form method="post" class="d-flex gap-3">
            <button name="formType" value="form1" type="submit" class="btn btn-outline-primary mb-2">Inscription</button>
            <button name="formType" value="form2" type="submit" class="btn btn-outline-primary mb-2">Connexion</button>
        </form>
    </div>

    <?php 
    if (isset($_GET['error'])) {
        if ($_GET['error'] === 'emptyfields') {
            echo '<p class="text-danger text-center">Veuillez remplir tous les champs</p>';
        } elseif ($_GET['error'] === 'invalidemail') {
            echo '<p class="text-danger text-center">Email invalide</p>';
        } elseif ($_GET['error'] === 'invalidpseudo') {
            echo '<p class="text-danger text-center">Pseudo invalide</p>';
        } elseif ($_GET['error'] === 'passwordcheck') {
            echo '<p class="text-danger text-center">Les mots de passe ne correspondent pas</p>';
        } elseif ($_GET['error'] === 'emailalreadytaken') {
            echo '<p class="text-danger text-center">Email déjà utilisé</p>';
        } elseif ($_GET['error'] === 'wrongpassword') {
            echo '<p class="text-danger text-center">Mot de passe incorrect</p>';
        } elseif ($_GET['error'] === 'nouser') {
            echo '<p class="text-danger text-center">Utilisateur inconnu</p>';
        }
    } elseif (isset($_GET['signup'])) {
        if ($_GET['signup'] === 'success') {
            echo '<p class="text-success text-center">Inscription réussie</p>';
        }
    } elseif (isset($_GET['login'])) {
        if ($_GET['login'] === 'success') {
            echo '<p class="text-success text-center">Connexion réussie</p>';
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $formType = $_POST['formType'];
        if ($formType === 'form1') {
            echo '<form action="inscription.php" method="post" class="mx-auto mt-4 p-4 border rounded bg-light" style="max-width: 400px;">
                <h3 class="text-center">Inscription</h3>
                <div class="mb-3">
                    <label for="name" class="form-label">Nom :</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="pseudo" class="form-label">Pseudo :</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
                </div>
                <div class="mb-3">
                    <label for="pwd-repeat" class="form-label">Répéter le mot de passe :</label>
                    <input type="password" class="form-control" id="pwd-repeat" name="pwd-repeat" placeholder="Repeat password">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" name="sign-up">S\'inscrire</button>
                </div>
            </form>';
        } elseif ($formType === 'form2') {
            echo '<form action="connexion.php" method="post" class="mx-auto mt-4 p-4 border rounded bg-light" style="max-width: 400px;">
                <h3 class="text-center">Connexion</h3>
                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" id="pwd" name="pwd">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" name="sign-in">Se connecter</button>
                </div>
            </form>';
        }
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

