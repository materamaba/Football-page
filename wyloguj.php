<?php
session_start();
$_SESSION['zalogowany'] = '';
  header('Location: index.php');
  exit;
?>