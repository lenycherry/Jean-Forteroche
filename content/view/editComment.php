<?php $title = 'Jean Forteroche - Editer le commentaire' ?>
<?php if (isset($_SESSION['id'])) : ?>
    <div id='edit_page_container'>
        <label for="form_comment_container">Editer votre commentaire</label>
        <form id="form_comment_container" action="<?php echo HOST; ?>updateComment/id/" method="post">
            <textarea id="area_comment_container" name='values[content]' required>
    <?php echo $currentComment->getContent(); ?>
    </textarea>
            <input type='hidden' name="values[id]" value="<?php echo $currentComment->getId(); ?>" />
            <input class="btn" type="submit" value="Valider" />
        </form>
    </div>
<?php else : ?>
    <p>Vous n'avez pas accès à cette page. Connectez-vous pour éditer votre commentaire</p>
<?php endif; ?>