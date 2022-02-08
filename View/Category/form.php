<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter une catégorie</title>

<?php
require 'Public/global-stylesheets.php';
require 'Public/global-scripts.php';
?>
</head>
<body>
<div class="container">
    <?php
        if(isset($editCategory)){
            echo('<h1 class="text-center mt-3">Édition de la catégorie <em>'. $editCategory->getTitre()  .'</em></h1>');
        } else {
            echo('<h1 class="text-center mt-3">Ajouter une nouvelle catégorie</h1>');
        }
        ?>
    <div class="text-center">
        <a href="index.php?controller=category&action=list" class="btn btn-warning mb-5">Retour</a>
    </div>

    <form class="d-flex justify-content-center" method="post" enctype="multipart/form-data">
        <div class="card" style=" width: 35rem;">
            <div class="m-3">
                <label for="titre" class="form-label"><strong>Titre de la catégorie</strong></label>
                <input <?php if(isset($editCategory)){
                    echo('value="'.$editCategory->getTitre().'"');}
                ?> type="text" class="form-control" name="titre" id="titre">
            </div>
            <hr>
            <div class="m-3">
                <label for="image"><strong>Image de la catégorie :</strong></label>
                <input type="file" id="image" name="image" accept="image/png, image/jpeg"><br>
                <?php if(!empty($editCategory) && !empty($editCategory->getImage())){
                    echo('Image actuelle : <img src="Public/uploads/'.$editCategory->getImage().'" width="100px" height="auto" class="my-3">');
                }?>
            </div>
            <hr>
            <div class="mb-3 text-center">
                <input type="submit" class="btn btn-success" value="Envoyer">
            </div>
        </div>
    </form>
<div class="col-6 offset-3">
    <?php
        require 'View/Parts/form-error.php';
    ?>
</div>
</div>

</body>
</html>