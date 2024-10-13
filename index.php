<?php include('header.php');?>

    <div class="main">
        <div class="liga">
        <h2>Najpopularniejsze ligi</h2>
        <h4>Top 5 lig europejskich</h4>
        <ul>
            <li><a href="liga.php?liga=Premier League">Premier League</a></a></li>
            <li><a href="liga.php?liga=Bundesliga">Bundesliga</a></a></li>
            <li><a href="liga.php?liga=Serie A">Serie A</a></li>
            <li><a href="liga.php?liga=Eredivisie">Eredivisie</a></li>
            <li><a href="liga.php?liga=La Liga">La Liga</a></li>
        </ul>
        <h4>Ligi Polskie</h4>
        <ul>
            <li><a href="liga.php?liga=Ekstraklasa">Ekstraklasa</a></li>
            <li><a href="liga.php?liga=Fortuna 1 Liga">Fortuna 1 Liga</a></li>
            <li><a href="liga.php?liga=II Liga">II Liga</a></li>
        </ul>
        <a href="ligi.php">Wsystkie ligi</a>
        </div>

<div class="live">
    <h2>Ostatnie wyniki</h2>
   <?php
 include('conn.php');
$dzis = date("Y-m-d");
echo "Dzisiaj <br><div style='text-align: center;'>";

$sql = "SELECT * FROM Mecze WHERE Data = '$dzis'"; 
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<a href="liga.php?liga='.$row["Liga"].'"><span style="font-size: 10px">'. $row["Liga"].'</span></a> <br>';
        echo  "<a href = 'klub.php?klub=".$row["Team1"] ."'>".$row["Team1"]."</a>". " " . $row["Gole1"] ." - ". $row["Gole2"] . " " . "<a href = 'klub.php?klub=".$row["Team2"] ."'>".$row["Team2"]."</a>"."<br>";
    }
} else {
    echo "Brak meczy";
}
echo '</div><hr width="90%">';


$Jutro = date("Y-m-d", strtotime('+1 days'));
echo "Jutro <br><div style='text-align: center;'>";

$sql = "SELECT * FROM Mecze WHERE Data = '$Jutro'"; 
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<a href="liga.php?liga='.$row["Liga"].'"><span style="font-size: 10px">'. $row["Liga"].'</span></a> <br>';
        echo  "<a href = 'klub.php?klub=".$row["Team1"] ."'>".$row["Team1"]."</a>". " " . $row["Gole1"] ." - ". $row["Gole2"] . " " . "<a href = 'klub.php?klub=".$row["Team2"] ."'>".$row["Team2"]."</a>"."<br>";
    }
} else {
    echo "Brak meczy";
}
echo '</div><hr width="90%">';


   ?>
   <a href="mecze.php">Wszystkie mecze z innych dni</a>
</div>
<div class="kluby">
    <h2>Dodaj do bazy</h2>
    
    <?php

    if($_SESSION['zalogowany'] != null){
        echo 'Jeśli uważasz, że brakuje jakiś meczy, dodaj je tutaj <br>';
        echo '<div class="edycja">
        <a class="btn btn-primary" href="dodajmecz.php" role="button">Dodaj Mecz</a>
        <a class="btn btn-primary" href="meczepodzmiane.php" role="button">Zmień informacje</a></div>';

    }
    else{
    echo'
    Zaloguj się, by dodawać mecze  
    <a href="login.php">zaloguj się</a>';}
    ?>
</div>

</div>
</body>
<script src="script.js"></script>
</html>

