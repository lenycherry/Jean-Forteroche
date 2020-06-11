<?php $title = 'Jean Forteroche - Panneau d\'administration' ?>
<!--vérification de présence de session + status d'admin-->
<?php if (isset($_SESSION) && ($_SESSION['admin'] == 1)) : ?>

    <h1> Bienvenue sur l'espace d'administration <?php echo htmlspecialchars($_SESSION['pseudo']); ?></h1>
    <div id="menu_admin">
        <div id="admin_chapters_btn" class="btn">Gérer les Chapitres</div>
        <div id="admin_comments_btn" class="btn">Gérer les commentaires</div>
        <div id="admin_reported_btn" class="btn">Gérer les commentaires signalés</div>
    </div>
    <div id='admin_chapter' class="invisible">
        <h2>Chapitres</h2>
        <a href="createChapter" class="create_chapter_btn btn">Créer un nouveau chapitre</a>
        <div id="list_chapters_container" class="list_content_admin">
            <?php foreach ($chapters as $chapter) : ?>
                <div class="admin_content_container">
                    <h3><?php echo $chapter['title'] ?></h3>
                    <div class="resume">
                        <p> <?php echo $chapter['content'] ?></p>
                    </div>
                    <div class="date_time">
                        <time>Crée le <?php echo $chapter['create_date'] ?></time>
                        <?php if (isset($chapter['edit_date'])) : ?>
                            <time>Edité le <?php echo $chapter['edit_date'] ?></time>
                        <?php endif; ?>
                    </div>
                    <span><a href="<?php echo HOST; ?>editChapter/id/<?php echo $chapter['id'] ?>" class="edit_com_btn btn">Editer</a>
                        <a href="<?php echo HOST; ?>deleteChapter/id/<?php echo $chapter['id'] ?>" class="erase_com_btn btn">Effacer</a>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div id="admin_comment" class="invisible">
        <?php $totalComments = 0; ?>
        <?php foreach ($comments as $comment) : ?>
            <?php $totalComments++ ?>
        <?php endforeach; ?>
        <h2>Commentaires (<?php echo $totalComments; ?>)</h2>
        <div id="admin_comment_container">
            <?php foreach ($chapters as $chapter) : ?>
                <?php if (isset($comments)) : ?>
                    <div class="comment_list_container">
                        <div class="total_comment">
                            <?php $commentsChapter = 0; ?>
                            <?php foreach ($comments as $comment) : ?>
                                <?php if ($comment['chapter_id'] === $chapter['id']) : ?>
                                    <?php $commentsChapter++; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="title_chapter_comment">
                                <h3><?php echo $chapter['title'] ?></h3>
                                <p>(<?php echo $commentsChapter; ?> Commentaires)</p>
                            </div>
                        </div>
                        <div class=" admin_comments_content com_invisible">
                            <?php foreach ($comments as $comment) : ?>
                                <?php if ($comment['chapter_id'] === $chapter['id']) : ?>
                                    <div class="admin_content_container">
                                        <h3><?php echo $comment['pseudo'] ?></h3>
                                        <?php echo $comment['content'] ?>
                                        <div class="date_time">
                                            <time>Crée le <?php echo $comment['create_date'] ?></time>
                                            <?php if (isset($comment['edit_date'])) : ?>
                                                <time>Edité le <?php echo $comment['edit_date'] ?></time>
                                            <?php endif; ?>
                                        </div>
                                        <span><a href="<?php echo HOST; ?>editComment/id/<?php echo $comment['id'] ?>" class="edit_com_btn btn">Editer</a>
                                            <a href="<?php echo HOST; ?>deleteComment/id/<?php echo $comment['id'] ?>" class="erase_com_btn btn">Effacer</a>
                                        </span>
                                    </div>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    </div>
                <?php endforeach; ?>
        </div>
    </div>
    <div id="admin_comment_reported" class="invisible">
        <h2>Commentaires signalés</h2>
        <?php if (isset($comments)) : ?>
            <div id="report_comments_container" class="list_content_admin">
                <?php foreach ($comments as $comment) : ?>
                    <?php if ($comment['reported'] > 1) : ?>
                        <div class="admin_content_container">
                            <h3><?php echo $comment['pseudo'] ?></h3>
                            <p>reporté <?php echo $comment['reported'] ?> fois</p>
                            <?php echo $comment['content'] ?>
                            <div class="date_time">
                                <time>Crée le <?php echo $comment['create_date'] ?></time>
                                <?php if (isset($comment['edit_date'])) : ?>
                                    <time>Edité le <?php echo $comment['edit_date'] ?></time>
                                <?php endif; ?>
                            </div>
                            <span><a href="<?php echo HOST; ?>editComment/id/<?php echo $comment['id'] ?>" class="edit_com_btn btn">Editer</a>
                                <a href="<?php echo HOST; ?>deleteComment/id/<?php echo $comment['id'] ?>/admin/1" class="erase_com_btn btn">Effacer</a>
                                <a href="<?php echo HOST; ?>acquitComment/id/<?php echo $comment['id'] ?>" class="acquit_com_btn">Acquitter</a>
                            </span>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            </div>
        <?php else : ?>
            <p>Vous n'avez pas accès à cette page</p>
        <?php endif; ?>
    </div>
    <script src="<?php echo ASSETS; ?>js/MenuAdmin.js"></script>
    <script src="<?php echo ASSETS; ?>js/CommentAdmin.js"></script>
    <script src="<?php echo ASSETS; ?>js/_main.js"></script>