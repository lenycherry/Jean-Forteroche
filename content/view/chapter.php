<?php $title = "Jean Forteroche " . $currentChapter->getTitle(); ?>


<div id="chapter_page_container">
    <div id="chapter_container">
        <h1> <?php echo $currentChapter->getTitle(); ?></h1>
        <p><?php echo $currentChapter->getContent(); ?></p>
        <time>Crée le <?php echo $currentChapter->getCreateDate();?></time>
    </div>

    <div id="comments_container">
        <?php if (isset($_SESSION['id'])) : ?>
            <form id="form_add_comment_container" action="<?php echo HOST; ?>addComment/id/<?php echo $currentChapter->getId() ?>" method="post">
                <label for="area_add_comment_container">Ajouter un commentaire :</label>
                <textarea id="area_add_comment_container" name='values[content]' placeholder="Votre commentaire" maxlength="500"  required></textarea>
                <input class='btn' type="submit" value="Valider" />
            </form>
        <?php endif; ?>
        <?php if (isset($comments)) : ?>
            <?php foreach ($comments as $comment) : ?>
                <div id="comment_container">
                    <h3><?php echo htmlspecialchars($comment['pseudo']) ?></h3>
                    <p><?php echo htmlspecialchars($comment['content']) ?></p>
                    <div class="date_time_comment">
                        <time>Crée le <?php echo $comment['create_date'] ?></time>
                        <?php if (isset($comment['edit_date'])) : ?>
                            <time> - Edité le <?php echo $comment['edit_date'] ?></time>
                        <?php endif; ?>
                    </div>
                    <span class='comment_btn_container'>
                        <?php if (isset($_SESSION['id'])) : ?>
                            <?php if ($_SESSION['pseudo'] === $comment['pseudo']) : ?>
                                <a href="<?php echo HOST; ?>editComment/id/<?php echo $comment['id'] ?>" class="edit_com_btn btn">Editer</a>
                                <a href="<?php echo HOST; ?>deleteComment/id/<?php echo $comment['id'] ?>" class="jf_alert erase_com_btn btn">Effacer</a>


                            <?php else : ?>
                                <a href="<?php echo HOST; ?>reportComment/id/<?php echo $comment['id'] ?>" class=" jf_alert report_com_btn btn">Signaler</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </span>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<script src="<?php echo ASSETS; ?>js/Alert.js"></script>