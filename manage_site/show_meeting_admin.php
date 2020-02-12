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
$sql = "SELECT * FROM meetings_futur";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<h3 onclick=\"swaphid();\">Details of upcoming meetings</h3><table><tr><td><b>ID</b></td><td><b>img_nam</b></td><td>|</td><td><b>imtype</b></td><td>|</td><td><b>a_href</b></td><td>|</td><td><b>a_name</b></td><td>|</td><td><b>categry</b></td></tr>";
    while($row = $result->fetch_assoc()) {
		echo "<tr onclick=\"changeentry(this.getElementsByTagName('td'),'form6');\"><td>" . $row["ID"] ."</td><td>". $row["img_nam"] . "</td><td>|</td><td>" . $row["imtype"] . "</td><td>|</td><td>" . $row["a_href"] . "</td><td>|</td><td>" . $row["a_name"] . "</td><td>|</td><td>" . $row["categry"] . "</td></tr>";
		}echo "</tbody></table>";
} else {
    echo "0 results";
}
$conn->close();
}
ob_end_flush();
?>