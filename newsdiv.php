<?php
require_once('dbconfig.php');
$sql = "SELECT * FROM site_news";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo"<div class=\"newsticker\" style=\"position: relative; height: 40px; overflow: hidden;\"><!---==============News Ticker begins===-->
		<ul style=\"margin: 0px; position: absolute; top: 0px;\">";
    while($row = $result->fetch_assoc()) {
		echo "<li style=\"margin: 0px;\"><a style=\"color: black; text-decoration:none\" href=\"".$row["link"]."\">".$row["news"]."</a></li>";
		}
		echo "</ul></div>";
} else {
    echo "0 results";
}
?>