<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="<?php echo ASSETS; ?>css/style.css" rel="stylesheet" />
    <link href="<?php echo ASSETS; ?>css/responsiv.css" rel="stylesheet" />
    <link href="<?php echo ASSETS; ?>fontawesome/css/all.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;500&family=Oswald:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/rrssibdlmdub4vn15tirsynq98km88ytywl7uys8kx9v8lfy/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <header>
        <h1><a href="<?php echo HOST; ?>home">Jean Forteroche</a></h1>
        <nav id="main_navbar">
            <ul>
                <li id="chapter_menu"><i class="fas fa-book-open fa-2x"></i>
                    <ul class="list_menu">
                        <?php foreach ($chapters as $chapter) : ?>
                            <li><a href="<?php echo HOST; ?>chapter/id/<?php echo $chapter['id']; ?>"><?php echo $chapter['title'] ;?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php if (isset($_SESSION['admin'])) : ?>
                    <?php if ($_SESSION['admin'] == 1) : ?>
                        <li class="admin_button" title="Panneau d'administration"><a href="<?php echo HOST; ?>adminPanel"><i class="fas fa-edit fa-2x"></i></a></li>
                    <?php endif; ?>
                <?php endif; ?>

                <?php
                if (isset($_SESSION['id'])) {
                ?>
                    <li class="logout_button" title="Déconnexion"><a href="<?php echo HOST; ?>logout"><i class="fas fa-power-off fa-2x"></i></i></a></li>
                <?php
                } else {
                ?>
                    <li class="login_button" title="Se connecter"><a href="<?php echo HOST; ?>login"><i class="fas fa-user-circle fa-2x"></i></a></li>
                <?php
                }
                ?>

            </ul>
        </nav>
    </header>
    <div class="notif">
        <?php if (isset($_SESSION['flash'])) : ?>
            <?php foreach ($_SESSION['flash'] as $type => $message) : ?>
                <div class="alert alert-<?= $type; ?>">
                    <?= $message; ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
    </div>

    <main><?php echo $content; ?></main>
    <a href="#"><i class="fas fa-chevron-circle-up fa-2x"></i></a>
    <footer>
        <p>Blog Fictif PHP créé par Célia Gaudin dans le cadre d'un projet d'étude OpenClassrooms</p>
        <p>Crédit photo <a href="https://unsplash.com/@jankronies">Jankronies</a> - <a href="https://unsplash.com/@convertkit">ConverKit</a></p>
    </footer>

</body>

</html>