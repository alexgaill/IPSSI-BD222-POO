    <h1>Modifier un article</h1>
    <form method="post">
        <label>titre de l'article
            <input type="text" name="title" value="<?= $article->getTitle() ?>">
        </label>
        <label for="">Contenu de l'article:
            <textarea name="content" id="" cols="30" rows="10"><?= $article->getContent() ?></textarea>
        </label>
        <label for="">
            <select name="categorie_id" id="" value="<?= $article->getCategorieId() ?>">
                <?php foreach($categories as $categorie): ?>
                    <option value="<?= $categorie->getId() ?>"><?= $categorie->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <button>Ajouter</button>
    </form>