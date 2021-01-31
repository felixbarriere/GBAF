<?php
// On appelle la session
session_start();
// On écrase le tableau de session
$_SESSION = array();
//on détruit la session
session_destroy();

header('Location: connexion.php');

?>

