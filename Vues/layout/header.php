<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr-FR">
<!--heut de page-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./styles/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Site</title>
</head>

<body>
    <header>
        <!--Barre de navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary">
            <div class="container-fluid">
                <a class="navbar-brand text-white fw-bold" href="./index.php">Série-Avis</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="./netflix.php">Netflix</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="./hbo.php">Hbo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="./primeVideo.php">Prime Video</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="./disney.php">Disney</a>
                        </li>   
                    </ul>
                    
<!--si connecter-->
                    <?php if ($_SESSION && $_SESSION["username"]) : ?>

                        <a href="./createPost.php" class="mx-2 btn btn-warning">Donner mon avis</a>
                        <a href="./disconnect.php" class="mx-2 btn btn-danger">Se déconnecter</a>
                        <a href="./createAccount.php" class="mx-2 btn btn-success">Crée un compte</a>
                        <a href="./profil.php" class="mx-2 btn btn-primary">Mon compte</a>
                    <?php else : ?>
                        <a href="./createAccount.php" class="mx-2 btn btn-primary">Se connecter</a>
                    <?php endif ?>

                </div>
            </div>
        </nav>
    </header>

</body>

</html>

<?php
//Récupérer les fichier User.php et Post.php

function loadClass(string $class)
{
    if (str_contains($class, "Controller")) {
        require "./Controller/$class.php";
    } else {
        require "./Entity/$class.php";
    }
}

spl_autoload_register("loadClass");

$postController = new PostController();
$userController = new UserController();

?>

<main class="container">