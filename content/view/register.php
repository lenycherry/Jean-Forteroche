<?php $title = 'Inscription - Jean Forteroche'; ?>

<div>Inscription</div>
<form action="<?php echo HOST; ?>userRegister" method="post">
    <?php if (isset($erForm)) : ?>
        <ul id="error_container">
            <?php foreach ($erForm as $error) : ?>
                <li><?php echo $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <input type="text" placeholder="Votre pseudo" name="pseudo" value="">
    <input type="email" placeholder="Adresse mail" name="mail" value="">
    <input type="password" placeholder="Mot de passe" name="mdp" value="">
    <input type="password" placeholder="Confirmer le mot de passe" name="confmdp">
    <button type="submit">Envoyer</button>

</form>