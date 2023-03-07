<?php require "./Vues/layout/header.php";
//Supprimer une publication si c'est celui de l'utilisateur

if ($_SESSION && $_SESSION["username"]) :

    $postController->delete($_GET["id"]);
    echo "<script>window.location.href = './index.php'</script>"; ?>


<?php else : ?>
    <div class="col mb-5"></div>
    <div class="col-md-12">
        <div class="card mb-3 ">
            <div class="row g-0 ">
                <div class="col-md-5"></div>
                <div class="card-header text-center">
                    <p class="fs-4 fw-bold">Vous devez vous connecter !</p>
                </div>

                <p class="card-text fs-3 font-weight-normal">- Pour lire les avis sur vos séries préférés</p>
                <p class="card-text fs-3 font-weight-normal"> - Donner votre avis</p>
                <a href="./createAccount.php" class="btn btn-primary">Se connecter</i></a>
            </div>
        </div>
    </div>
<?php endif ?>


<?php require "./Vues/layout/footer.php"; ?>