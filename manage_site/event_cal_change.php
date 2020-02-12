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
    die("Enable to perform the action, XID not present");
	exit;
  } else {
    $xid = test_input($_POST["XID"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[1-9][0-9]*$/",$xid)) {
    die("Enable to perform the action, XID invalid");
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
  if (empty($_POST["e_id"])) {
	die("e_id is required");
	exit;
  } else {
    $e_id = test_input($_POST["e_id"]);
    // check if e_id only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$e_id)) {
		die("Only numbers allowed for e_id"); 
		exit;
    }
  }
  if (empty($_POST["ul_ind"])) {
	die("ul_ind is required");
	exit;
  } else {
    $ul_ind = test_input($_POST["ul_ind"]);
    // check if ul_ind only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$ul_ind)) {
		die("Only numbers allowed for ul_ind"); 
		exit;
    }
  }
  if (empty($_POST["ul_F_L"])) {
	$ul_F_L = "";
  } else {
    $ul_F_L = test_input($_POST["ul_F_L"]);
    // check if ul_F_L only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$ul_F_L)) {
		die("Only numbers allowed for ul_F_L"); 
		exit;
    }
  }
  if (empty($_POST["e_time"])) {
	die("e_time is required");
	exit;
  } else {
    $e_time = test_input($_POST["e_time"]);
    // check if e_time only contains letters and whitespace
    if (!preg_match("/^[a-z]*$/",$e_time)) {
		die("Only small letters allowed for e_time"); 
		exit;
    }
  }
  if (empty($_POST["e_name"])) {
	die("e_name is required");
	exit;
  } else {
    $e_name = test_input($_POST["e_name"]);
    // check if e_name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9_:,? ]*$/",$e_name)) {
		die("Only letters, numbers, question mark, colon, space and underscore allowed for e_name"); 
		exit;
    }
  }
  if (empty($_POST["e_head"])) {
	$e_head = "";
  } else {
    $e_head = test_input($_POST["e_head"]);
    // check if e_head only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9_:, ]*$/",$e_head)) {
		die("Only letters, numbers, colon, space and underscore allowed for e_head"); 
		exit;
    }
  }
  if (empty($_POST["img_nam"])) {
	$img_nam = "";
  } else {
    $img_nam = test_input($_POST["img_nam"]);
    // check if img_nam only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$img_nam)) {
		die("Only letters, numbers and underscore allowed for img_nam"); 
		exit;
    }
  }
  if (!empty($_POST["img_nam"])) {
	  if (empty($_POST["imtype"])) {
		die("imtype is required");
		exit;
	  } else {
		$imtype = test_input($_POST["imtype"]);
		// check if imtype only contains letters and dot
		if (!preg_match("/^[a-zA-Z]*$/",$imtype)) {
			die("Only letters allowed for imtype"); 
			exit;
		}
	  }
	  if (empty($_POST["e_flot"])) {
		die("e_flot is required");
		exit;
	  } else {
		$e_flot = test_input($_POST["e_flot"]);
		// check if e_flot only contains letters and dot
		if (!preg_match("/^[a-zA-Z]*$/",$e_flot)) {
			die("Only letters allowed for e_flot"); 
			exit;
		}
	  }
	  if (empty($_POST["e_pad"])) {
		die("e_pad is required");
		exit;
	  } else {
		$e_pad = test_input($_POST["e_pad"]);
		// check if e_pad only contains letters and dot
		if (!preg_match("/^[a-zA-Z]*$/",$e_pad)) {
			die("Only letters allowed for e_pad".$e_pad); 
			exit;
		}
	  }
	} else {
		$imtype="";
		$e_flot="";
		$e_pad="";
	}
  if (empty($_POST["e_li1"])) {
	$e_li1 = "";
  } else {
    $e_li1 = test_input($_POST["e_li1"]);
    // check if e_li1 only contains letters and dot
    if (!preg_match("/^[a-zA-Z0-9&:.\,_\(\) ]*$/",$e_li1)) {
		die("Only letters, numbers, &, :, comma, underscore, dot, brakets and space allowed for e_li1"); 
		exit;
    }
  }
  if (empty($_POST["e_li2"])) {
	$e_li2 = "";
  } else {
    $e_li2 = test_input($_POST["e_li2"]);
    // check if e_li2 only contains letters and dot
    if (!preg_match("/^[a-zA-Z0-9&:.\'\,_\(\) ]*$/",$e_li2)) {
		die("Only letters, numbers, &, :, dot and space allowed for e_li2"); 
		exit;
    }
  }
  if (empty($_POST["e_li3"])) {
	$e_li3 = "";
  } else {
    $e_li3 = test_input($_POST["e_li3"]);
    // check if e_li3 only contains letters and dot
    if (!preg_match("/^[a-zA-Z0-9&:.\,_\(\) ]*$/",$e_li3)) {
		die("Only letters, numbers, &, :, dot and space allowed for e_li3"); 
		exit;
    }
  }
  if (empty($_POST["e_li4"])) {
	$e_li4 = "";
  } else {
    $e_li4 = test_input($_POST["e_li4"]);
    // check if e_li4 only contains letters and dot
    if (!preg_match("/^[a-zA-Z0-9&:.\,_\(\) ]*$/",$e_li4)) {
		die("Only letters, numbers, &, :, dot and space allowed for e_li4"); 
		exit;
    }
  }
};
require_once('../dbconfig.php');
$dbtable = "event_cal";
if($xid == 1) {
	$sql = "INSERT INTO ".$dbtable." (e_id, ul_ind, ul_F_L, e_time, e_name, e_head, img_nam, imtype, e_flot, e_pad, e_li1, e_li2, e_li3, e_li4) 
	VALUES ('".$e_id."','".$ul_ind."','".$ul_F_L."','".$e_time."','".$e_name."','".$e_head."','".$img_nam."', '".$imtype."','".$e_flot."','".$e_pad."',
	'".$e_li1."','".$e_li2."','".$e_li3."','".$e_li4."');";
};
if($xid == 2) {
	$sql = "UPDATE ".$dbtable." SET e_id='" .$e_id."', ul_ind='".$ul_ind."', ul_F_L='".$ul_F_L."', e_time='".$e_time."', e_name='".$e_name."',
	e_head='".$e_head."', img_nam='" .$img_nam."', imtype='".$imtype."', e_flot='".$e_flot."', e_pad='".$e_pad."', e_li1='".$e_li1."', e_li2='".$e_li2."',
	e_li3='".$e_li3."', e_li4='".$e_li4."' WHERE ID='".$ID."';";
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