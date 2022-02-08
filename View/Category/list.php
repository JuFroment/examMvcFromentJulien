<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toutes les catégories</title>
    <?php
    require 'Public/global-stylesheets.php';
    require 'Public/global-scripts.php';
    include 'View/Parts/menu.php'
    ?>
</head>
<body>
<div class="container">
    <h1 class="text-center my-5">Toutes les catégories </h1>
    <?php if($this->user->GetIsAdmin()){ echo('    <div class="text-center">
        <a href="index.php?controller=category&action=add" class="btn btn-success mb-3">Ajouter une catégorie</a>
    </div>'); }?>

<div class="row justify-content-center">
        <?php
        foreach ($category as $result){
            echo('
<div class="card m-3" style="width: 18rem;">
  <img src="Public/uploads/'.$result->getImage().'" class="card-img-top img mx-auto d-block mt-3" alt="...">
  <div class="card-body text-center">
    <h5 class="card-title">'.$result->getTitre().'</h5>
    <a href="index.php?controller=voyage&action=list&id='.$result->getIdCategory().'" class="btn btn-primary me-3"><i class="fas fa-eye"></i></a>    <a href="index.php?controller=category&action=edit&id='.$result->getIdCategory().'" class="btn btn-warning me-3"><i class="fas fa-edit"></i></a>
    <a href="index.php?controller=category&action=delete&id='.$result->getIdCategory().'" class="btn btn-danger"><i class="fas fa-trash"></i></a>
  </div>
</div>');

        }
        ?>
</div>
</div>
</body>
</html>