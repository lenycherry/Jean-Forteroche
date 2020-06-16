<?php $title = 'Jean Forteroche - Panneau d\'administration' ?>
<?php if (isset($_SESSION['admin']) && ($_SESSION['admin'] == 1)) : ?>
    <div id="admin_main_container">
        <h1 id="home_admin_title"> Bienvenue sur l'espace d'administration <?php echo htmlspecialchars($_SESSION['pseudo']); ?></h1>
        <div id="menu_admin">
            <div id="admin_chapters_btn" class="btn">Gérer les Chapitres</div>
            <div id="admin_comments_btn" class="btn">Gérer les commentaires</div>
            <div id="admin_reported_btn" class="btn">Gérer les commentaires signalés</div>
        </div>
        <div id='admin_chapter' class="invisible">
            <a href="createChapter" class="create_chapter_btn btn">Créer un nouveau chapitre</a>
            <div id="list_chapters_container" class="list_content_admin">
                <?php foreach ($chapters as $chapter) : ?>
                    <div class="admin_content_container">
                        <h3><?php echo $chapter['title']; ?></h3>
                        <div class="resume">
                            <p> <?php echo substr($chapter['content'], 0, 150); ?> ...</p>
                        </div>
                        <div class="date_time">
                            <time>Créé le <?php echo $chapter['create_date']; ?></time>
                            <?php if (isset($chapter['edit_date'])) : ?>
                                <time>Edité le <?php echo $chapter['edit_date']; ?></time>
                            <?php endif; ?>
                        </div>
                        <span class="bloc_btn"><a href="<?php echo HOST; ?>editChapter/id/<?php echo $chapter['id']; ?>" class="edit_com_btn btn">Editer</a>
                            <a href="<?php echo HOST; ?>deleteChapter/id/<?php echo $chapter['id']; ?>" class="jf_alert erase_com_btn btn">Effacer</a>
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
            <?php if ($totalComments <= 1) : ?>
                <h2><?php echo $totalComments; ?> commentaire</h2>
            <?php else : ?>
                <h2><?php echo $totalComments; ?> commentaires</h2>
            <?php endif; ?>
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
                                    <div class="btn"><?php echo $chapter['title']; ?></div>
                                    <?php if ($commentsChapter <= 1) : ?>
                                        <p>(<?php echo $commentsChapter; ?> commentaire)</p>
                                    <?php else : ?>
                                        <p>(<?php echo $commentsChapter; ?> commentaires)</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class=" admin_comments_content com_invisible">
                                <?php foreach ($comments as $comment) : ?>
                                    <?php if ($comment['chapter_id'] === $chapter['id']) : ?>
                                        <div class="admin_content_container">
                                            <h3><?php echo htmlspecialchars($comment['pseudo']); ?></h3>
                                            <p><?php echo htmlspecialchars($comment['content']); ?></p>
                                            <div class="date_time">
                                                <time>Crée le <?php echo $comment['create_date']; ?></time>
                                                <?php if (isset($comment['edit_date'])) : ?>
                                                    <time>Edité le <?php echo $comment['edit_date']; ?></time>
                                                <?php endif; ?>
                                            </div>
                                            <span>
                                                <a href="<?php echo HOST; ?>deleteComment/id/<?php echo $comment['id']; ?>/admin/1" class="jf_alert erase_com_btn btn">Effacer</a>
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
                        <?php if ($comment['reported'] > 0) : ?>
                            <div class="admin_content_container">
                                <h3><?php echo htmlspecialchars($comment['pseudo']); ?></h3>
                                <p class="message_report_content">Ce commentaire a été signalé</p>
                                <p><?php echo htmlspecialchars($comment['content']); ?></p>
                                <div class="date_time">
                                    <time>Crée le <?php echo $comment['create_date']; ?></time>
                                    <?php if (isset($comment['edit_date'])) : ?>
                                        <time>Edité le <?php echo $comment['edit_date']; ?></time>
                                    <?php endif; ?>
                                </div>
                                <span class="bloc_btn">
                                    <a href="<?php echo HOST; ?>deleteComment/id/<?php echo $comment['id']; ?>/admin/1" class="jf_alert erase_com_btn btn">Effacer</a>
                                    <a href="<?php echo HOST; ?>acquitComment/id/<?php echo $comment['id']; ?>" class="acquit_com_btn btn">Acquitter</a>
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
    </div>
    <script src="<?php echo ASSETS; ?>js/Alert.js"></script>
    <script src="<?php echo ASSETS; ?>js/MenuAdmin.js"></script>
    <script src="<?php echo ASSETS; ?>js/CommentAdmin.js"></script>
    <script src="<?php echo ASSETS; ?>js/_main.js"></script>