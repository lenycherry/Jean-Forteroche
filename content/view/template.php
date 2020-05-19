<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="content/assets/CSS/style.css" rel="stylesheet" /> 
    </head>

    <body>
    <header>
        <h1>Jean Forteroche</h1>
        <nav id="main_navbar">
            <ul>
                <li class="chapter_menu">Chapitres</li>
                <li class="inscription_button">Inscription</li>
                <li class="login_button">Connection</li>
                <li class="logout_button">Déconnection</li>
            </ul>
        </nav>
    </header>

   <main><?php echo $content ?></main>

   <footer>
       <p>Blog Fictif créé par Célia Gaudin dans le cadre d'un projet d'étude OpenClassrooms</p>
   </footer>
    </body>

</html>