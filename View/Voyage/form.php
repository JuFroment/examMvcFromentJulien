<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un voyage</title>
    <?php
    require 'Public/global-stylesheets.php';
    require 'Public/global-scripts.php';
    ?>
</head>
<body>
<div class="container">
    <?php
    if(isset($editVoyage)){
        echo('<h1 class="text-center mt-3">Édition du voyage <em>'. $editVoyage->getNom()  .'</em></h1>');
    } else {
        echo('<h1 class="text-center mt-3">Ajout d\'un nouveau voyage</h1>');
    }
    ?>
    <div class="text-center">
        <a href="index.php?controller=voyage&action=list&id=<?php echo($category->getIdCategory());?>" class="btn btn-warning mb-5">Retour</a>
    </div>

    <form class="d-flex justify-content-center" method="post" enctype="multipart/form-data">
        <div class="card" style=" width: 35rem;">
            <div class="m-3">
                <label for="nom" class="form-label"><strong>Nom du Voyage</strong></label>
                <input <?php if(isset($editVoyage)){
                    echo('value="'.$editVoyage->getNom().'"');}
                ?> type="text" class="form-control" name="nom" id="nom">
            </div>
            <hr>
            <div class="m-3">
                <label for="lattitude" class="form-label"><strong>Lattitude :</strong></label>
                <input <?php if(isset($editVoyage)){
                    echo('value="'.$editVoyage->getLattitude().'"');}
                ?> type="float" step="0.000001" class="form-control" name="lattitude" id="lattitude">
            </div>
            <hr>
            <div class="m-3">
                <label for="longitude" class="form-label"><strong>Longitude :</strong></label>
                <input
                <?php if(isset($editVoyage)){
                    echo('value="'.$editVoyage->getLongitude().'"');}
                ?>
                    type="float" step="0.000001" class="form-control" name="longitude" id="longitude">
            </div>
            <hr>
            <div class="m-3">
                <label for="picture"><strong>Image du voyage :</strong></label>
                <input type="file" id="picture" name="picture" accept="image/png, image/jpeg"><br>
                <?php if(!empty($editVoyage) && !empty($editVoyage->getPicture())){
                    echo('Image actuelle : <img src="Public/uploads/'.$editVoyage->getPicture().'" width="100px" height="auto" class="my-3">');
                }?>
            </div>
            <hr>
            <div class="m-3">
                <label for="id_category" class="form-label"><strong>Catégorie : </strong></label>
                <input disabled <?php if(isset($editVoyage)){
                    echo('value="'.$category->getTitre().'"');}
                ?> type="text" class="form-control" name="id_category" id="id_category" value="<?php echo($category->getTitre());?>">
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

