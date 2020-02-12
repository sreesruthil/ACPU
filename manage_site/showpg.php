<?php
$sessError='';
	ob_start();
	session_start();
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		$sessError='a';
		die("Please sign in a");
		exit;
	}
	//if session was not set for acpu this will mark an error
	if(!isset($_SESSION['web_pg_nam'])){
		unset($_SESSION['user']);
		session_unset();
		session_destroy();
		$sessError='a';
		die("Please sign in a");
		exit;
	} else if ($_SESSION['web_pg_nam']!='acpu'){
		//this ensures that session is for acpu
		unset($_SESSION['user']);
		unset($_SESSION['web_pg_nam']);
		session_unset();
		session_destroy();
		$sessError='a';
		die("Please sign in a");
		exit;
	}
	// if session timed out this will mark an error
	if (!isset($_SESSION['created'])) {
		unset($_SESSION['user']);
		unset($_SESSION['web_pg_nam']);
		session_unset();
		session_destroy();
		$sessError='a';
		die("Please sign in a");
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
//PHP Validation starts here
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['pgcode'])) {
    die("Parsing error");
	exit;
  } else {
	$pgcode = trim($_POST['pgcode']);
	$pgcode = stripslashes($pgcode);
	$pgcode = htmlspecialchars($pgcode);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[1-9][0-9]*$/",$pgcode)) {
    die("Number only allowed for pgcode, some internal error");
	exit;
    }
  }//PHP Validation ends here
	$pgcode--;
	if($pgcode == 0) {require_once('show_news_admin.php');};
	if($pgcode == 1) {require_once('show_imgslid_admin.php');};
	if($pgcode == 2) {require_once('show_homeinfo_admin.php');};
	if($pgcode == 3) {require_once('show_homedownlink_admin.php');};
	if($pgcode == 4) {require_once('show_gridslid_admin.php');};
	if($pgcode == 5) {require_once('show_overview_admin.php');};
	if($pgcode == 6) {require_once('show_meeting_admin.php');};
	if($pgcode == 61) {require_once('show_meet_report_admin.php');};
	if($pgcode == 7) {require_once('show_actbox_admin.php');};
	if($pgcode == 8) {require_once('show_Base_page_admin.php');};
	if($pgcode == 9) {require_once('show_right_cntnt_admin.php');};
	if($pgcode == 91) {require_once('show_event_cal_admin.php');};
	if($pgcode == 10){require_once('show_msg_admin.php');};
	if($pgcode == 11){require_once('show_contactinfo_admin.php');};
	if($pgcode == 12){require_once('show_join_admin.php');};
	if($pgcode == 13){require_once('show_join_admin.php');};
	if($pgcode == 14){require_once('show_Admins_admin.php');};
  }
}
ob_end_flush();
?>