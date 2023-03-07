<?php
require "./Vues/layout/header.php";

$posts = $postController->getAllPrimeVideo();
//Afficher les publications de Prime Vidéo
if ($_SESSION && $_SESSION["username"]){?>



    <div class="col mb-5"></div>
    <h3 class="text-center">Voici les publications de Prime Vidéo : </h3>

    <?php foreach ($posts as $post)   {?>
        <div class="col mb-4"></div>
        <div class="col-md-12">
            <div class="card mb-3 ">
                <div class="row g-0 ">
                    <div class="col-md-4 <?= $i === 0 ? "active" : "" ?>"></div>
                    <div class="card-header bg-transparent border-success">
                        <p class="fs-4 fw-bold"><?= $userController->read($post->getUserId())->getUsername() ?></p>
                        <p class="card-text text-end fst-italic"><?= $post->getPublishedAt() ?></p>
                        <p class="card-text text-end fst-italic"><?= $post->getCategory() ?></p>
                    </div>
                    <div class="card-body ">
                        <h5 class="card-title fw-normal"><?= $post->getContent() ?></h5>

                    </div>
                    <div class="card-footer bg-transparent border-success d-grid gap-2">
                        <?php if ($userController->read($post->getUserId())->getUsername() === $_SESSION["username"]) : ?>
                            <a href="./updatePost.php?id=<?= $post->getId() ?>" onclick="return confirm('Est-ce que vous voulez réellement modifier votre publication ?');" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="./deletePost.php?id=<?= $post->getId() ?>" onclick="return confirm('Est-ce que vous voulez réellement supprimer votre publication ?');" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a><?php endif ?>
                    </div>

                </div>
            </div>
        </div>



    <?php } ?>




<?php }else { ?><!--Modifier ces publication-->
    <div class="col mb-5"></div>
    <h3 class="text-center">Voici les publications de Prime Vidéo : </h3>

    <?php foreach ($posts as $post)  { ?>
        <div class="col mb-4"></div>
        <div class="col-md-12">
            <div class="card mb-3 ">
                <div class="row g-0 ">
                    <div class="col-md-4 <?= $i === 0 ? "active" : "" ?>"></div>
                    <div class="card-header bg-transparent border-success">
                        <p class="fs-4 fw-bold"><?= $userController->read($post->getUserId())->getUsername() ?></p>
                        <p class="card-text text-end fst-italic"><?= $post->getPublishedAt() ?></p>
                        <p class="card-text text-end fst-italic"><?= $post->getCategory() ?></p>
                    </div>
                    <div class="card-body ">
                        <h5 class="card-title fw-normal"><?= $post->getContent() ?></h5>

                    </div>
                    
                </div>
            </div>
        </div>



    <?php } }?>


<?php require "./Vues/layout/footer.php"; ?>