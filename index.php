<?php include('config.php'); ?>
<!doctype html>
<html class="no-js" lang="fr">
<head>
  <title>Accueil Blog</title>
<?php include('doctype.php'); ?>

  <form class="col-12 text-center pb-2 pt-2" action="addblog.php" method="post">
    <input type="submit" name="addblog" value="Ajouter page blog">
  </form>

  <div class="col-6 mx-auto">
    <p>Les 5 derniers Billets du blog:</p>
  </div>

  <?php
  // Select the blog
   $reponse = $bdd->query('SELECT * FROM blogcommentaire ORDER BY id DESC LIMIT 5');
   // see all blog with the foreach (don't need to fetch because only 1 with this id)
    echo '<div class="col-6 mx-auto">';
     foreach ($reponse as $key => $value) {
       echo "<a class='col-6 mx-auto' href='viewcom.php?blog=" . $value['id'] . "'>
       <div class='col-12 mx-auto blogcreate mt-2'>
         <div class='col-12 titlecom'>
           <h1>" . $value['title'] . "</h1>
           <p>test</p>
         </div>
         <div class='col-12 row'>
           <div class='col-12 name m-0'>
             <h2>" . $value['pseudo'] . "</h2>
           </div>
           <div class='col-12 pl-4 pt-2'>
             <p>" . $value['message'] . "</p>
           </div>
         </div>
       </div></a>";
     }
     echo '</div>';

     $reponse->closeCursor();

  ?>

<?php include('script.php') ?>
