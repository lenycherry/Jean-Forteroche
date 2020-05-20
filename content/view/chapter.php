<?php $title = 'Jean Forteroche' . $donnees['titre']; ?>


<div class="chapter_container">
    <h1><?php echo htmlspecialchars($donnees['titre']); ?></h1>
    <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    <br />
    <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
    </p>
</div>
