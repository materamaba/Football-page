<?php include('header.php');?>


<style>
body{
    text-align: center;
}
table, td, th{
    border: 1px solid white;
    margin: 0 auto;
}
td, th{
    padding: 10px;
}

</style>
<h1><?php echo $_GET["liga"] ?></h1>
<table>
  <tr>
    <th>Drużyna 1</th>
    <th>Wynik</th>
    <th>Drużyna 2</th>
    <th>Data</th>
  </tr>
<tr>
    <?php
include('conn.php');

$liga = $_GET["liga"];


$sql = "SELECT * FROM Mecze WHERE liga = '" . $liga . "'ORDER BY data ASC";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<td><a href="klub.php?klub='.$row["Team1"].'">'.$row["Team1"].'</a></td>' .'<td>'.$row["Gole1"]. ' - '. $row["Gole2"] .'</td>' .'<td><a href="klub.php?klub='.$row["Team2"].'">'.$row["Team2"].'</a></td>'. '<td>'.$row["Data"].'</td>' . "</tr>";
    }
} else {
    echo "Brak danych do wyświetlenia.";
}

?>
</body>
<script src="script.js"></script>