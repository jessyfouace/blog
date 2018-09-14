<?php
 try
 {
   // Host = you'r host for me it's localhost         dbname = name of you'r bdd          root = you'r id for you'r sql     and on ''  it's you'r password
 	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
 }
 catch(Exception $e)
 {
         die('Erreur : '.$e->getMessage());
 }
?>
