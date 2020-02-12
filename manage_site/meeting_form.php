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
<h3 onclick="swaphid();">Insert details of Meeting</h3>
<form id="form6" name="form6" enctype="multipart/form-data">
<table>
	<tr>
		<td title="Enter ID to update/delete an entry">ID</td><td><input type="TEXT" name="idno6" id="idno6"></td>
	</tr>
	<tr>
		<td title="Name of the image">img_nam</td><td><input type="TEXT" name="img_nam6" id="img_nam6"></td>
	</tr>
	<tr>
		<td title="Format of image">imtype</td><td><input type="TEXT" name="imtype6" id="imtype6"></td>
	</tr>
	<tr>
		<td title="link address">a_href</td><td><input type="TEXT" name="a_href6" id="a_href6"></td>
	</tr>
	<tr>
		<td title="Name shown for the link">a_name</td><td><input type="TEXT" name="a_name6" id="a_name6"></td>
	</tr>
	<tr>
		<td title="A small description of meeting">categry</td><td><input type="TEXT" name="categry6" id="categry6"></td>
	</tr>
	<tr>
		<td><input onclick="insrtmeeting(1);" type="button" value="Insert" id="submit" name="submit"></td>
		<td> <input onclick="insrtmeeting(2);" type="button" value="Update" id="Update" name="Update"></td>
	</tr>
	<tr>
		<td><input onclick="insrtmeeting(3);" type="button" value="Delete" id="Delte" name="Delte"></td>
		<td>Be happy</td>
	</tr>
</table>
</form>
<script>
function insrtmeeting(xy){
	var xidno = document.getElementById("idno6").value;
	var ximg_nam = document.getElementById("img_nam6").value;
	var ximtype = document.getElementById("imtype6").value;
	var xa_href = document.getElementById("a_href6").value;
	var xa_name = document.getElementById("a_name6").value;
	var xcategry = document.getElementById("categry6").value;
	var data = new FormData;
	data.append('XID', xy);
	if(xy == 2 || xy == 3 ) {
	data.append('ID', xidno);
	};
	if(xy == 1 || xy == 2 ) {
	data.append('img_nam', ximg_nam);
	data.append('imtype', ximtype);
	data.append('a_href', xa_href);
	data.append('a_name', xa_name);
	data.append('categry', xcategry);
	};
	var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        };
    };
	xhr.open("POST", "meeting_change.php", true);
	xhr.send(data);
};
</script>