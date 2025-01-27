<?php
if(isset($_POST['SuppPost'])){
    $reqsupp = $bdd->prepare('DELETE FROM post WHERE id_post=:supp;');
    $reqsupp->bindParam(':supp', $_POST['SuppPost'], PDO::PARAM_INT);
    $reqsupp->execute();
    $_SESSION['nb_post']--;
    header("Location: page1.php?id_user=" . $_SESSION['id'] );
    exit();
}

if(isset($_POST['UpdatePost'])){
    $postId = $_POST['postId'];
    $postTitle = $_POST['postTitle'];
    $postContent = $_POST['postContent'];

    // Mettre à jour le post dans la base de données
    $req = $bdd->prepare('UPDATE post SET title_post = :title, com_post = :content WHERE id_post = :id');
    $req->bindParam(':title', $postTitle, PDO::PARAM_STR);
    $req->bindParam(':content', $postContent, PDO::PARAM_STR);
    $req->bindParam(':id', $postId, PDO::PARAM_INT);
    $req->execute();

    // Redirection vers page1.php après la mise à jour
    header("Location: page1.php?id_user=" . $_SESSION['id'] );
    exit();
}
?>

<?php
if(isset($_POST['ModifPost'])){
    $postId = $_POST['ModifPost'];
    // Récupérer les données actuelles du post
    $req = $bdd->prepare('SELECT * FROM post WHERE id_post = :id');
    $req->bindParam(':id', $postId, PDO::PARAM_INT);
    $req->execute();
    $post = $req->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="container mt-5"> 
    <div class="card bg-danger bg-opacity-75 text-white">
    <form method="POST" action="">
        <input type="hidden" name="postId" value="<?= $post['id_post'] ?>">
        <div class="form-group">
            <label for="postTitle">Titre</label>
            <input type="text" class="form-control" id="postTitle" name="postTitle" value="<?= htmlspecialchars($post['title_post']) ?>">
        </div>
        <div class="form-group">
            <label for="postContent">Contenu</label>
            <textarea class="form-control" id="postContent" rows="5" name="postContent"><?= htmlspecialchars($post['com_post']) ?></textarea>
        </div>
        <button type="submit" name="UpdatePost" class="btn btn-primary">Mettre à jour</button>
    </form>
    </div>
    </div>
    <?php
}
?>


<?php
if(isset($_GET['id_event'])){
    $id_event = $_GET['id_event'];
    // echo 'evènement ' . $id_event;
    $req = $bdd->prepare('SELECT 	p.id_post AS IDP, p.id_user AS IDU, p.id_event AS IDE, 
		                            title_post, com_post, photo_post, 
                                    DATE_FORMAT(date_post, "Publié le : %d/%m/%Y") AS DATE_PP, 
                                    type_event, pseudo_user 
                        FROM 	post p, event e, user u
                        WHERE 	p.id_user = u.id_user
                        AND		p.id_event = e.id_event
                        AND		p.id_event = :id_event
                        ORDER BY date_post DESC;');
    $req->bindParam(':id_event', $id_event, PDO::PARAM_INT);

} 

else if(isset($_GET['id_user'])){
    $id_user = $_GET['id_user'];
    // echo 'user ' . $id_user;
    $req = $bdd->prepare('SELECT 	p.id_post AS IDP, p.id_user AS IDU, p.id_event AS IDE, 
                                    title_post, com_post, photo_post, 
                                    DATE_FORMAT(date_post, "Publié le : %d/%m/%Y") AS DATE_PP, 
                                    type_event, pseudo_user 
                        FROM 	post p, event e, user u
                        WHERE 	p.id_user = u.id_user
                        AND		p.id_event = e.id_event
                        AND		p.id_user = :id_user
                        ORDER BY date_post DESC;');
$req->bindParam(':id_user', $id_user, PDO::PARAM_INT);

}

else {
    
    // echo 'allposts';
    $req = $bdd->prepare('SELECT 	p.id_post AS IDP, p.id_user AS IDU, p.id_event AS IDE, 
                                    title_post, com_post, photo_post, 
                                    DATE_FORMAT(date_post, "Publié le : %d/%m/%Y") AS DATE_PP, 
                                    type_event, pseudo_user 
                        FROM 	post p, event e, user u
                        WHERE 	p.id_user = u.id_user
                        AND		p.id_event = e.id_event
                        ORDER BY date_post DESC;');

}

$req->execute();

$path = './assets/img/';

while($post = $req->fetch(PDO::FETCH_ASSOC)){
    ?>

<div class="container mt-5"> 
    <div class="card"> 
        <img src="<?= $path . $post['photo_post'] ?>" class="card-img-top" alt="Image de l'article"> 
        <div class="card-body"> 
            <h5 class="card-title"><?= $post['title_post'] ?></h5> 
            <p class="card-text"><small class="text-muted">Type d'événement : <?= $post['type_event'] ?></small></p> 
            <p class="card-text"><small class="text-muted">De : <?= $post['pseudo_user'] ?> </small></p> 
            <p class="card-text"><small class="text-muted"><?= $post['DATE_PP'] ?></small></p> 
            <p class="card-text"><?= $post['com_post'] ?></p> 
        </div> 
        <?php
        if(isset($_GET['id_user'])){
        ?>
        <form method="POST" action="">
            <button type="submit" name="ModifPost" value="<?= $post['IDP'] ?>" class="btn btn-outline-primary">Modifier</button>
            <button type="submit" name="SuppPost" value="<?= $post['IDP'] ?>"  class="btn btn-outline-danger">Supprimer</button>
        </form>
        <?php
        }
        ?>
    </div> 
</div>
    
    <?php
        }


