<?php
require_once('dbconfig.php');
$sql = "SELECT * FROM right_cntnt WHERE rgt_cnt_ind = '".$rgt_cnt_info."' ORDER BY rgt_cnt_ord ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		if(!empty($row["title_h1"])){echo "<h1 class=\"head_activities\">".$row["title_h1"]."</h1>";};
		if(!empty($row["title_h3"])){echo "<h3 class=\"body_activites\">".$row["title_h3"]."</h3>";};
		if(!empty($row["para"])){
			echo "<p class=\"activities_intro\">";
			if(!empty($row["Img_nam"])){
				echo "<img src=\"Images/".$row["Img_nam"].".".$row["Imtype"]."\" width=\"250\" height=\"160\" style=\"float: ".$row["float_pos"].";padding:10px;\">";
			};
			echo $row["para"]."</p>";
		};
	}
}
?>