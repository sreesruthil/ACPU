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
<h3 onclick="swaphid();">Insert details of Overview</h3>
<form id="form5" name="form5" enctype="multipart/form-data">
<table>
	<tr>
		<td title="Enter ID to update/delete an entry">ID</td><td><input type="TEXT" name="idno5" id="idno5"></td>
	</tr>
	<tr>
		<td title="Titles displayed on accordion block">Title</td><td><input type="TEXT" name="title5" id="title5"></td>
	</tr>
	<tr>
		<td title="Para displayed when accordion block is clicked">para</td><td><textarea name="para5" id="para5" cols="50" rows="15"></textarea></td>
	</tr>
	<tr>
		<td title="Name of image to be given in displaying">Img_nam</td><td><input type="TEXT" name="img_nam5" id="img_nam5"></td>
	</tr>
	<tr>
		<td title="Image format for above image">Imtype</td><td><input type="TEXT" name="imtype5" id="imtype5"></td>
	</tr>
	<tr>
		<td title="Position of image (right/left)">Float_pos</td><td><input type="TEXT" name="float_pos5" id="float_pos5"></td>
	</tr>
	<tr>
		<td><input onclick="insrtoverview(1);" type="button" value="Insert" id="submit" name="submit"></td>
		<td> <input onclick="insrtoverview(2);" type="button" value="Update" id="Update" name="Update"></td>
	</tr>
	<tr>
		<td><input onclick="insrtoverview(3);" type="button" value="Delete" id="Delte" name="Delte"></td>
		<td>Be happy</td>
	</tr>
</table>
</form>
<script>
function insrtoverview(xy){
	var xidno = document.getElementById("idno5").value;
	var xtitle = document.getElementById("title5").value;
	var xpara = document.getElementById("para5").value;
	var ximg_nam = document.getElementById("img_nam5").value;
	var ximtype = document.getElementById("imtype5").value;
	var xfloat_pos = document.getElementById("float_pos5").value;
	var data = new FormData;
	data.append('XID', xy);
	if(xy == 2 || xy == 3 ) {
	data.append('ID', xidno);
	};
	if(xy == 1 || xy == 2 ) {
	data.append('title', xtitle);
	data.append('para', xpara);
	data.append('img_nam', ximg_nam);
	data.append('imtype', ximtype);
	data.append('float_pos', xfloat_pos);
	};
	var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        };
    };
	xhr.open("POST", "overview_change.php", true);
	xhr.send(data);
};
</script>