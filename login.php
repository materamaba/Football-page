<?php include('header.php');
include('conn.php');
?>

<style>
body{
    text-align: center;
}
fieldset{
      text-align: left;
    align-items: center;
    margin: 0 auto;
}</style>

<body>
<form method="POST">
    <h1 style="text-align:center;">Zaloguj się do serwisu!</h1>
    <?php
session_start();
if(isset($_SESSION['register'])){
echo $_SESSION['register'];
$_SESSION['register'] = null;}
session_destroy()
?>
    <fieldset>

        <div class="form-floating mb-3">
          <label for="floatingInput">Login</label>
            <input type="text" class="form-control" id="floatingInput" name="login" required>
            
        </div>
        <div class="form-floating">
        <label for="floatingPassword">Hasło</label>
            <input type="password" class="form-control" id="floatingPassword" name="haslo" required>

        </div><br>
        <div style="display:flex; justify-content:center;">
            <div class="col-auto">
                <input type="submit" name="submit" value="Zaloguj się" class="btn btn-primary mb-3">
            </div>
        </div>

    </fieldset>
</form>


<?php
if(isset($_POST['submit'])){
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $sql = "SELECT haslo FROM konta WHERE nick='$login'";

    $wynik = mysqli_query($conn, $sql);
    $wiersz = mysqli_fetch_object($wynik);
    $haslozbazy = $wiersz->haslo;

    if ($haslozbazy == $haslo) {
        session_start();
        $sql = "SELECT * FROM konta WHERE nick='$login'";
        $wynik = mysqli_query($conn, $sql);
        $wiersz = mysqli_fetch_object($wynik);
      
        $_SESSION['kto'] = $login;
        $_SESSION['zalogowany'] = true;
        header('Location: index.php');
    } else {
        echo '<span class="badge badge-pill badge-danger"> Błędny login lub hasło! </span>';
    }
}
?>
<br><a href="rejestracja.php">Jeśli nie masz jeszcze konta, zarejstruj się tutaj!</a>
</body>
<script src="script.js"></script>
</html>
