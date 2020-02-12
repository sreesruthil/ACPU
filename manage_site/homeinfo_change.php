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
  if (empty($_POST["heading"])) {
	die("heading is required");
	exit;
  } else {
    $heading = test_input($_POST["heading"]);
    // check if heading name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z!:.0-9 ]*$/",$heading)) {
		die("Only letters, exclamation, colon, dot and white space allowed for heading");
		exit;
	}
  }
  if (empty($_POST["head_id"])) {
	$head_id = "";
  } else {
    $head_id = test_input($_POST["head_id"]);
    // check if head_id only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z_]*$/",$head_id)) {
		die("Only letters and underscore allowed for head_id"); 
		exit;
    }
  }
  if (empty($_POST["head_class"])) {
	$head_class = "";
  } else {
    $head_class = test_input($_POST["head_class"]);
    // check if head_class only contains letters and dot
    if (!preg_match("/^[a-zA-Z_]*$/",$head_class)) {
		die("Only letters and underscore allowed for head_class"); 
		exit;
    }
  }
  if (!empty($_POST["para"])) {
  $para = db_prepare_input($_POST["para"]);
    // preparing para for db
  } else {
	$para="";
  }
  if (empty($_POST["para_id"])) {
	$para_id = "";
  } else {
    $para_id = test_input($_POST["para_id"]);
    // check if para_id only contains letters and dot
    if (!preg_match("/^[a-zA-Z_]*$/",$para_id)) {
		die("Only letters and underscore allowed for para_id"); 
		exit;
    }
  }
  if (empty($_POST["para_class"])) {
	$para_class = "";
  } else {
    $para_class = test_input($_POST["para_class"]);
    // check if para_class only contains letters and dot
    if (!preg_match("/^[a-zA-Z_]*$/",$para_class)) {
		die("Only letters and underscore allowed for para_class"); 
		exit;
    }
  }
  if (empty($_POST["a_href"])) {
	$a_href = "";
  } else {
    $a_href = test_input($_POST["a_href"]);
    // check if a_href only contains letters and dot
    if (!preg_match("/^[a-zA-Z_]*$/",$a_href)) {
		die("Only letters and underscore allowed for a_href"); 
		exit;
    }
  }
  if (empty($_POST["a_name"])) {
	$a_name = "";
  } else {
    $a_name = test_input($_POST["a_name"]);
    // check if a_name only contains letters and dot
    if (!preg_match("/^[a-zA-Z\;\& ]*$/",$a_name)) {
		die("Only letters, semicolon, white space and ampasend allowed for a_name"); 
		exit;
    }
  }
  if (empty($_POST["keyword"])) {
	$keyword = "";
  } else {
    $keyword = test_input($_POST["keyword"]);
    // check if keyword only contains letters and dot
    if (!preg_match("/^[a-zA-Z_0-9]*$/",$keyword)) {
		die("Only letters and underscore allowed for keyword"); 
		exit;
    }
  }
};
require_once('../dbconfig.php');
$dbtable = "upper_info";
if($xid == 1) {
	$sql = "INSERT INTO ".$dbtable." (heading, head_id, head_class, para, para_id, para_class, a_href, a_name, keyword) VALUES ('".$heading."', '".$head_id."',
	'".$head_class."', '".$para."', '".$para_id."', '".$para_class."', '".$a_href."', '".$a_name."', '".$keyword."');";
};
if($xid == 2) {
	$sql = "UPDATE ".$dbtable." SET heading='" .$heading."', head_id='".$head_id."', head_class='".$head_class."', para='".$para."', para_id='".$para_id."',
	para_class='".$para_class."', a_href='".$a_href."', a_name='".$a_name."', keyword='".$keyword."' WHERE ID='".$ID."';";
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