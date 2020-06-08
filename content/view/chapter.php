<?php $title = "Jean Forteroche " . $currentChapter->getTitle(); ?>


<div id="chapter_page_container"> 
    <div id="chapter_container">
        <h1> <?php echo $currentChapter->getTitle(); ?></h1>
        <p><?php echo $currentChapter->getContent(); ?></p>
    </div>

    <div id="comment_container">
        <?php if (isset($_SESSION['id'])) : ?>
            <form id="form_add_comment_container" action="<?php echo HOST; ?>addComment/id/<?php echo $currentChapter->getId()?>" method="post">
                <textarea id="area_add_comment_container" name='values[content]' placeholder="Votre commentaire"></textarea>
                <input type="submit" value="Valider"/>
            </form>
        <?php endif; ?>
        <?php if (isset($comments)) : ?>
            <?php foreach ($comments as $comment) : ?>
                <div id="comment_container">
                    <h2><?php echo $comment['pseudo'] ?></h2>
                    <span><?php echo $comment['create_date'] ?></span>
                    <?php echo $comment['content'] ?>
                    <?php if (isset($_SESSION['id'])) : ?>
                        <span><a href="<?php echo HOST; ?>editComment/id/<?php echo $comment['id'] ?>" class="edit_com_btn btn">Editer</a>
                            <a href="<?php echo HOST; ?>deleteComment/id/<?php echo $comment['id'] ?>" class="erase_com_btn btn">Effacer</a>
                            <a href="<?php echo HOST; ?>reportComment/id/<?php echo $comment['id'] ?>" class="report_com_btn btn">Signaler</a>
                        </span>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>