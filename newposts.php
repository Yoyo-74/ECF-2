
<div class="container mt-5">
    <h1>Créer un nouveau Post</h1>
    <form action="submit_newposts.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="event">Sélectionner un événement</label>
            <select class="form-control" id="event" name="event" required>
                <option value="">Choisir un événement</option>

<?php    
                $reqevent = $bdd->query('SELECT id_event, type_event FROM event ORDER BY 2;');
                while($event = $reqevent->fetch(PDO::FETCH_ASSOC)){
?>
                <option value="<?= $event['id_event'] ?>"><?= $event['type_event'] ?></option>
<?php
            }
?>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Entrer un titre" required>
        </div>
        <div class="form-group">
            <label for="description">Description du Post</label>
            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Entrer votre message" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Télécharger une image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Valider</button>
    </form>
</div>


