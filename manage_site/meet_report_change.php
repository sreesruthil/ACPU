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
  if (empty($_POST["Meet_id"])) {
    die("Enter Meet_id");
	exit;
  } else {
    $Meet_id = test_input($_POST["Meet_id"]);
    // check if Meet_id only contains numbers
    if (!preg_match("/^[1-9][0-9]*$/",$Meet_id)) {
    die("Only number allowed for Meet_id");
	exit;
    }
  }
  if (empty($_POST["para_F_L"])) {
    die("Enter para_F_L");
	exit;
  } else {
    $para_F_L = test_input($_POST["para_F_L"]);
    // check if para_F_L only contains numbers
    if (!preg_match("/^[1-9][0-9]*$/",$para_F_L)) {
    die("Only number allowed for para_F_L");
	exit;
    }
  }
  if (empty($_POST["para_ord"])) {
    die("Enter para_ord");
	exit;
  } else {
    $para_ord = test_input($_POST["para_ord"]);
    // check if para_ord only contains numbers
    if (!preg_match("/^[1-9][0-9]*$/",$para_ord)) {
    die("Only number allowed for para_ord");
	exit;
    }
  }
  if (!empty($_POST["Title"])) {
  $Title = db_prepare_input($_POST["Title"]);
    // preparing Title for db
  } else {
	die("Enter the Title");
  }
  if (empty($_POST["Artcl_class"])) {
    die("Enter Artcl_class");
	exit;
  } else {
    $Artcl_class = test_input($_POST["Artcl_class"]);
    // check if Artcl_class only contains letters
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$Artcl_class)) {
    die("Only letters, hyphen and number allowed for Artcl_class");
	exit;
    }
  }
  if (empty($_POST["subtitle"])) {
    $subtitle="";
  } else {
    $subtitle = test_input($_POST["subtitle"]);
    // check if subtitle only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9:, ]*$/",$subtitle)) {
    die("Only letters, ': ,', white space and number allowed for subtitle");
	exit;
    }
  }
  if (empty($_POST["Speaker"])) {
    $Speaker="";
  } else {
    $Speaker = test_input($_POST["Speaker"]);
    // check if Speaker only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9:,.&;() ]*$/",$Speaker)) {
    die("Only number allowed for Speaker");
	exit;
    }
  }
  if (empty($_POST["img_nam"])) {
	$img_nam="";
  } else {
    $img_nam = test_input($_POST["img_nam"]);
    // check if img_nam only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$img_nam)) {
		die("Only letters, numbers and underscore allowed for img_nam"); 
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
  if (empty($_POST["im_float"])) {
	$im_float = "";
  } else {
    $im_float = test_input($_POST["im_float"]);
    // check if im_float only contains letters and dot
    if (!preg_match("/^[a-zA-Z]*$/",$im_float)) {
		die("Only letters allowed for im_float"); 
		exit;
    }
  }
  if (!empty($_POST["Para"])) {
  $Para = db_prepare_input($_POST["Para"]);
    // preparing Para for db
  } else {
	$Para="";
  }
};
require_once('../dbconfig.php');
$dbtable = "meet_report";
if($xid == 1) {
	$sql = "INSERT INTO ".$dbtable." (Meet_id, Title, Artcl_class, subtitle, Speaker, img_nam, imtype, im_float, Para, para_F_L, para_ord) VALUES ('".$Meet_id."', '".$Title."', '".$Artcl_class."',
	'".$subtitle."', '".$Speaker."', '".$img_nam."', '".$imtype."', '".$im_float."', '".$Para."', '".$para_F_L."', '".$para_ord."');";
};
if($xid == 2) {
	$sql = "UPDATE ".$dbtable." SET Meet_id='" .$Meet_id."', Title='".$Title."', Artcl_class='".$Artcl_class."', subtitle='".$subtitle."', Speaker='".$Speaker."', img_nam='".$img_nam."',
	imtype='".$imtype."', im_float='".$im_float."', Para='".$Para."', para_F_L='".$para_F_L."', para_ord='".$para_ord."' WHERE ID='".$ID."';";
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