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
    
    
    <!--La classe bg-success sert à appliquer un fond vert au div-->
    <div class="container-fluid bg-success">
        
<h1>LIVRE D'OR </h1>
<p>N'hésitez pas à venir découvrir votre livre d'Or ! </p>
<p>Chaque évènement est l'occasion de venir poster des commentaires et des photos !</p>
        <div class="container bg-info mb-3">
            
            <form method="post">
                <button name="formType" value="form1" type="submit" class="btn btn-outline-primary mb-2">Inscription</button>
                <button name="formType" value="form2" type="submit" class="btn btn-outline-primary mb-2">Connexion</button>
            </form>

        <?php 
if (isset($_GET['error'])) {
    if ($_GET['error'] === 'emptyfields') {
        echo '<p class="text-danger">Veuillez remplir tous les champs</p>';
    } elseif ($_GET['error'] === 'invalidemail') {
        echo '<p class="text-danger">Email invalide</p>';
    } elseif ($_GET['error'] === 'invalidpseudo') {
        echo '<p class="text-danger">Pseudo invalide</p>';
    } elseif ($_GET['error'] === 'passwordcheck') {
        echo '<p class="text-danger">Les mots de passe ne correspondent pas</p>';
    } elseif ($_GET['error'] === 'emailalreadytaken') {
        echo '<p class="text-danger">Email déjà utilisé</p>';
    } elseif ($_GET['error'] === 'wrongpassword') {
        echo '<p class="text-danger">Mot de passe incorrect</p>';
    } elseif ($_GET['error'] === 'nouser') {
        echo '<p class="text-danger">Utilisateur inconnu</p>';
    }
} elseif (isset($_GET['signup'])) {
    if ($_GET['signup'] === 'success') {
        echo '<p class="text-success">Inscription réussie</p>';
    }
} elseif (isset($_GET['login'])) {
    if ($_GET['login'] === 'success') {
        echo '<p class="text-success">Connexion réussie</p>';
    }

}


        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            $formType = $_POST['formType']; 
            if ($formType === 'form1') { 
                echo '<form action="inscription.php" method="post"> 
                    <label for="name">Nom :</label><br> 
                    <input type="text" id="name" name="name"><br> 
                    <label for="name">Pseudo :</label><br>  
                    <input type="text" id="pseudo" name="pseudo"><br> 
                    <label for="email">Email :</label><br> 
                    <input type="email" id="email" name="email"><br>
                    <label for="password">Mot de passe :</label><br>
                    <input type="password" id="pwd" name="pwd" placeholder="Password"><br> 
                    <label for="password">Mot de passe :</label><br>
                    <input type="password" id="pwd-repeat" name="pwd-repeat" placeholder="Repeat password"><br>                   
                    <input type="submit" value="S\'inscrire" name="sign-up"> 
                </form>'; 
            } elseif ($formType === 'form2') { 
                echo '<form action="connexion.php" method="post"> 
                    <label for="email">Email :</label><br> 
                    <input type="email" id="email" name="email"><br> 
                    <label for="password">Mot de passe :</label><br>
                    <input type="password" id="pwd" name="pwd"><br>
                    <input type="submit" value="Se connecter" name="sign-in"> 
                </form>'; 
            } 
        } 
        ?>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>