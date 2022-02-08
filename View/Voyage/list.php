<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tous les voyages de la catégorie : </title>
    <?php
    require 'Public/global-stylesheets.php';
    require 'Public/global-scripts.php';
    include 'View/Parts/menu.php'
    ?>
</head>
<body>
<div class="container">
    <h1 class="text-center my-5">Tous les voyages de la catégorie : <?php echo($category->getTitre());?></h1>
    <?php if($this->user->GetIsAdmin()){ echo('    <div class="text-center">
        <a href="index.php?controller=voyage&action=add&id='.$category->getIdCategory().'" class="btn btn-success mb-3">Ajouter un voyage</a>
    </div>'); }?>
    <div class="text-center">
        <a href="index.php?controller=category&action=list" class="btn btn-warning mb-3">Retour</a>
    </div>

    <div class="col-4 offset-4 text-center my-5">
    <?php if(count($voyage) == 0){ echo('<div class="alert alert-warning" role="alert">
  Il n\'y a pas de voyage dans cette catégorie.
</div>');}?>
    </div>
    <div class="row justify-content-center">
        <?php
        foreach ($voyage as $result){
            echo('
<div class="card m-3" style="width: 18rem;">
  <img src="Public/uploads/'.$result->getPicture().'" class="card-img-top img mx-auto d-block mt-3" alt="...">
  <div class="card-body text-center">
    <h5 class="card-title">'.$result->getNom().'</h5>
    <div class="row">
    <h6 class="card-title mb-3 col-6"><strong>Lattitude :</strong> '.$result->getLattitude().'</h6>
    <h6 class="card-title mb-3 col-6"><strong>Longitude : </strong>'.$result->getLongitude().'</h6>
    </div>
    <a href="index.php?controller=voyage&action=edit&id='.$result->getIdVoyage().'" class="btn btn-warning me-3"><i class="fas fa-edit"></i></a>
    <a href="index.php?controller=voyage&action=delete&id='.$result->getIdVoyage().'" class="btn btn-danger me-3"><i class="fas fa-trash"></i></a>
    <a href="index.php?controller=voyage&action=map&id='.$result->getIdVoyage().'" class="btn btn-primary"><i class="fas fa-map-marked-alt"></i></a>
  </div>
</div>');

        }
        ?>
    </div>
</div>
</body>
</html>