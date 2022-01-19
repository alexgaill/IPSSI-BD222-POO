
    <h1 class="mt-5">Liste des catégories</h1>

    <ul class="list-group mt-3">
        <?php foreach ($categories as $cat):  ?>
            <li class="list-group-item"><a href=""><?= $cat->getName() ?></a></li>
        <?php endforeach; ?>
    </ul>