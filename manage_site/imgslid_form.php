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
<h3 onclick="swaphid();">Insert details of Image slider</h3>
<form id="form1" name="form1" enctype="multipart/form-data">
<table>
	<tr>
	<td title="Enter ID to update/delete an entry">ID</td><td><input type="TEXT" name="idno1" id="idno1"></td>
	</tr>
	<tr>
	<td title="Name of Image without format">Image name</td><td><input type="TEXT" name="imgname1" id="imgname1"></td>
	</tr>
	<tr>
	<td title="type the image format">Image Type</td><td><input type="TEXT" name="imtype1" id="imtype1"></td>
	</tr>
	<tr>
	<td title="first line of description">Description1</td><td><input type="TEXT" name="descrip1" id="descrip1"></td>
	</tr>
	<tr>
	<td title="second line of description">Description2</td><td><textarea name="descrcontent1" id="descrcontent1" cols="50" rows="14"></textarea></td>
	</tr>
	<tr>
	<td title="link given to 2nd description (address of target page on clicking 2nd description)">link</td><td><input type="TEXT" name="link1" id="link1"></td>
	</tr>
	<tr>
		<td><input onclick="insrtimagslid(1);" type="button" value="Insert" id="submit" name="submit"></td>
		<td> <input onclick="insrtimagslid(2);" type="button" value="Update" id="Update" name="Update"></td>
	</tr>
	<tr>
		<td><input onclick="insrtimagslid(3);" type="button" value="Delete" id="Delte" name="Delte"></td>
		<td>Be happy</td>
	</tr>
</table>
</form>
<script>
function insrtimagslid(xy){
	var xidno = document.getElementById("idno1").value;
	var ximgname = document.getElementById("imgname1").value;
	var ximtype = document.getElementById("imtype1").value;
	var xdescrip = document.getElementById("descrip1").value;
	var xdescrcontent = document.getElementById("descrcontent1").value;
	var xlink = document.getElementById("link1").value
	var data = new FormData;
	data.append('XID', xy);
	if(xy == 2 || xy == 3 ) {
	data.append('ID', xidno);
	};
	if(xy == 1 || xy == 2 ) {

	data.append('imgname', ximgname);
	data.append('imtype', ximtype);
	data.append('descrip', xdescrip);
	data.append('descrcontent', xdescrcontent);
	data.append('link', xlink);
	
	};
	var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        };
    };
	xhr.open("POST", "imgslid_change.php", true);
	xhr.send(data);
};
</script>