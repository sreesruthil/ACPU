<?php
$sessError='';
	ob_start();
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		$sessError='a';
		die("Please sign in");
		exit;
	}
	//if session was not set for acpu this will mark an error
	if(!isset($_SESSION['web_pg_nam'])){
		unset($_SESSION['user']);
		session_unset();
		session_destroy();
		$sessError='a';
		die("Please sign in");
		exit;
	} else if ($_SESSION['web_pg_nam']!='acpu'){
		//this ensures that session is for acpu
		unset($_SESSION['user']);
		unset($_SESSION['web_pg_nam']);
		session_unset();
		session_destroy();
		$sessError='a';
		die("Please sign in");
		exit;
	}
	// if session timed out this will mark an error
	if (!isset($_SESSION['created'])) {
		unset($_SESSION['user']);
		unset($_SESSION['web_pg_nam']);
		session_unset();
		session_destroy();
		$sessError='a';
		die("Please sign in");
		exit;
	} else if (time() - $_SESSION['created'] > 1500) {
		// session started more than 30 minutes ago
		unset($_SESSION['user']);
		unset($_SESSION['web_pg_nam']);
		session_unset();
		session_destroy();
		die("Your session has expired");
		$sessError='a';
		exit;
	} else if (time() - $_SESSION['created'] > 900) {
		// session started more than 15 minutes ago
		session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
		$_SESSION['created'] = time();  // update creation time
	}
echo $sessError;
if($sessError==''){
require_once('../dbconfig.php');
$sql = "SELECT * FROM event_cal order by e_id desc, ul_ind asc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	echo "<h3 onclick=\"swaphid();\">Details of Event Calender</h3><table><tr>
	<td><b>ID</b></td><td><b>e_id</b></td><td>|</td><td><b>ul_ind</b></td><td>|</td><td><b>ul_F_L</b></td><td>|</td><td><b>e_time</b></td><td>|</td>
	<td><b>e_name</b></td><td>|</td><td><b>e_head</b></td><td>|</td><td><b>img_nam</b></td><td>|</td><td><b>imtype</b></td><td>|</td><td><b>e_flot</b></td><td>|</td>
	<td><b>e_pad</b></td><td>|</td><td><b>e_li1</b></td><td>|</td><td><b>e_li2</b></td><td>|</td><td><b>e_li3</b></td><td>|</td><td><b>e_li4</b></td></tr>";
    while($row = $result->fetch_assoc()) {
		echo "<tr onclick=\"changeentry(this.getElementsByTagName('td'),'form91');\">
		<td>" . $row["ID"] ."</td><td>". $row["e_id"] . "</td><td>|</td><td>" . $row["ul_ind"] . "</td><td>|</td><td>" . $row["ul_F_L"] . "</td><td>|</td>
		<td>" . $row["e_time"] . "</td><td>|</td><td>". $row["e_name"] . "</td><td>|</td><td>" . $row["e_head"] . "</td><td>|</td><td>". $row["img_nam"] . "</td><td>|</td>
		<td>" . $row["imtype"] . "</td><td>|</td><td>" . $row["e_flot"] . "</td><td>|</td><td>" . $row["e_pad"] . "</td><td>|</td><td>". $row["e_li1"] . "</td><td>|</td>
		<td>" . $row["e_li2"] . "</td><td>|</td><td>" . $row["e_li3"] . "</td><td>|</td><td>" . $row["e_li4"] . "</td></tr>";
		}echo "</tbody></table>";
} else {
    echo "0 results";
}
$conn->close();
}
ob_end_flush();
?>