<?php $title = 'Connexion - Jean Forteroche'; ?>


<div>Se connecter</div>
<form action="<?php echo HOST; ?>userLogin" method="post">
<?php if(isset($erForm)) : ?>
<ul id ="error_login_container">
<?php foreach ($erForm as $error) : ?>
<li><?php echo $error ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
<input type="text" placeholder="Votre pseudo" name="pseudo" value="">
<input type="password" placeholder="Mot de passe" name="mdp" value="">
<button type="submit">Se connecter</button>
</form>