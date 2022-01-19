    <h1>Modifier un article</h1>
    <form method="post">
        <label>titre de l'article
            <input type="text" name="title" value="<?= $article->title ?>">
        </label>
        <label for="">Contenu de l'article:
            <textarea name="content" id="" cols="30" rows="10"><?= $article->content ?></textarea>
        </label>
        <label for="">
            <select name="categorie_id" id="" value="<?= $article->categorie_id ?>">
                <?php foreach($categories as $categorie): ?>
                    <option value="<?= $categorie->id ?>"><?= $categorie->name ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <button>Ajouter</button>
    </form>