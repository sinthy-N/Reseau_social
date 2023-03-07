<?php
require "./Vues/layout/header.php";
//page de connexion

if (isset($_POST["login"])) {
    $users = $userController->readAll();
    foreach ($users as $user) {
        if ($_POST["username"] === $user->getUsername() && password_verify($_POST["password"], $user->getPassword())) {
            $_SESSION["id"] = $user->getId();

            $_SESSION["username"] = $user->getUsername();
            $_SESSION["firstName"] = $user->getFirstName();
            $_SESSION["lastName"] = $user->getLastName();
            $_SESSION["email"] = $user->getEmail();
            
            echo "<script>window.location.href = './index.php'</script>";
        } else {
            echo "Vos identifiants de connexion sont incorrects.";
        }
    }
}


//page de création de compte
if(isset($_POST["signUp"])) {
    if ($_POST["password"] === $_POST["confirm"]) {
        array_pop($_POST);
        $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $user = new User($_POST);
        var_dump($user);
        $userController->create($user);
        $_SESSION["id"] = $user->getId();
        $_SESSION["username"] = $user->getUsername();
        //$_SESSION["profil"] = $user->getProfil();
        $_SESSION["firstName"] = $user->getFirstName();
        $_SESSION["lastName"] = $user->getLastName();
        $_SESSION["email"] = $user->getEmail();
        echo "<script>window.location.href = './index.php'</script>";
    } else {
        echo "Les mots de passe ne correspondent pas.";
    }
}



?>

<div class="container-fluid col-lg-4 col-lg-offset-4 ">

    <div class="mb-5"></div>
    <div class="form-modal">
        <div class="text-center"><!--bouton switch entre les boutons-->
            <button class="btn btn-primary btn-lg rounded-pill border-white" name="login" id="login-toggle" onclick="toggleLogin()">Connexion</button>
            <button class="btn btn-light btn-lg rounded-pill border-white " name="signUp" id="signup-toggle" onclick="toggleSignup()">Inscription</button>
        </div>
        <hr class="border border-primary border-1 opacity-50">
        <div class="mb-5"></div>

        <div id="login-form"><!--connexion-->
            <form method="POST">

                <div class="mb-3">
                    <label for="username" class="form-label">Pseudo</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="fa-solid fa-circle-user"></i></div>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Votre pseudo" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Votre mot de passe">
                    </div>
                </div>


                <input type="submit" name="login" value="Connexion" class="btn btn-primary">


            </form>
        </div>


        <div id="signup-form"><!--création du compte-->
            <form class="row g-3 requires-validation" novalidate method="POST">

                <div class="col-md-6 form-group position-relative">
                    <label for="firstName" class="form-label">Prénom</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="fa-regular fa-address-card"></i></div>
                        <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Votre prénom" required>
                    </div>
                    <div class="valid-feedback">Parfait !</div>
                    <div class="invalid-feedback">Veuillez choisir un prénom.</div>
                </div>

                <div class="col-md-6 position-relative">
                    <label for="lastName" class="form-label">Nom</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="fa-regular fa-address-card"></i></div>
                        <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Votre nom" required>
                    </div>
                    <div class="valid-feedback">Parfait !</div>
                    <div class="invalid-feedback">Veuillez choisir un nom.</div>
                </div>

                <div class="col-md-5 position-relative">
                    <label for="username" class="form-label">Pseudo</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="fa-solid fa-circle-user"></i></div>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Votre pseudo" required>
                    </div>
                    <div class="valid-feedback">Parfait !</div>
                    <div class="invalid-feedback">Veuillez choisir un pseudo.</div>
                </div>

                <div class="col-md-7 position-relative">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="fa-solid fa-envelope"></i></div>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Votre email" required>
                    </div>
                    <div class="valid-feedback">Parfait !</div>
                    <div class="invalid-feedback">Veuillez choisir un email.!</div>
                </div>

            

                <div class="col-md-6 position-relative">
                    <label for="password" class="form-label">Mot de passe</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-unlock-fill"></i></i></div>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Votre mot de passe" required>
                    </div>
                    <div class="valid-feedback">Parfait !</div>
                    <div class="invalid-feedback">Veuillez choisir un mot de passe.</div>
                </div>
                <div class="col-md-6 position-relative">
                    <label for="password" class="form-label">Confirmer</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                        <input type="password" name="confirm" class="form-control" id="confirm" placeholder="Votre mot de passe" required>
                    </div>
                    <div class="valid-feedback">Parfait !</div>
                    <div class="invalid-feedback">Veuillez confirmer votre mot de passe.</div>
                </div>
                <div class="col-12 position-relative">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label">Je confirme que toutes les données sont correctes</label>
                        <div class="invalid-feedback">Veuillez confirmer que les données saisies sont toutes correctes !</div>
                    </div>
                </div>

                <div class="col-12 btn-toolbar justify-content-between" role="toolbar">
                    <div class="btn-group" role="group" aria-label="First group">
                        <input class="btn btn-primary" name="signUp" value="Crée mon compte" type="submit">
                    </div>

                    <div class="input-group">
                        <button class="btn btn-primary text-end" type="reset" value="Reset">Réinitialiser</button>
                    </div>
                </div>

            </form>
        </div>

    </div>


<!--lien js pour cette page-->

    <script src="./script/createAccount.js"></script>


    <?php
    require "./Vues/layout/footer.php";

    ?>