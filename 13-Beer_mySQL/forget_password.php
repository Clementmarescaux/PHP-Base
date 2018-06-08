<?php
require('partials/header.php'); 

?>
<div class="head">
    <div class="container pt-5">
        <h1 class="d-flex justify-content-center text-left">Mot de passe oublié</h1>
    </div>
</div>
<?php
if (!empty($_POST)) {
    $email = $_POST['email'];

    // Vérifier si l'email existe dans la bdd
    $query = $db->prepare('SELECT COUNT(*) FROM user WHERE email = :email');
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $emailExists = (bool) $query->fetchColumn();
    var_dump($emailExists);
    if ($emailExists) {

    }
}

?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <form method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <button class="btn"> Envoyer un mail </button>
            </form>
        </div>
    </div>
</div>

<?php

require('partials/footer.php'); 