<?php
require_once('dbconfig.php');
$sql = "SELECT * FROM act_box";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	$box_ind = 1;
	echo"<div class=\"row\">";
	while($row = $result->fetch_assoc()) {
		echo "<div class=\"column\">
				<div class=\"content\">
					<img src=\"Images/".$row["img_nam"].".".$row["imtype"]."\" alt=\"".$row["im_alt"]."\" style=\"width:100%\">
					<a href=\"".$row["a_href"]."\"><h3 class=\"activities_h3\">".$row["title"]."</h3></a>
					<p class=\"activities_p\">".$row["para"]."&nbsp;<a class=\"activity_links\" href=\"".$row["a_href"]."\">".$row["a_name"]."</a></p>
				</div>
			</div>";
		$box_ind++;
		if($box_ind==5){
			$box_ind = 1;
			echo "</div>
			<div class=\"row\">";
		};
	}
echo"</div>";
} else {
    echo "0 results";
}
?>