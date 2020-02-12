<?php
require_once('dbconfig.php');
$sql = "SELECT * FROM contact_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo $row["up_box"];
		}
}
?>