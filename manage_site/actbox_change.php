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
  if (empty($_POST["title"])) {
	die("title is required");
	exit;
  } else {
    $title = test_input($_POST["title"]);
    // check if title name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9\,: ]*$/",$title)) {
		die("Only letters,', :' , numbers and white space allowed for title");
		exit;
	}
  }
  if (!empty($_POST["para"])) {
  $para = db_prepare_input($_POST["para"]);
    // preparing para for db
  } else {
	$para="";
  }
  if (empty($_POST["img_nam"])) {
	$img_nam = "";
  } else {
    $img_nam = test_input($_POST["img_nam"]);
    // check if img_nam only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$img_nam)) {
		die("Only letters, numbers, underscore and allowed for img_nam"); 
		exit;
    }
  }
  if (empty($_POST["imtype"])) {
	$imtype = "";
  } else {
    $imtype = test_input($_POST["imtype"]);
    // check if imtype only contains letters and dot
    if (!preg_match("/^[a-zA-Z]*$/",$imtype)) {
		die("Only letters allowed for imtype"); 
		exit;
    }
  }
  if (empty($_POST["im_alt"])) {
	$im_alt = "";
  } else {
    $im_alt = test_input($_POST["im_alt"]);
    // check if im_alt only contains letters and dot
    if (!preg_match("/^[a-zA-Z0-9.? ]*$/",$im_alt)) {
		die("Only letters, numbers and white space allowed for im_alt"); 
		exit;
    }
  }
  if (empty($_POST["a_href"])) {
	$a_href = "";
  } else {
    $a_href = test_input($_POST["a_href"]);
    // check if a_href only contains letters and dot
    if (!preg_match("/^[a-zA-Z0-9_=?.]*$/",$a_href)) {
		die("Only letters, numbers, '_ ? = .' allowed for a_href"); 
		exit;
    }
  }
  if (empty($_POST["a_name"])) {
	$a_name = "";
  } else {
    $a_name = test_input($_POST["a_name"]);
    // check if a_name only contains letters and dot
    if (!preg_match("/^[a-zA-Z0-9&; ]*$/",$a_name)) {
		die("Only letters, numbers and white space allowed for a_name"); 
		exit;
    }
  }
};
require_once('../dbconfig.php');
$dbtable = "act_box";
if($xid == 1) {
	$sql = "INSERT INTO ".$dbtable." (title, para, img_nam, imtype, im_alt, a_href, a_name) VALUES ('".$title."', '".$para."', '".$img_nam."',
	'".$imtype."', '".$im_alt."', '".$a_href."', '".$a_name."');";
};
if($xid == 2) {
	$sql = "UPDATE ".$dbtable." SET title='" .$title."', para='".$para."', img_nam='".$img_nam."',
	imtype='".$imtype."', im_alt='".$im_alt."', a_href='".$a_href."', a_name='".$a_name."' WHERE ID='".$ID."';";
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