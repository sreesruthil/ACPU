<?php
require_once('dbconfig.php');
$sql = "SELECT * FROM upper_info where keyword='".$keyword_info."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		if($keyword_info=='homeinfo'){echo "<div id=\"homeinfo\"><h2>".$row["heading"]."</h2><br><p class=\"homeinfo\">".$row["para"]."<a href=\"".$row["a_href"]."\">".$row["a_name"]."</a></p></div>";}
		else if($keyword_info=='contactinfo'){echo "<h3>".$row["heading"]."</h3><h4>".$row["para"]."</h4>";}
		else {echo "<br><h2 style=\"color:#FFF\">".$row["heading"]."</h2><p class=\"".$row["para_class"]."\">".$row["para"]."</p>";};
	}
}
?>