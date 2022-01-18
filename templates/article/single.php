<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Vous consulté l'article n° <?= $article->id ?></h1>
    <h2><?= $article->title ?></h2>
    <p><?= $article->content ?></p>

    <small>Article appartenant à la catégorie <a href=""><button><?= $article->name ?></button></a></small>
</body>
</html>