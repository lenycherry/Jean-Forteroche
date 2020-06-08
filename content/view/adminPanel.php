<?php $title = 'Jean Forteroche - Panneau d\'administration' ?>
<?php if (isset($_SESSION['admin']) && ($_SESSION['admin'] == 1)) : ?>

    <div id="account_container">
        <h1> Bienvenue sur l'espace d'administration <?php echo htmlspecialchars($_SESSION['pseudo']); ?></h1>

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
        <?php if (isset($comments)) : ?>
            <div id="admin_comments_container">
                <?php foreach ($comments as $comment) : ?>
                    <h2><?php echo $comment['pseudo'] ?></h2>
                    <span><?php echo $comment['create_date'] ?></span>
                    <?php echo $comment['content'] ?>
                    <span><a href="<?php echo HOST; ?>editComment/id/<?php echo $comment['id'] ?>" class="edit_com_btn btn">Editer</a>
                        <a href="<?php echo HOST; ?>deleteComment/id/<?php echo $comment['id'] ?>" class="erase_com_btn btn">Effacer</a>
                        <a href="<?php echo HOST; ?>acquitComment/id/<?php echo $comment['id'] ?>" class="acquit_com_btn btn">Acquitter</a>
                    </span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <h3>Chapitre 1 2 3 ... <php? echo LISTE ID CHAPITRE; ?>
        </h3>
        <h3>Commentaires signalés</h3>
        <?php if (isset($comments)) : ?>
            <div id="report_comments_container">
                <?php foreach ($comments as $comment) : ?>
                    <h2><?php echo $comment['pseudo'] ?></h2>
                    <span><?php echo $comment['create_date'] ?></span>
                    <?php echo $comment['content'] ?>
                    <span><a href="<?php echo HOST; ?>editComment/id/<?php echo $comment['id'] ?>" class="edit_com_btn btn">Editer</a>
                        <a href="<?php echo HOST; ?>deleteComment/id/<?php echo $comment['id'] ?>" class="erase_com_btn btn">Effacer</a>
                        <a href="<?php echo HOST; ?>acquitComment/id/<?php echo $comment['id'] ?>" class="acquit_com_btn btn">Acquitter</a>
                    </span>
                <?php endforeach; ?>
            <?php endif; ?>
            </div>


    </div>

<?php else : ?>
    <p>Vous n'avez pas accès à cette page</p>
<?php endif; ?>