<?php include('config.php'); ?>

<?php
// prepare select for the blog page (it's here for title of page)
$blognumber = $_GET["blog"];
$resultblog = $bdd->prepare('SELECT * FROM blogcommentaire WHERE id=?');
// execute array for WHERE did same of id and the number of page blog
$resultblog->execute(array($_GET['blog']));

// Just security
if ($resultblog->rowCount() ==1) {
  $resultblog = $resultblog->fetch();
  $title = $resultblog['title'];
  $pseudo = $resultblog['pseudo'];
  $message = $resultblog['message'];
}
?>

<!doctype html>
<html class="no-js" lang="fr">
<head>
  <title><?php echo $title ?> | Commentaire</title>
  <?php include('doctype.php'); ?>

  <?php
    // zone of the blog
       echo "<div class='col-6 mx-auto blogcreate mt-2'>
         <div class='col-12 titlecom'>
           <h1>"; echo $title; echo "</h1>
           <p>test</p>
         </div>
         <div class='col-12 row'>
           <div class='col-12 name m-0'>
             <h2>"; echo $pseudo; echo "</h2>
           </div>
           <div class='col-12 pl-4 pt-2'>
             <p>"; echo $message; echo "</p>
           </div>
         </div>
       </div>";


      echo "<p class='w-100 text-center pt-5'>Zone commentaire:</p>";
      // prepare select for take commentary
    $resultcom = $bdd->prepare('SELECT * FROM commentaire WHERE id_blog=? ORDER BY id DESC LIMIT 5');
    $resultcom->execute(array($_GET['blog']));

    // fetchall for take ALL the table
    $resultcom = $resultcom->fetchAll();

    // foreach for see all commentary
    foreach ($resultcom as $key => $value) {
     echo "<div class='col-6 mx-auto blogcreate mt-2'>
       <div class='col-12 row'>
         <div class='col-12 name m-0'>
           <h2>" . $value['nicknamecom'] . "</h2>
         </div>
         <div class='col-12 pl-4 pt-2'>
           <p>" . $value['messagecom'] . "</p>
         </div>
       </div>
     </div>";
   }

    // add some commentary
     echo '<form class="col-6 mx-auto m-0 p-0 pt-2 text-right" action="verifcom.php?blog=' . $_GET['blog'] . '" method="post">
     <input class="col-12" type="text" name="nickname" placeholder="Pseudo:">
     <textarea class="col-12" name="commentary" rows="4" cols="80"></textarea>
     <input type="submit" name="" value="Envoyer">
     </form>';
  ?>

<?php include('script.php') ?>
