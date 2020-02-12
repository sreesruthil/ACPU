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
  if (empty($_POST["title_h1"])) {
	$title_h1="";
  } else {
    $title_h1 = test_input($_POST["title_h1"]);
    // check if title_h1 name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9:\, ]*$/",$title_h1)) {
		die("Only letters, numbers, ', :' and white space allowed for title_h1");
		exit;
	}
  }
  if (!empty($_POST["title_h3"])) {
  $title_h3 = db_prepare_input($_POST["title_h3"]);
    // preparing title_h3 for db
  } else {
	$title_h3="";
  }
  if (empty($_POST["Img_nam"])) {
	$Img_nam = "";
  } else {
    $Img_nam = test_input($_POST["Img_nam"]);
    // check if Img_nam only contains letters and dot
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$Img_nam)) {
		die("Only letters, numbers and underscore allowed for Img_nam"); 
		exit;
    }
  }
  if (empty($_POST["Imtype"])) {
	$Imtype = "";
  } else {
    $Imtype = test_input($_POST["Imtype"]);
    // check if Imtype only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]*$/",$Imtype)) {
		die("Only letters allowed for Imtype"); 
		exit;
    }
  }
  if (empty($_POST["float_pos"])) {
	$float_pos = "";
  } else {
    $float_pos = test_input($_POST["float_pos"]);
    // check if float_pos only contains letters and dot
    if (!preg_match("/^[a-zA-Z]*$/",$float_pos)) {
		die("Only letters allowed for float_pos"); 
		exit;
    }
  }
  if (!empty($_POST["para"])) {
  $para = db_prepare_input($_POST["para"]);
    // preparing para for db
  } else {
	$para="";
  }
  if (empty($_POST["rgt_cnt_ind"])) {
	die("rgt_cnt_ind is required");
	exit;
  } else {
    $rgt_cnt_ind = test_input($_POST["rgt_cnt_ind"]);
    // check if rgt_cnt_ind only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z_0-9]*$/",$rgt_cnt_ind)) {
		die("Only letters numbers,  and underscore allowed for rgt_cnt_ind"); 
		exit;
    }
  }
  if (empty($_POST["rgt_cnt_ord"])) {
	$rgt_cnt_ord = "";
  } else {
    $rgt_cnt_ord = test_input($_POST["rgt_cnt_ord"]);
    // check if rgt_cnt_ord only contains letters and dot
    if (!preg_match("/^[1-9][0-9]*$/",$rgt_cnt_ord)) {
		die("Only numbers allowed for rgt_cnt_ord"); 
		exit;
    }
  }
};
require_once('../dbconfig.php');
$dbtable = "right_cntnt";
if($xid == 1) {
	$sql = "INSERT INTO ".$dbtable." (title_h1, title_h3, Img_nam, Imtype, float_pos, para, rgt_cnt_ind, rgt_cnt_ord) VALUES ('".$title_h1."', '".$title_h3."',
	'".$Img_nam."',	'".$Imtype."', '".$float_pos."', '".$para."', '".$rgt_cnt_ind."', '".$rgt_cnt_ord."');";
};
if($xid == 2) {
	$sql = "UPDATE ".$dbtable." SET title_h1='" .$title_h1."', title_h3='" .$title_h3."', Img_nam='".$Img_nam."', Imtype='".$Imtype."', float_pos='".$float_pos."',
	para='".$para."', rgt_cnt_ind='".$rgt_cnt_ind."', rgt_cnt_ord='".$rgt_cnt_ord."' WHERE ID='".$ID."';";
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