<?php

use App\Controller\Articlecontroller;
// use App\Controller\CategorieController;
// use App\Controller\ErrorController;

/********** Premier router basé sur un paramètre dans l'url **********/
// if (isset($_GET["page"])) {
//     switch ($_GET["page"]) {
//         case 'singleArt':
//             (new Articlecontroller)->single();
//             break;
//         case 'saveArt':
//             (new Articlecontroller)->save();
//             break;
//         case 'updateArt':
//             (new Articlecontroller)->update();
//             break;
//         case 'deleteArt':
//             (new Articlecontroller)->delete();
//             break;
//         case 'categorie':
//             (new CategorieController)->index();
//             break;
//         case 'singleCat':
//             (new CategorieController)->single();
//             break;
//         case 'saveCat':
//             (new CategorieController)->save();
//             break;
//         case 'updateCat':
//             (new CategorieController)->update();
//             break;
//         case 'deleteCat':
//             (new CategorieController)->delete();
//             break;
        
//         default:
//             (new ErrorController)->pageError();
//             break;
//     }
// } else {
//     (new Articlecontroller)->index();
// }

/********** Deuxième router basé sur le path info **********/


if (isset($_SERVER["PATH_INFO"])) {
    $dataRouter = explode("/", $_SERVER["PATH_INFO"]);
    $controller = "App\Controller\\" . ucfirst($dataRouter[1])."Controller";
    $method = $dataRouter[2];
    $param = isset($dataRouter[3]) ? $dataRouter[3] : null;

    (new $controller)->$method($param);

} else {
    (new Articlecontroller)->index();
}
// var_dump($_SERVER);