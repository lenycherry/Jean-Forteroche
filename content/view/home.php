<?php $title = 'Jean Forteroche ACCUEIL'; ?>

<div id="title_container">
    <h1>Billet simple pour l'Alaska</h1>
    <h3>La nouvelle oeuvre de Jean Forteroche à découvrir chapitre par chapitre.</h3>
</div>
<div id='main_home_content'>
    <div id="articles_container">
        <section id="summary_container">
            <h2>Un livre à découvrir par épisode</h2>
            <p>Découvrez le premier Roman noir de Jean Forteroche. Publié chapitre par chapitre, ne ratez aucun épisode de "Billet simple pour l'Alaska", un thriller haletant au coeur d'un paysage sauvage et glacial.</p>
        </section>
        <section id="presentation_container">
            
            <img class="fj_picture" src="../content/assets/images/jf_picture.jpg" alt="Photo de Jean Forteroche">
           <div class="presentation_p">
           <h2>Jean Forteroche</h2>
            <p>Acteur Français de renommée internationnal, Jean Forteroche est également un écrivain confirmé. Ses nouvelles "Les nouvelles de JF" ont déjà concquis le coeur de son public en 2019. Aujourd'hui Jean Forteroche s'attaque à un roman d'envergure dans un mode de publication gratuit et moderne.</p>
           </div>
        </section>
    </div>
    <div id="new_chapter_container">
        <?php $lastChapter = end($chapters); ?>
        <h2><a href="<?php echo HOST; ?>chapter/id/<?php echo $lastChapter['id'] ?>">Dernier Chapitre publié</a></h2>
        <article class="new_chapter_content">
            <h3><?php echo $lastChapter['title']; ?></h3>
            <p><?php echo substr($lastChapter['content'], 0, 500); ?> ...</p>
            <div class="btn"><a href="<?php echo HOST; ?>chapter/id/<?php echo $lastChapter['id'] ?>">Lire le chapitre</a></div>
        </article>
    </div>
</div>