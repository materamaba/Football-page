<?php
session_start();

error_reporting(0);

echo '
<!DOCTYPE html>
<html lang="pl">
<head>
<link rel="icon" href="https://www.pngkit.com/png/full/292-2928062_football-icon-png-white.png">
    <meta charset="utf-8" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Pilka nozna</title>
</head>';
echo '<header>
<a id="ahead" href="index.php">
<img src="https://www.pngkit.com/png/full/292-2928062_football-icon-png-white.png" alt="logo" />
<h1>Pilka Nożna</h1><br>
<span class="copy">&copy; Mateusz Koziarski 5L</span>
</a>';

if ($_SESSION['zalogowany'] == true) {
    echo '<div class = "witaj" style="color: white;"> Witaj ', $_SESSION['kto'], '!<br>';
    echo '<a href="wyloguj.php">Wyloguj się</a></div>';
} else {
    echo '
    <a class="btn btn-primary witaj" href="login.php" role="button">Zaloguj się</a>
    ';
}

echo '</header>
<body>
<div id="guzik">
<button type="button" class="btn btn-dark theme" onclick="Ciemne()">Dark</button>
</div>
';
?>


