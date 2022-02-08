<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
        <div class=" col-3 offset-9 my-3">
            <a class="nav-link btn btn-danger text-white me-3" href="index.php?controller=security&action=logout">Se
                déconnecter</a>

        </div>
</div>
<h2 class="text-center">
    Bienvenue <?php if ($this->user) {
        echo($this->user->getUsername());
    } ?>
</h2>

</body>
</html>