    <h1>Vous êtes dans la catégorie n° <?= $categorie->getId() ?></h1>
    <h2>Nom de la catégorie: <?= $categorie->getName() ?></h2>

    <a href="/categorie/update/<?= $article->getId() ?>"><button class="btn btn-primary">Modifier</button></a>
    <a href="/categorie/delete/<?= $article->getId() ?>"><button class="btn btn-danger">Supprimer</button></a>