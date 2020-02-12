<?php
$sql = "SELECT * FROM home_link_down where page_select='".$pg_select."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<div class=\"verticalNav\">
      <ul>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<li><a href=\"".$row["link"]."\">".$row["title"]."</a></li>";
		}
		echo "</ul></div>";
}
?>