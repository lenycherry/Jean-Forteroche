<?php $title = 'Jean Forteroche - Editer le commentaire' ?>
<?php if (isset($_SESSION['id'])) : ?>
    <form id="form_comment_container" action="<?php echo HOST; ?>updateComment/id/" method="post">
        <textarea id="area_comment_container" name='values[content]'>
    <?php echo $currentComment->getContent(); ?>
    </textarea>
        <input type='hidden' name="values[id]" value="<?php echo $currentComment->getId(); ?>" />
        <input type="submit" value="Valider" />
    </form>

<?php else : ?>
    <p>Vous n'avez pas accès à cette page. Connectez-vous pour éditer votre commentaire</p>
<?php endif; ?>