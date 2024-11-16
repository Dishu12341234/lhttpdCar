<?php
session_start();
require 'connector.php';
include "nav.html";
echo '<link rel="stylesheet" href="/style.css">';
echo $_SESSION['Status'] ?? 'No status set';
if (($_SESSION['Status'] ?? 'CUSR') != 'ADMIN') {
    // header('Location: login.php');
    die('Cannot proceed with a non-admin account');
}

echo '<link rel="stylesheet" href="/admin.css">';

$CUID = $_SESSION["CUID"];

$sql = "SELECT * FROM Logs ORDER BY TID DESC";

$res = $conn->query($sql);

echo "<div class='content'>";
echo "<table>";
echo "<tbody>";

// Fetch the first row for the table header
if ($row = $res->fetch_assoc()) {
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>";
        echo $key;
        echo "</th>";
    }
    echo "</tr>";

    // Now fetch all rows to display the data
    do {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if ($key == "Alcohol" || $key == "Sleeping") {
                echo "<td class='activeHigh'>";
                echo $value;
                echo "</td>";
            } else if ($key == "HoldingWheel") {
                echo "<td class='activeLow'>";
                echo $value;
                echo "</td>";
            } else {
                echo "<td>";
                echo $value;
                echo "</td>";

            }
        }
        echo "</tr>";
    } while ($row = $res->fetch_assoc());
}

echo "</tbody>";
echo "</table>";
echo "</div>";

echo "<tr>";
echo "</tbody>";
echo "<table>";
echo "</div>";

?>


<script>
	let activeLows = document.getElementsByClassName("activeLow")
	for (e of activeLows) {
		
		if(e.innerText === "0")
		{
			e.style.background = "#ffaaaa"
			
		}
		else
		{
			e.style.background = "#aaffaa"

		}
	}
	
	let activeHighs = document.getElementsByClassName("activeHigh")
	for (e of activeHighs) {
		
		if(e.innerText === "1")
		{
			e.style.background = "#ffaaaa"
			
		}
		else
		{
			e.style.background = "#aaffaa"

		}
	}

</script>
