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
<h3 onclick="swaphid();">Insert details of Grid Slider</h3>
<form id="form4" name="form4" enctype="multipart/form-data">
<table>
	<tr>
		<td title="Enter ID to update/delete an entry">ID</td><td><input type="TEXT" name="idno4" id="idno4"></td>
	</tr>
	<tr>
		<td title="Enter the caption tile that will appear when mouse hovers on the grid image">Title</td><td><input type="TEXT" name="title4" id="title4"></td>
	</tr>
	<tr>
		<td title="The description to be shown below the title while mouse hover on grid image">Description</td><td><textarea name="descrip4" id="descrip4" cols="50" rows="10"></textarea></td>
	</tr>
	<tr>
		<td title="Target page address for link at end of the above description">Link</td><td><input type="TEXT" name="link4" id="link4"></td>
	</tr>
	<tr>
		<td title="Image name to be shown on the grid without extension or dot">Img Name</td><td><input type="TEXT" name="imgname4" id="imgname4"></td>
	</tr>
	<tr>
		<td title="Image format for above image">Img Type</td><td><input type="TEXT" name="imtype4" id="imtype4"></td>
	</tr>
	<tr>
		<td title="Caption to be shown below the image">caption</td><td><input type="TEXT" name="caption4" id="caption4"></td>
	</tr>
	<tr>
		<td><input onclick="insrtgridslid(1);" type="button" value="Insert" id="submit" name="submit"></td>
		<td> <input onclick="insrtgridslid(2);" type="button" value="Update" id="Update" name="Update"></td>
	</tr>
	<tr>
		<td><input onclick="insrtgridslid(3);" type="button" value="Delete" id="Delte" name="Delte"></td>
		<td>Be happy</td>
	</tr>
</table>
</form>
<script>
function insrtgridslid(xy){
	var xidno = document.getElementById("idno4").value;
	var xtitle = document.getElementById("title4").value;
	var xdescrip = document.getElementById("descrip4").value;
	var xlink = document.getElementById("link4").value;
	var ximgname = document.getElementById("imgname4").value;
	var ximtype = document.getElementById("imtype4").value;
	var xcaption = document.getElementById("caption4").value;
	var data = new FormData;
	data.append('XID', xy);
	if(xy == 2 || xy == 3 ) {
	data.append('ID', xidno);
	};
	if(xy == 1 || xy == 2 ) {
	data.append('title', xtitle);
	data.append('descrip', xdescrip);
	data.append('link', xlink);
	data.append('imgname', ximgname);
	data.append('imtype', ximtype);
	data.append('caption', xcaption);
	};
	var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        };
    };
	xhr.open("POST", "gridslid_change.php", true);
	xhr.send(data);
};
</script>