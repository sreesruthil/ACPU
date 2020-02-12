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
	require_once('../dbconfig.php');
	$sql = "SELECT ISDEFAULT FROM users WHERE USERID='".$_SESSION['user']."';";
	$result = $conn->query($sql);
	$count = $result->num_rows; // if uname/pass correct it returns must be 1 row
	if($count == 1){
		$row = $result->fetch_assoc();
		if(!$row['ISDEFAULT']=='T'){
			die("You don't have the permission to make changes in Admin details");
			exit;
		};
	};
//PHP Validation starts here
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
if($xid == 2) {
if (empty($_POST["USERMAIL"])) {
    $die("USERMAIL is required");
	exit;
  } else {
    $USERMAIL = test_input($_POST["USERMAIL"]);
    // check if e-mail address is well-formed
    if (!filter_var($USERMAIL, FILTER_VALIDATE_EMAIL)) {
      die("Invalid USERMAIL format");
	  exit;
    }
  }
  if (empty($_POST["ISDEFAULT"])) {
    $ISDEFAULT = "";
  } else {
    $ISDEFAULT = test_input($_POST["ISDEFAULT"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]*$/",$ISDEFAULT)) {
    die("Only letters allowed for ISDEFAULT");
	exit;
    }
  }
  if (empty($_POST["active"])) {
    $active = "";
  } else {
    $active = test_input($_POST["active"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$active)) {
    die("Only number allowed for active");
	exit;
    }
  }//PHP Validation ends here
};
$dbtable = "users";
if($xid == 2) {
	$sql = "UPDATE ".$dbtable." SET ISDEFAULT='".$ISDEFAULT."', active='".$active."' WHERE USERMAIL='".$USERMAIL."' and ID='".$ID."';";
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