<?php include('config.php'); ?>
<!doctype html>
<html class="no-js" lang="fr">
<head>
  <title>Ajout de commentaire</title>
  <?php include('doctype.php'); ?>

  <form class="" action="verif.php" method="post">
    <label for="titletext">Titre:</label>
    <input id="titletext" type="text" name="title" value=""><br>
    <label for="nickname">Pseudo:</label>
    <input id="nickname" type="text" name="pseudo" value=""><br>
    <label for="addmss">Message:</label>
    <textarea id="addmss" name="message" rows="2" cols="47"></textarea>
    <input type="submit" name="" value="Envoyer">
  </form>


<?php include('script.php') ?>
