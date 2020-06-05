<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="<?php echo ASSETS; ?>css/style.css" rel="stylesheet" />
    <link href="<?php echo ASSETS; ?>fontawesome/css/all.css" rel="stylesheet" />
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
                            <li><a href="<?php echo HOST; ?>chapter/id/<?php echo $chapter['id'] ?>"><?php echo $chapter['title'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php if (isset($_SESSION['admin'])) :?>
                <?php if ($_SESSION['admin'] == 1) :?>
                    <li class="admin_button btn"title="Panneau d'administration"><a href="<?php echo HOST; ?>adminPanel"><i class="fas fa-edit fa-2x"></i></a></li>
                <?php endif;?>
                <?php endif;?>

                <?php
                if (isset($_SESSION['id'])) {
                ?>
                    <li class="logout_button btn"title="Déconnexion"><a href="<?php echo HOST; ?>logout"><i class="fas fa-power-off fa-2x"></i></i></a></li>
                <?php
                } else {
                ?>
                    <li class="login_button btn"title="Se connecter"><a href="<?php echo HOST; ?>login"><i class="fas fa-user-circle fa-2x"></i></a></li>
                <?php
                }
                ?>

            </ul>
        </nav>
    </header>

    <main><?php echo $content ?></main>


    <footer>
        <p>Blog Fictif créé par Célia Gaudin dans le cadre d'un projet d'étude OpenClassrooms</p>
    </footer>
</body>

</html>