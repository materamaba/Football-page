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

<form method="POST">
    <h1 style="text-align:center;">Zarejestruj się do serwisu!</h1>
    <fieldset>

        <div class="form-floating mb-3">
          <label for="floatingInput">Login</label>
            <input type="text" class="form-control" id="floatingInput" name="login" required>
            
        </div>
        <div class="form-floating">
        <label for="floatingPassword">Hasło</label>
            <input type="password" class="form-control" id="floatingPassword" name="haslo" required>
			</div>
        <div class="form-floating">
        <label for="floatingPassword">Powtórz hasło</label>
            <input type="password" class="form-control" id="floatingPassword" name="powtorz_haslo" required>

        </div><br>
        <div style="display:flex; justify-content:center;">
            <div class="col-auto">
                <input type="submit" name="submit" value="Zarejestruj się" class="btn btn-primary mb-3">
            </div>
        </div>
        <div style="text-align:center;">
    </fieldset>
</form>
<?php
	if (isset($_POST['submit'])) {
		$nick = $_POST['login'];
		$haslo = $_POST['haslo'];
		$powtorz_haslo = $_POST['powtorz_haslo'];
		
	
        if ($haslo !== $powtorz_haslo) {
            echo '<span class="badge badge-danger">Hasła nie są takie same</span>';
        } else {
            $sql = "SELECT * FROM `konta` WHERE `nick` = '$nick'";
            $spr = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($spr) > 0) {
                echo '<span class="badge badge-danger">Ta nazwa użytkownika jest już zajęta</span>.';
            } else {
                $sql = "INSERT INTO `konta` (`nick`, `haslo`) VALUES ('$nick', '$haslo')";
                $wynik = mysqli_query($conn, $sql);
    
                if ($wynik) {
                    $_SESSION['register'] = '<span class="badge badge-success">Utworzono konto. Teraz możesz się zalogować!</span>';
                    header('Location: login.php');}
            }
        }
}
?>
</body>
<script src="script.js"></script>