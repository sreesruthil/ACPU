<?php
$sessError='';
	ob_start();
	session_start();
	// if session is not set this will mark an error
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
// Return a value to insert to db
function db_prepare_input($string) {
    return trim(addslashes($string));
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
  if (empty($_POST["XID"])) {
    die("Enable to perform the action1");
	exit;
  } else {
    $xid = test_input($_POST["XID"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[1-9][0-9]*$/",$xid)) {
    die("Enable to perform the action2");
	exit;
    }
  }
if($xid == 2 || $xid == 3) {
  if (empty($_POST["ID"])) {
    die("Enter ID");
	exit;
  } else {
    $ID = test_input($_POST["ID"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[1-9][0-9]*$/",$ID)) {
    die("Only number allowed for ID");
	exit;
    }
  }
};
if($xid == 1 || $xid == 2) {
  if (empty($_POST["title"])) {
	die("title is required");
	exit;
  } else {
    $title = test_input($_POST["title"]);
    // check if title name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9:\, ]*$/",$title)) {
		die("Only letters, numbers,comma, colon and white space allowed for title");
		exit;
	}
  }
  if (empty($_POST["home_info"])) {
	die("home_info is required");
	exit;
  } else {
    $home_info = test_input($_POST["home_info"]);
    // check if home_info only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z_0-9]*$/",$home_info)) {
		die("Only letters and underscore allowed for home_info"); 
		exit;
    }
  }
  if (empty($_POST["down_link"])) {
	  $down_link ="";
  } else {
    $down_link = test_input($_POST["down_link"]);
    // check if down_link only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9_?.=]*$/",$down_link)) {
		die("Only letters, numbers,'? . , =' allowed for down_link"); 
		exit;
    }
  }
  if (empty($_POST["right_content"])) {
	die("right_content is required");
	exit;
  } else {
    $right_content = test_input($_POST["right_content"]);
    // check if right_content only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z_0-9]*$/",$right_content)) {
		die("Only letters and underscore allowed for right_content"); 
		exit;
    }
  }
};
require_once('../dbconfig.php');
$dbtable = "base_page";
if($xid == 1) {
	$sql = "INSERT INTO ".$dbtable." (title, home_info, down_link, right_content) VALUES ('".$title."', '".$home_info."', '".$down_link."', '".$right_content."');";
};
if($xid == 2) {
	$sql = "UPDATE ".$dbtable." SET title='" .$title."', home_info='".$home_info."', down_link='".$down_link."', right_content='".$right_content."' WHERE ID='".$ID."';";
};
if($xid == 3) {
	$sql = "DELETE from ".$dbtable." WHERE ID='".$ID."';";
};
if ($conn->multi_query($sql) === TRUE) {
    echo "successfull".$xid;
} else {
    echo "Failed, please try again" . $sql . "<br>" . $conn->error;
};
$conn->close();
}
}
ob_end_flush();
?>