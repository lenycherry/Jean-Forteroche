<?php $title = 'Jean Forteroche - Panneau d\'administration' ?>

<div id="account_container">
    <h1> Bienvenue <?php echo 'USERNAME'; ?></h1><!-- en cours : créer le mvc User-->

    <div class="manage_chapter_btn btn">Gérer les Chapitres</div><!-- en cours : code apparition panneau d'ad-->
    <div class="manage_comment_btn btn">Gérer les commentaires</div><!-- en cours : code apparition panneau d'ad-->
    <div class="manage_reportCom_btn btn">Gérer les commentaires signalés</div><!-- en cours : code apparition panneau d'ad-->



    <h2>Chapitres</h2>
    <a href="createChapter" class="create_chapter_btn btn">Créer un nouveau chapitre</a>
    <div id="list_chapters_container">

        <?php foreach ($chapters as $chapter) : ?>
            <div id="admin_chapter_container">
                <h2><?php echo $chapter['title'] ?></h2>
                <span><?php echo $chapter['create_date'] ?></span>
                 <?php echo $chapter['content'] ?>
                <span><a href="<?php echo HOST; ?>editChapter/id/<?php echo $chapter['id'] ?>" class="edit_com_btn btn">Editer</a>
                <a href="<?php echo HOST; ?>deleteChapter/id/<?php echo $chapter['id'] ?>" class="erase_com_btn btn">Effacer</a>
                </span>
            </div>
        <?php endforeach; ?>

    </div>

    <h3>Chapitre 1 2 3 ...</h3>
    <h3>Commentaires</h3>
    <a href="createComment" class="create_comment_btn btn">Créer un nouveau commentaire</a>
    <div id="admin_comments_container">
        <div>
            <php? echo LISTE DES COMMENTS PAR CHAPITRE; ?>
                <a href="" class="edit_com_btn btn">Editer</a>
                <div class="erase_com_btn btn">Effacer</div>
        </div>
    </div>

    <h3>Chapitre 1 2 3 ... <php? echo LISTE ID CHAPITRE; ?>
    </h3>
    <h3>Commentaires signalés</h3>
    <div id="report_comments_container">
        <div>
            <php? echo LISTE DES COMMENTS PAR CHAPITRE; echo NOMBRE DE SIGNALEMENT ?>
                <div class="edit_com_btn btn">Acquitter</div>
                <div class="erase_com_btn btn">Effacer</div>
        </div>
    </div>


</div>