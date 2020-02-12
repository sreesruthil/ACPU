<?php
require_once('dbconfig.php');
$sql = "SELECT * FROM grid_slid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<div class=\"grid-block slide\">
        	<div class=\"caption\" style=\"display: none;\">
            	<h3>".$row["Title"]."</h3>
                <p>".$row["descrip"]."</p>
                <p><a href=\"".$row["link"]."\" class=\"learn-more\">Learn more</a></p>
            </div>
        	<img height=\"160\" width=\"214\" src=\"images/".$row["Imgname"].".".$row["imtype"]."\">
        	<a href=\"".$row["link"]."\" class=\"learn-more\"><h4>".$row["caption"]."</h4></a>
        </div><!--/.grid-block-->";
		}
} else {
    echo "0 results";
}
$conn->close();
?>