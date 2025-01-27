<?php

if (isset($_POST['submit'])) {

    session_start();
    include './dbh.class.php';
    $connection = new Dbh;
    $bdd = $connection->getConnection();


    $event = $_POST['event'];
    // $id_event = $_POST['id_event'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $path = './assets/img/';
    $arrayType = ["jpg" => 'image/jpg', "jpeg" => 'image/jpeg', "gif" => 'image/gif', "png" => 'image/png'];

    if (in_array($_FILES['image']['type'], $arrayType)) {
        if (move_uploaded_file($image_tmp, $path . $image)) {
            echo "Fichier téléchargé avec succès.";
        } else {
            echo "Erreur lors du téléchargement du fichier.";
        }
    } else {
        echo "Le format n'est pas le bon.";
    }

        $sql = "INSERT INTO post (id_user, id_event, title_post, com_post, photo_post) VALUES (?, ?, ?, ?, ?)"; 
            $stmt = $bdd->prepare($sql);
            $stmt->execute([$_SESSION['id'], $event, $title, $description, $image]);
            $_SESSION['nb_post']++;
            header("Location: page1.php?id_user=" . $_SESSION['id'] );
            exit();
        }
    
    else {
        header("Location: page1.php");
        exit();
    }
    






