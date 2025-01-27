<?php
session_start();

include './dbh.class.php';
    $connection = new Dbh;
    $bdd = $connection->getConnection();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'OR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <header>
        <div class="container text-center">
            <h1>Votre Livre d'Or d'Entreprise</h1>
            <p>Bonjour <?= $_SESSION['pseudo'] ?>. Vous êtes inscrit depuis le <?= $_SESSION['date_user'] ?>, et avez <?= $_SESSION['nb_post'] ?> post(s) à votre actif...</p>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav w-100 justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="./page1.php?id_user=<?= $_SESSION['id'] ?>">Mes posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./page1.php?action=allposts">Posts récents</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Posts par évènements</a>
                                <ul class="dropdown-menu">
<?php
                                    include 'reqevent.php';
?>
                                    
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./page1.php?action=newposts">Créer un nouveau post</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="deconnexion.php">Se déconnecter</a>
                          </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

<main>
    
<?php

if(isset($_GET['id_event'])){
    $id_event = $_GET['id_event'];
    $_GET['id_event'] = $id_event;
    include "reqaffposts.php";
} 
else if(isset($_GET['id_user']) && $_GET['id_user'] === $_SESSION['id']){
    $_GET['id_user'] = $_SESSION['id'];
    include "reqaffposts.php";
}
else if(isset($_GET['action']) && $_GET['action'] === 'newposts'){
    include "newposts.php";
}
else {
    $_GET['action'] = 'allposts';
    include "reqaffposts.php";
}

?>




</main>



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>