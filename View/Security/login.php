<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <?php
    require 'Public/global-stylesheets.php';
    require 'Public/global-scripts.php';
    ?>
</head>
<body>
<div class="container">
    <h1 class="text-center">Login</h1>
    <form class="d-flex justify-content-center" method="post">
        <div class="card" style=" width: 35rem;">
            <div class="m-3">
                <label for="username" class="form-label"><strong>Nom d'utilisateur</strong></label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
            </div>
            <div class="m-3">
                <label for="password" class="form-label"><strong>Mot de passe</strong></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="mb-3 text-center">
                <input type="submit" class="btn btn-success" value="Envoyer">
            </div>
        </div>
    </form>
</div>

<?php
    require 'View/Parts/form-error.php';
?>

</body>
</html>