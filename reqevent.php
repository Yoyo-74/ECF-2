<?php



    $reqevent = $bdd->query('SELECT id_event, type_event FROM event ORDER BY 2;');
    
    while($event = $reqevent->fetch(PDO::FETCH_ASSOC)){
?>
        <li>    
            <a class="nav-link" href="./page1.php?id_event=<?= $event['id_event'] ?>"><?= $event['type_event'] ?></a>
        </li>
<?php
            }
?>