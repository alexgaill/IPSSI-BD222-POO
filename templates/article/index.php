    <h1>Liste des articles</h1>

    <ul>
        <?php foreach ($articles as $article):  ?>
            <li><a href="/article/single/<?= $article->getId() ?>"><?= $article->getTitle() ?></a></li>
        <?php endforeach; ?>
    </ul>