<?php

// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php

require('partials/header.php');


?>
<!-- Le contenu de la page -->
<div class="head">
    <div class="container">
        <h1 class="d-flex justify-content-end text-left">Welcome to Mon Bière Shop</h1>
    </div>
</div>
<div class="container marketing">

<!-- Three columns of text below the carousel -->
<div class="row">
  <div class="col-lg-4 text-center">
    <img class="rounded-circle " src="http://www.anheuser-busch.com/content/dam/universaltemplate/ab/abhomepage/beers_prod.jpg" alt="Generic placeholder image" width="140" height="140">
    <h2 class="text-left">Nos bières</h2>
    <p class="text-left">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
    <p><a class="btn" href="beer_list.php" role="button">Je découvre !</a></p>
  </div><!-- /.col-lg-4 -->
  <div class="col-lg-4 text-center">
    <img class="rounded-circle" src="https://joy.org.au/theescapehour/wp-content/uploads/sites/367/2018/05/CraftBeer.png" alt="Generic placeholder image" width="140" height="140">
    <h2 class="text-left">Proposez votre bière</h2>
    <p class="text-left">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
    <p ><a class="btn" href="beer_add.php" role="button">Je propose !</a></p>
  </div><!-- /.col-lg-4 -->
  <div class="col-lg-4 text-center">
    <img class="rounded-circle" src="http://www.pizzafons.com/_dynamique/gestionContenus02/zoom/repas-de-groupe-1024x768-25.jpg" alt="Generic placeholder image" width="140" height="140">
    <h2 class="text-left">L'équipe</h2>
    <p class="text-left">Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum.</p>
    <p><a class="btn" href="#" role="button">Je rencontre la team !</a></p>
  </div><!-- /.col-lg-4 -->
</div><!-- /.row -->


 
        </div>

<!-- START THE FEATURETTES -->



<div class="lead-sentence mt-5">
    <div class="container">
        <h2 class="text-center">Déjà 1 millions d'utilisateurs !</h2>
    </div>
</div>
<div class="container pt-5">
<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
  </div>
  <div class="col-md-5">
    <img class="featurette-image img-fluid mx-auto" src="https://irp-cdn.multiscreensite.com/4e33a252/dms3rep/multi/mobile/Glass-bottles-of-beer-800x533.jpg" alt="Generic placeholder image">
  </div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7 order-md-2">
    <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
  </div>
  <div class="col-md-5 order-md-1">
    <img class="featurette-image img-fluid mx-auto" src="https://static.vinepair.com/wp-content/uploads/2017/06/ind-internal.jpg" alt="Generic placeholder image">
  </div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
  </div>
  <div class="col-md-5">
    <img class="featurette-image img-fluid mx-auto" src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/701/beer-main-0-1496757601.jpg?resize=768:*" alt="Generic placeholder image">
  </div>
</div>

<hr class="featurette-divider">

<!-- /END THE FEATURETTES -->

</div><!-- /.container -->

<?php
// Inclure le fichier partials/footer.php

require('partials/footer.php');