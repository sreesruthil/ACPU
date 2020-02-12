<?php
$sessError='';
	ob_start();
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		die("Please sign in");
		header("Location: index.php");
		exit;
	}
	// if session not for acpu this will redirect to login page
	if(!isset($_SESSION['web_pg_nam'])){
		unset($_SESSION['user']);
		session_unset();
		session_destroy();
		die("Please sign in");
		header("Location: index.php");
		exit;
	} else if ($_SESSION['web_pg_nam']!='acpu'){
		//this ensures that session is for acpu
		unset($_SESSION['user']);
		unset($_SESSION['web_pg_nam']);
		session_unset();
		session_destroy();
		die("Please sign in");
		header("Location: index.php");
		exit;
	}
	// if session timed out this will redirect to login page
	if (!isset($_SESSION['created'])) {
		unset($_SESSION['user']);
		unset($_SESSION['web_pg_nam']);
		session_unset();
		session_destroy();
		die("Please sign in");
		header("Location: index.php");
		exit;
	} else if (time() - $_SESSION['created'] > 1500) {
		// session started more than 30 minutes ago
		unset($_SESSION['user']);
		unset($_SESSION['web_pg_nam']);
		session_unset();
		session_destroy();
		die("Your session has expired");
		header("Location: index.php");
		exit;
	} else if (time() - $_SESSION['created'] > 900) {
		// session started more than 15 minutes ago
		session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
		$_SESSION['created'] = time();  // update creation time
	}
ob_end_flush();
?>
<h3 onclick="swaphid();">Update Contact Info</h3>
<form id="form11" name="form11" enctype="multipart/form-data">
<table>
	<tr>
		<td title="Enter ID to update/delete a news">ID</td><td><input type="TEXT" name="idno11" id="idno11"></td>
	</tr>
	<tr>
		<td>Up Box</td><td>
		<textarea name="upbox11" id="upbox11" cols="70" rows="15"></textarea></td>
	</tr>
	<tr>
		<td> <input onclick="insrtcntinfo();" type="button" value="Update" id="Update" name="Update"></td>
		<td>Be happy</td>
	</tr>
</table>
</form>
<script>
function insrtcntinfo(){
	var xidno = document.getElementById("idno11").value;
	var xupbox = document.getElementById("upbox11").value;
	var data = new FormData;
	data.append('ID', xidno);
	data.append('up_box', xupbox);
	var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        };
    };
	xhr.open("POST", "contactinfo_change.php", true);
	xhr.send(data);
};
</script>