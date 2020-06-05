<?php $title = 'Jean Forteroche ACCUEIL'; ?>

<div id="home_container">
    <h1>Un aller simple pour l' Alaska</h1>
    <h3>La nouvelle oeuvre de Jean Forteroche à découvrir chapitre par chapitre.</h3>
</div>
<div id="summary_container">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tincidunt risus a sem iaculis luctus. Donec quis ultricies orci, et laoreet enim. Proin nec eros tincidunt, ultricies ligula eget, consectetur velit. Quisque eget massa eu orci feugiat dapibus sit amet eu orci. Etiam posuere, libero sed faucibus iaculis, est dui malesuada velit, ut mattis urna augue et arcu. Proin et consequat metus, vel dapibus sem. Nulla commodo augue vel eleifend mollis. Nulla ac viverra dolor, et convallis turpis. Proin vitae purus sit amet odio blandit aliquet. Nulla ac mi quis est mattis dignissim sed ut leo. Suspendisse nec tortor eu tortor accumsan lobortis. Pellentesque facilisis malesuada leo eget aliquet. Sed scelerisque orci dui, lobortis ultrices enim vestibulum eu. Donec scelerisque vitae mi sit amet varius.</p>
</div>
<div id="new_chapter_container">
    <div id="current_chapter_container">
        <?php $lastChapter = end($chapters); ?>
        <h2><a href="<?php echo HOST; ?>chapter/id/<?php echo $lastChapter['id'] ?>">Dernier Chapitre publié</a></h2>
        <h3><?php echo $lastChapter['title']; ?></h3>
        <article><?php echo $lastChapter['content']; ?></article>
    </div>
    <div id="new_comment_container"></div>
</div>
<div id="présentation_container">
    <h3>Jean Forteroche</h3>
    <p>Morbi leo ipsum, interdum non ipsum quis, luctus venenatis urna. Sed at fringilla felis. Nunc vel molestie lorem. Nunc ligula leo, tempor id dictum ac, laoreet non felis. Aenean pellentesque lacus vitae dui porta faucibus. Etiam a elit quis erat condimentum efficitur finibus non magna. Ut luctus elit vel consectetur semper. Nulla a pellentesque ante. Quisque nibh turpis, consectetur a lobortis ac, feugiat et risus. Suspendisse lacinia eu ipsum at mollis. Fusce sollicitudin risus sed arcu scelerisque, a rhoncus ex porta.</p>
</div>