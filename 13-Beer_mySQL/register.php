<?php

// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php

require('partials/header.php');


?>
<div class="bg bg6">
    <div class="container">
        <h1 class="d-flex justify-content-end text-left">Inscription</h1>
    </div>
    <br />

    <?php
        if (!empty($_POST)) {
            $login = str_replace(' ', '', trim(strip_tags($_POST['login'])));
            $email = $_POST['email'];
            $password = trim($_POST['password']);
            $confirmPassword = trim($_POST['confirmPassword']);

            $errors = [];

            if (empty($login)) {
                $errors['login'] = 'Le login est vide.';
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'L\'e-mail n\'est pas valide.';
            }

            if (empty($password) || $password != $confirmPassword) {
                $errors['password'] = 'Les mots de passe ne correspondent pas';
            }

                if (empty($errors)) {
                    $query = $db->prepare('INSERT INTO user (login, email, password, created_at) VALUES (:login, :email, :password, NOW())');
                    $query->bindvalue(':login', $login, PDO::PARAM_STR);
                    $query->bindvalue(':email', $email, PDO::PARAM_STR);
                    $query->bindvalue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
                   
            
                    if($query->execute()) { 
                      echo '<div class="alert alert-success">🍺🍺<br/>Bienvenue dans la communauté Mon Bière Shop ! </div>';
                    } 
            }

          //  var_dump($login, $email, $password, $confirmPassword ,$errors);
        }
        
    ?>


    <div class="container">
        <div class="row">
        <div class="col-6 offset-6">
                <form method="POST" class="clearfix" enctype="multipart/form-data">
                    <div class="form-group ">                   
                        <input type="text" class="form-control" name="login" id="login" placeholder="Nom d'utilisateur">    
                    </div>
                    <div class="form-group ">                   
                        <input type="email" class="form-control" name="email" id="email"  placeholder="E-mail">                        
                    </div>
                    <div class="form-group">                   
                        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
                    </div>
                    <div class="form-group ">                   
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword"  placeholder="Confirmez votre mot de passe">                        
                    </div>                   
                    <button type="submit" class="btn float-right">Je m'inscris !</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
// Inclure le fichier partials/footer.php

require('partials/footer.php');