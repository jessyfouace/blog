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
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
  <link href="/bootstrap4-glyphicons/css/bootstrap-glyphicons.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>

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




  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
