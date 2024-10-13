<?php
include('header.php');
include('conn.php');
if (!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] !== true) {
    echo"<script>window.open('index.php', '_parent')</script>";
    exit;
  }

    $id = $_GET['ID'];
    
    $sql = "SELECT * FROM mecze WHERE ID = $id";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $team1 = $row['Team1'];
        $team2 = $row['Team2'];
        $gole1 = $row['Gole1'];
        $gole2 = $row['Gole2'];
        $liga = $row['Liga'];
        $data = $row['Data'];
    } else {
        echo "Brak danych do wyświetlenia.";
        exit;
    }


if(isset($_POST['submit'])) {
    $team1 = $_POST['team1'];
    $team2 = $_POST['team2'];
    $gole1 = $_POST['gole1'];
    $gole2 = $_POST['gole2'];
    $liga = $_POST['liga'];
    $data = $_POST['data'];
    

    $sql = "UPDATE mecze SET Team1='$team1', Team2='$team2', Gole1='$gole1', Gole2='$gole2', Liga='$liga', Data='$data' WHERE ID = $id";
    if(mysqli_query($conn, $sql)) {
        echo "Mecz został zaktualizowany.";
    } else {
        echo "Wystąpił błąd";
    }
}

?>

<style>
    body{
        text-align: center;
    }
</style>
    <h1>Zmień Mecz Mecz</h1>
    <form method="POST">
<div class="formecze">

        <input type="text" name="team1" value="<?php echo $team1; ?>" placeholder="Drużyna 1" required> - 
        <input type="text" name="team2" value="<?php echo $team2; ?>" placeholder="Drużyna 2" required>



        </div><br>
        <div class="formecze">
        <input type="number"name="gole1" value="<?php echo $gole1; ?>" placeholder="Liczba goli Drużyny 1"> - 
        <input type="number" name="gole2" value="<?php echo $gole2; ?>" placeholder="Liczba goli Drużyny 2">
        </div>
        <br><br>
        <div class="formecze">
        <label>Liga:</label>
        <input type="text" name="liga" value="<?php echo $liga; ?>" placeholder="Liga" required>
        <br>
        <label>Data:</label>
        <input type="date" name="data" value="<?php echo $data; ?>"><br>
        <input class="btn btn-primary" type="submit" name="submit" value="Zaktualizuj Mecz">
    </form>
    </body>
<script src="script.js"></script>