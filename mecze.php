<?php include('header.php');?>
<style>
body{
    text-align: center;
}
table, td, th{
    margin: 0 auto;
}
td, th{
    padding: 10px;
}
</style>
<table>
  <tr>
    <th>Liga</th>
    <th>Drużyna 1</th>
    <th>Wynik</th>
    <th>Drużyna 2</th>
    <th>Data</th>
  </tr>
<tr>

<?php
include('conn.php');

$sql = "SELECT * FROM Mecze ORDER BY data DESC"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    echo '<td><a href="liga.php?liga='.$row["Liga"].'">'.$row["Liga"].'</a></td>'.'<td><a href="klub.php?klub='.$row["Team1"].'">'.$row["Team1"].'</a></td>' .'<td>'.$row["Gole1"]. ' - '. $row["Gole2"] .'</td>' .'<td><a href="klub.php?klub='.$row["Team2"].'">'.$row["Team2"].'</a></td>'. '<td>'.$row["Data"].'</td>' . "</tr>";
    }
} else {
    echo "Brak danych do wyświetlenia.";
}

?>

</table>
</body>
<script src="script.js"></script>