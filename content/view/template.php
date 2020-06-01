<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="assets/css/style.css" rel="stylesheet" /> 
    </head>

    <body>
    <header>
        <h1>Jean Forteroche</h1>
        <nav id="main_navbar">
            <ol>
                <li class="books_menu">Livres</li>
                <li class="inscription_button">Inscription</li>
                <li class="login_button">Connection</li>
                <li class="logout_button">Déconnection</li>
            </ol>
        </nav>
    </header>

   <main><?php echo $content ?></main>

   <footer>
       <p>Blog Fictif créé par Célia Gaudin dans le cadre d'un projet d'étude OpenClassrooms</p>
   </footer>
    </body>

</html>