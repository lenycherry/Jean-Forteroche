<?php $title = 'Jean Forteroche - Se connecter'; ?>
<div id="login_forms_container">
    <?php if (isset($erForm)) : ?>
        <ul id="error_login_container">
            <?php foreach ($erForm as $error) : ?>
                <li><?php echo $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div id="log_forms">
        <div id="login_form_container">
            <h3>Se connecter</h3>
            <form action="<?php echo HOST; ?>userLogin" method="post">
                <input type="text" placeholder="Votre pseudo" name="pseudo" value="">
                <input type="password" placeholder="Mot de passe" name="mdp" value="">
                <button class="btn" type="submit">Se connecter</button>
            </form>
        </div>
        <div id="register_form_container">
            <h3>S'inscrire</h3>
            <form action="<?php echo HOST; ?>userRegister" method="post">
                <input type="text" placeholder="Votre pseudo" name="pseudo" value="">
                <input type="email" placeholder="Adresse mail" name="mail" value="">
                <input type="password" placeholder="Mot de passe" name="mdp" value="">
                <input type="password" placeholder="Confirmer le mot de passe" name="confmdp">
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </div>
</div>