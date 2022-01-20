    <h1>Vous consulté l'article n° <?= $article->getId() ?></h1>
    <h2><?= $article->getTitle() ?></h2>
    <p><?= $article->getContent() ?></p>

    <small>Article appartenant à la catégorie <a href="/categorie/single/<?= $article->catId ?>"><?= $article->name ?></a></small>

    <div>
        <a href="/article/update/<?= $article->getId() ?>"><button class="btn btn-primary">Modifier</button></a>
        <a href="/article/delete/<?= $article->getId() ?>"><button class="btn btn-danger">Supprimer</button></a>
    </div>