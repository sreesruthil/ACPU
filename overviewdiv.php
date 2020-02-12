<?php
require_once('dbconfig.php');
$sql = "SELECT * FROM overview";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo"<h1 class=\"accordion-style\">Overview</h1>
	<ul class=\"accordion-style\">";
	while($row = $result->fetch_assoc()) {
		echo "<li class=\"accordion-style\">
			<input type=\"checkbox\" checked>
			<i></i>
			<h2 class=\"accordion-style\">".$row["title"]."</h2><p class=\"accordion-style\">";
			if(!empty($row["img_nam"])) {
				echo "<img src=\"Images/".$row["img_nam"].".".$row["imtype"]."\" width=\200\" height=\"150\" style=\"float: ".$row["float_pos"]."; padding:10px;\">";
			};
			echo $row["para"]."</p></li>";
	}
	echo"</ul>";
} else {
    echo "0 results";
}
?>