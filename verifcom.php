<?php include('config.php'); ?>

<?php
$nickname = addslashes(strip_tags($_POST["nickname"]));
$msg = addslashes(strip_tags($_POST["commentary"]));
$idblog = $_GET['blog'];

  $resultcom = $bdd->exec("INSERT INTO commentaire (nicknamecom, messagecom, id_blog) VALUES ('$nickname', '$msg', '$idblog')");
  header('location: viewcom.php?blog=' . $idblog . '');
?>
