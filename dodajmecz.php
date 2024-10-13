<?php include('header.php');
include('conn.php');
if (!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] !== true) {
    echo"<script>window.open('index.php', '_parent')</script>";
    exit;
  }
?>

<style>
    body{
        text-align: center;
    }
</style>
    <h1>Dodaj Mecz</h1>
    <form method="POST">
    Podaj nazwy drużyn (Pamiętaj, że drużyna grająca u siebie jest pierwsza)
<div class="formecze">

        <input type="text" list="teamy" name="team1" placeholder="Drużyna 1" required> - 
        <input type="text" list="teamy" name="team2" placeholder="Drużyna 2" required>
        <datalist id="teamy">
            <?php 
            $sql = "SELECT DISTINCT Team1 FROM `mecze` ORDER BY Team1 ASC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option>'.$row["Team1"].'</option>';
                }
            }
            
            ?>
        </datalist>

        </div>
        Podaj bilans bramkowy (zostaw puste, jeśli mecz się jeszcze nie odbył)<br>
        <div class="formecze">
        <input type="number"name="gole1" placeholder="Liczba goli Drużyny 1"> - 
        <input type="number" name="gole2" placeholder="Liczba goli Drużyny 2">
        </div>
        <br><br>
        <div class="formecze">
        <label>Liga:</label>
        <input type="text" list="liga" name="liga" placeholder="Liga" required>
        <datalist id="liga">
            <?php 
            $sql = "SELECT DISTINCT liga FROM Mecze ORDER BY liga ASC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option>'.$row["liga"].'</option>';
                }
            }
            
            ?>
        </datalist><br>
        <label>Data meczu:</label>
        <input type="date" id="data" name="data" required><br><br>
        <input class="btn btn-primary" type="submit" value="Dodaj"><br><br>
    </form>

    <?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $team1 = $_POST["team1"];
    $team2 = $_POST["team2"];
    $gole1 = $_POST["gole1"];
    $gole2 = $_POST["gole2"];
    $liga = $_POST["liga"];
    $data = $_POST["data"];
    
if($gole1 == null){
    $gole1="null";
}
    
if($gole2 == null){
    $gole2="null";
}
  
    $sql = "INSERT INTO `mecze` (`Team1`, `Team2`, `Gole1`, `Gole2`, `Liga`, `Data`) VALUES ('$team1', '$team2', $gole1, $gole2, '$liga', '$data')";

    if ($conn->query($sql) === TRUE) {
        echo '<span class="badge badge-success">Mecz został dodany pomyślnie.</span>';
    } else {
        echo '<span class="badge badge-danger">Błąd podczas dodawania meczu</span>';
    }
}
?>
</body>
<script src="script.js"></script>
</html>
