<?php
require "./Vues/layout/header.php";
//Crée une publication
if ($_POST) {
    $post = new Post($_POST);
    $post->setUserId($_SESSION["id"]);
    $postController->create($post);
    echo "<script>window.location.href='./index.php'</script>";
}

$posts = $postController->readAll();
//Crée de publication si tes pas connecter 
if ($_SESSION && $_SESSION["username"]){?>
<div class="col mb-5"></div>
<h3 class="text-center">Poster une publications : </h3>

<div class="col mb-5"></div>
<div class="border border-secondary p-4 mb-2 rounded">
<!--Publier une publication-->
    <form class="row g-3 requires-validation" novalidate method="POST">

        <div class="col-md-12 form-group position-relative">

            <label for="content" class="form-label">Votre avis : </label>
            <div class="input-group">
                <div class="input-group-text"><i class="fa-sharp fa-solid fa-comment"></i></div>
                <textarea type="text" name="content" class="form-control" id="content" placeholder="Votre avis" required></textarea>
            </div>
            <div class="valid-feedback">Parfait !</div>
            <div class="invalid-feedback">Donner votre avis.</div>
        </div>

        <label for="content" class="form-label">Choisir une catégorie : </label>
        
        <div class="form-check">
            <input type="radio" class="form-check-input" id="validationFormCheck3" name="category" required>
            <label class="form-check-label" for="validationFormCheck3">Hbo</label>
            <div class="valid-feedback">Parfait !</div>
            <div class="invalid-feedback">Choisir une catégorie.</div>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="validationFormCheck2" name="category" required>
            <label class="form-check-label" for="validationFormCheck2">Netflix</label>
            <div class="valid-feedback">Parfait !</div>
            <div class="invalid-feedback">Choisir une catégorie.</div>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="validationFormCheck2" name="category" required>
            <label class="form-check-label" for="validationFormCheck2">Disney</label>
            <div class="valid-feedback">Parfait !</div>
            <div class="invalid-feedback">Choisir une catégorie.</div>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="validationFormCheck2" name="category" required>
            <label class="form-check-label" for="validationFormCheck2">Prime Vidéo</label>
            <div class="valid-feedback">Parfait !</div>
            <div class="invalid-feedback">Choisir une catégorie.</div>
        </div>

        <div class="col-12 btn-toolbar justify-content-between" role="toolbar">
            <div class="btn-group" role="group" aria-label="First group">
                <input class="btn btn-success" value="Crée un post" type="submit">
            </div>

            <div class="input-group">
                <button class="btn btn-primary text-end" type="reset" value="Reset">Réinitialiser</button>
            </div>
        </div>

    </form>
</div>
<?php //Pas crée de publication si tes pas connecter 
}else { ?>
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
    <?php } ?>

<?php require "./Vues/layout/footer.php"; ?>