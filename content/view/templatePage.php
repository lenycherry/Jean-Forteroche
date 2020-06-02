<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="<?php echo ASSETS; ?>css/style.css" rel="stylesheet" />
    <script src="https://cdn.tiny.cloud/1/rrssibdlmdub4vn15tirsynq98km88ytywl7uys8kx9v8lfy/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <header>
        <h1><a href="<?php echo HOST; ?>home">Jean Forteroche</a></h1>
        <nav id="main_navbar">
            <ul>
                <li id="chapter_menu">Chapitres
                    <ul class="list_menu">
                        <?php foreach ($chapters as $chapter) : ?>
                            <li><a href="<?php echo HOST; ?>chapter/id/<?php echo $chapter['id'] ?>"><?php echo $chapter['title'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="inscription_button btn"><a href="register">Inscription</a></li>
                <li class="login_button btn">Connection</li>
                <li class="logout_button btn">Déconnection</li>
            </ul>
        </nav>
    </header>

    <main><?php echo $content ?></main>


    <footer>
        <p>Blog Fictif créé par Célia Gaudin dans le cadre d'un projet d'étude OpenClassrooms</p>
    </footer>
</body>

</html>