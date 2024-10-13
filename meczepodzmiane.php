<?php include('header.php');
if (!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] !== true) {
    echo"<script>window.open('index.php', '_parent')</script>";
    exit;
  }
?>
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
    <th></th>
  </tr>
<tr>

<?php
include('conn.php');

$sql = "SELECT * FROM Mecze ORDER BY data ASC"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<td>'.$row["Liga"].'</td>' . '<td>'.$row["Team1"].'</td>' .'<td>'.$row["Gole1"]. ' - '. $row["Gole2"] .'</td>' .'<td>'.$row["Team2"].'</td>'. '<td>'.$row["Data"].'</td> <td><a href="zmienmecz.php?ID='. $row['ID'].'">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg>'.
        "</tr>";
    }
} else {
    echo "Brak danych do wyświetlenia.";
}

?>

</table>
</body>
<script src="script.js"></script>