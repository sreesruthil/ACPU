<?php
require_once('dbconfig.php');
$sql = "SELECT * FROM site_imslid";
$result = $conn->query($sql);
$imgno = mysqli_num_rows($result);
$imgn = 1;
echo "<div id=\"outslider\"><!--open outslider--><div id=\"pager\">";
echo "</div><!--pager open & close-->
<div id=\"next\"><br></div><!--next open and close-->
<div id=\"previous\"></div><!--prev open and close-->
<div id=\"slider\"><!--complete slider open-->";
	
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<div class=\"slideritems\" style=\"background-color: rgb(255, 255, 255); position: absolute; top: 0px; left: 0px; display: none; z-index: 4; opacity: 0; width: 520px; height: 300px;\">
<h2 class=\"description\">".$row["descrip"]."<br><div id=\"descontent\"><a style=\"text-decoration:none;\" href=\"".$row["link"]."\">".$row["descrcontent"]."</a></div><br></h2>
<img src=\"images/".$row["imgname"].".".$row["type"]."\" width=\"520\" height=\"300\"></div>";
		}
		echo "<!--clossing final slider item-->
				</div>
				<!--closing slider--> 
			</div> ";
} else {
    echo "0 results";
}
?>