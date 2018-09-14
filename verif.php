<?php include('config.php'); ?>

<?php
$title = addslashes(strip_tags($_POST["title"]));
$pseudo = addslashes(strip_tags($_POST["pseudo"]));
$message = addslashes(strip_tags($_POST["message"]));

if ($title !== "" && $pseudo !== "" && $message !== "") {
  $reponse = $bdd->exec("INSERT INTO blogcommentaire (title, pseudo, message) VALUES ('$title', '$pseudo', '$message')");
  header('location: index.php');
}
?>
