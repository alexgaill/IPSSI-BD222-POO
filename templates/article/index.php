    <h1>Liste des articles</h1>

    <ul>
        <?php foreach ($articles as $article):  ?>
            <li><a href=""><?= $article->title ?></a></li>
        <?php endforeach; ?>
    </ul>