
<?php

// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php

require('partials/header.php');


$query = $db->query('SELECT * FROM brewery');
$breweries= $query->fetchAll();



?>

<div class="bg bg5">
    <div class="container pt-5">
        <h1 class="d-flex justify-content-center text-left">Les brasseries</h1>
    </div>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">NOM</th>
      <th scope="col">ADDRESSE</th>
      <th scope="col">VILLE</th>
      <th scope="col">CODE POSTAL</th>
      <th scope="col">PAYS</th>
      <th scope="col">FICHE CONTACT</th>
    </tr>
  </thead>
  <tbody>
   
    <?php foreach ($breweries as $brewery) { ?>
        <tr>
      <th scope="row"><?php echo $brewery['name'] ?></th>
      <td><?php echo $brewery['address'] ?></td>
      <td><?php echo $brewery['city'] ?></td>
      <td><?php echo $brewery['zip'] ?></td>
      <td><?php echo $brewery['country'] ?></td>
      <td><a href="brewery_single.php?id=<?php echo $brewery['id'] ?>">Contact</a></td>
      </tr>
    <?php } ?>
      
    
  </tbody>
</table>


<?php
// Inclure le fichier partials/footer.php

require('partials/footer.php');