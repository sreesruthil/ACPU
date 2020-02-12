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
<h3 onclick="swaphid();">Insert details of Vertical Nav link</h3>
<form id="form3" name="form3" enctype="multipart/form-data">
<table>
	<tr>
	<td title="Enter ID to update/delete an entry">ID</td><td><input type="TEXT" name="idno3" id="idno3"></td>
	</tr>
	<tr>
		<td title="Target page address for this link">Link</td><td><input type="TEXT" name="link3" id="link3"></td>
	</tr>
	<tr>
		<td title="Name to be displayed as part of link">Title</td><td><input type="TEXT" name="title3" id="title3"></td>
	</tr>
	<tr>
		<td title="Id for further use of this entry">Page_select</td><td><input type="TEXT" name="page_select3" id="page_select3"></td>
	</tr>
	<tr>
		<td><input onclick="insrthomedlink(1);" type="button" value="Insert" id="submit" name="submit"></td>
		<td> <input onclick="insrthomedlink(2);" type="button" value="Update" id="Update" name="Update"></td>
	</tr>
	<tr>
		<td> <input onclick="insrthomedlink(3);" type="button" value="Delete" id="Delte" name="Delte"></td>
		<td>Be happy</td>
	</tr>
</table>
</form>
<script>
function insrthomedlink(xy){
	var xidno = document.getElementById("idno3").value;
	var xtitle = document.getElementById("title3").value;
	var xlink = document.getElementById("link3").value;
	var xpage_select = document.getElementById("page_select3").value;
	var data = new FormData;
	data.append('XID', xy);
	if(xy == 2 || xy == 3 ) {
	data.append('ID', xidno);
	};
	if(xy == 1 || xy == 2 ) {
	data.append('title', xtitle);		
	data.append('link', xlink);
	data.append('page_select', xpage_select);
	};
	var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        };
    };
	xhr.open("POST", "homedownlink_change.php", true);
	xhr.send(data);
};
</script>