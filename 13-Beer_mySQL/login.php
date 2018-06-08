
<?php

// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php

require('partials/header.php');

if (!empty($_POST)) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    // Vérifie que l'email existe en BDD
    $query = $db->prepare('SELECT * FROM user WHERE login = :login');
    $query->bindValue(':login', $login, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(); // Retourne un tableau avec le user ou false
    $error = null;
    
    // Si le user n'existe pas en BDD
    if (!$user) {
        $error = 'Le login n\'existe pas.';
    }
    // Est-ce que le mot de passe est correct ?
    if (!password_verify($password, $user['password'])) {
        $error = 'Le mot de passe n\'est pas correct';
    }
    
    // Si le user existe, on peut se connecter
    if (!$error) {

        $token = hash('sha256', $user['id'].$user['password'].$user['created_at']);

        unset($user['password']); // On supprime l'affichage du mot de passe crypté
        $_SESSION['user'] = $user;

        // Si on a coché la case remember me, on ajoute le cookie
        if (isset($_POST['rememberme'])) {
        setcookie('id', $user['id'], time() + 60 * 60 * 24 * 365);
        setcookie('token', $token, time() + 60 * 60 * 24 * 365);
    }

        // Après la connexion on redirige l'utilisateur vers la dernière page visitée
        
        if(isset($_SERVER['HTTP_REFERER'])) {
            header('Location:' . $_GET['referer']);
            exit();
        }
    }

    
   
}

?>
<div class="bg bg6">    
    <div class="container">
    <h1 class="text-left">Connexion</h1> 
    <br />
        <div class="row">
        <div class="col-6">
            <!-- Le action permet soit de rediriger vers la dernière page visitée ou vers la page d'accueil s'il n'y en a pas-->
                <form method="POST" action="?referer=<?php echo $_SERVER['HTTP_REFERER'] ?? 'index.php'; ?>" class="clearfix" enctype="multipart/form-data">
                    <div class="form-group ">                   
                        <input type="text" class="form-control" name="login" id="login" placeholder="Nom d'utilisateur">    
                    </div>
                    <div class="form-group ">                   
                        <input type="password" class="form-control" name="password" id="password"  placeholder="Mot de passe">                     
                    </div> 
                    <div class="form-check">
                        <input class="form-check-input checkboxes" name=rememberme" type="checkbox" id=rememberme">
                        <label class="form-check-label ml-5" for="rememberme">
                                  Remember me
                        </label>
                    </div>
                    
                    <button type="submit" class="btn float-right">Je me connecte !</button>
                                      
                </form>
                <a class="text-center" href="forget_password.php"> Mot de passe oublié ?</a> 
            </div>
        </div>
    </div>
</div>
<div class="container marketing">

<?php
// Inclure le fichier partials/footer.php

require('partials/footer.php');