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
<h3 onclick="swaphid();">Insert details of Activity boxes</h3>
<form id="form7" name="form7" enctype="multipart/form-data">
<table>
	<tr>
	<td title="Enter ID to update/delete an entry">ID</td><td><input type="TEXT" name="idno7" id="idno7"></td>
	</tr>
	<tr>
		<td title="Heading of Boxes in activity page">Title</td><td><input type="TEXT" name="title7" id="title7"></td>
	</tr>
	<tr>
		<td title="Paragraph in these boxes">para</td><td><textarea name="para7" id="para7" cols="50" rows="12"></textarea></td>
	</tr>
	<tr>
		<td title="Name of Image in the box">Img_nam</td><td><input type="TEXT" name="img_nam7" id="img_nam7"></td>
	</tr>
	<tr>
		<td title="Format of this image">Imtype</td><td><input type="TEXT" name="imtype7" id="imtype7"></td>
	</tr>
	<tr>
		<td title="Alt part of the image n the box">Im_alt</td><td><input type="TEXT" name="im_alt7" id="im_alt7"></td>
	</tr>
	<tr>
		<td title="Target page address given in box">A_href</td><td><input type="TEXT" name="a_href7" id="a_href7"></td>
	</tr>
	<tr>
		<td title="Displayed name for the link">A_name</td><td><input type="TEXT" name="a_name7" id="a_name7"></td>
	</tr>
	<tr>
		<td><input onclick="insrtactbox(1);" type="button" value="Insert" id="submit" name="submit"></td>
		<td> <input onclick="insrtactbox(2);" type="button" value="Update" id="Update" name="Update"></td>
	</tr>
	<tr>
		<td><input onclick="insrtactbox(3);" type="button" value="Delete" id="Delte" name="Delte"></td>
		<td>Be happy</td>
	</tr>
</table>
</form>
<script>
function insrtactbox(xy){
	var xidno = document.getElementById("idno7").value;
	var xtitle = document.getElementById("title7").value;
	var xpara = document.getElementById("para7").value;
	var ximg_nam = document.getElementById("img_nam7").value;
	var ximtype = document.getElementById("imtype7").value;
	var xim_alt = document.getElementById("im_alt7").value;
	var xa_href = document.getElementById("a_href7").value;
	var xa_name = document.getElementById("a_name7").value;
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
	data.append('im_alt', xim_alt);
	data.append('a_href', xa_href);
	data.append('a_name', xa_name);
	};
	var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        };
    };
	xhr.open("POST", "actbox_change.php", true);
	xhr.send(data);
};
</script>