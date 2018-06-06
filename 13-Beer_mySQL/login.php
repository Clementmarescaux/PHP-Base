<?php

// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php

require('partials/header.php');


?>
<div class="bg bg6">
    <div class="container">
        <h1 class="d-flex justify-content-end text-left">Connexion</h1>
    </div>
    <br />
    <div class="container">
        <div class="row">
        <div class="col-6 offset-6">
                <form method="POST" class="clearfix" enctype="multipart/form-data">
                    <div class="form-group ">                   
                        <input type="text" class="form-control" name="login" id="login" placeholder="Nom d'utilisateur">    
                    </div>
                    <div class="form-group ">                   
                        <input type="email" class="form-control" name="password" id="password"  placeholder="Mot de passe">                        
                    </div> 
                    <button type="submit" class="btn float-right">Je me connecte !</button>                   
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container marketing">

<?php
// Inclure le fichier partials/footer.php

require('partials/footer.php');