<?php
$sessError='';
	ob_start();
	session_start();
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
    die("Unable to perform the action1");
	exit;
  } else {
    $xid = test_input($_POST["XID"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[1-9][0-9]*$/",$xid)) {
    die("Unable to perform the action2");
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
  if (empty($_POST["imgname"])) {
	die("imgname is required");
	exit;
  } else {
    $imgname = test_input($_POST["imgname"]);
    // check if imgname name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$imgname)) {
		die("Only letters, under score allowed for imgname");
		exit;
	}
  }
  if (empty($_POST["imtype"])) {
	die("imtype is required");
	exit;
  } else {
    $imtype = test_input($_POST["imtype"]);
    // check if imtype only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]*$/",$imtype)) {
		die("Only letters allowed for imtype"); 
		exit;
    }
  }
  if (empty($_POST["descrip"])) {
	$descrip = "";
  } else {
    $descrip = test_input($_POST["descrip"]);
    // check if descrip only contains letters and dot
    if (!preg_match("/^[a-zA-Z0-9.?:\, ]*$/",$descrip)) {
		die("Only letters, numbers, comma, period, colon and white space and dot allowed for descrip"); 
		exit;
    }
  }
  if (empty($_POST["descrcontent"])) {
	$descrcontent = "";
	exit;
  } else {
    $descrcontent = test_input($_POST["descrcontent"]);
    // check if descrcontent only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9.\,:? ]*$/",$descrcontent)) {
		die("Only letters, numbers, comma, period, colon and white space and dot allowed for descrcontent"); 
		exit;
    }
  }
  if (empty($_POST["link"])) {
	$link = "";
  } else {
    $link = test_input($_POST["link"]);
    // check if link only contains letters and dot
    if (!preg_match("/^[a-zA-Z_0-9.?=]*$/",$link)) {
		die("Only letters, numbers, '? = ', underscore and dot allowed for link"); 
		exit;
    }
  }
};
require_once('../dbconfig.php');
$dbtable = 'site_imslid';
if($xid == 1) {
	$sql = "INSERT INTO ".$dbtable." (imgname, type, descrip, descrcontent, link) VALUES ('".$imgname."', '".$imtype."', '".$descrip."', '".$descrcontent."', '".$link."');";	
};
if($xid == 2) {
	$sql = "UPDATE ".$dbtable." SET imgname='" .$imgname."', type='".$imtype."', descrip='".$descrip."', descrcontent='".$descrcontent."', link='".$link."' WHERE ID='".$ID."';";
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