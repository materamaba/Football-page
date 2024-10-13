<?php include('header.php');?>

<center>
<h1>Wszystkie Ligi</h1>

<div style="width:25%; text-align:left;">
<ul>



    <?php
include('conn.php');



$sql = "SELECT DISTINCT liga FROM Mecze ORDER BY liga ASC";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<li><a href="liga.php?liga='.$row["liga"].'">'.$row["liga"].'</a></li>';
    }
} else {
    echo "Brak danych do wyświetlenia.";
}


?>
</ul>
</div></center>
</body>
<script src="script.js"></script>