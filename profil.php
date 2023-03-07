<?php
require "./Vues/layout/header.php";
//Lire ses publications
$posts = $postController->readAll();
?>


<div class="col mb-5"></div>
<h3 class="text-center">Voici vos publications : </h3>
<p class="fs-3 fw-bold text-decoration-none link-dark"><a href="#profil">- Voir mon profil</a></p>
<?php foreach ($posts as $post) :

    if ($userController->read($post->getUserId())->getUsername() === $_SESSION["username"]) { ?>

        <div class="col mb-4"></div>
        <div class="col-md-12">
            <div class="card mb-3 ">
                <div class="row g-0 ">
                    <div class="col-md-4 <?= $i === 0 ? "active" : "" ?>"></div>
                    <div class="card-header bg-transparent border-success">
                    <p class="fs-4 fw-bold"><?= $userController->read($post->getUserId())->getUsername() ?></p> 
                    <p class="card-text text-end fst-italic"><?= $post->getPublishedAt() ?></p></div>
                    <div class="card-body ">
                        <h5 class="card-title fw-normal"><?= $post->getContent() ?></h5>
                        
                    </div>
                    <div class="card-footer bg-transparent border-success d-grid gap-2">
                        <?php if ($userController->read($post->getUserId())->getUsername() === $_SESSION["username"]) : ?>
                            <a href="./updatePost.php?id=<?= $post->getId() ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="./deletePost.php?id=<?= $post->getId() ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a><?php endif ?>
                    </div>

                </div>
            </div>
        </div>

<?php }//Lire son profil
endforeach ?>

<div class="col mb-5"></div>
<h2 id="profil">Mon profil :</h2>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title "><?= $userController->read($post->getUserId())->getUsername() ?></h5>
            <p class="card-text"><?= $userController->read($post->getUserId())->getEmail() ?></p>
        </div>
    </div>
</div>




<?php
require "./Vues/layout/footer.php" ?>