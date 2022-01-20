    <h1>Ajouter un article</h1>
    <form method="post">
        <label>titre de l'article
            <input type="text" name="title">
        </label>
        <label for="">Contenu de l'article:
            <textarea name="content" id="" cols="30" rows="10"></textarea>
        </label>
        <label for="">
            <select name="categorie_id" id="">
                <?php foreach($categories as $categorie): ?>
                    <option value="<?= $categorie->getId() ?>"><?= $categorie->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <button>Ajouter</button>
    </form>