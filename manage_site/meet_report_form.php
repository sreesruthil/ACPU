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
<h3 onclick="swaphid();">Insert details of meeting's report</h3>
<form id="form61" name="form61" enctype="multipart/form-data">
<table>
	<tr>
		<td title="Enter ID to update/delete an entry">ID</td><td><input type="TEXT" name="idno61" id="idno61"></td>
	</tr>
	<tr>
		<td title="Enter an ID for this meeting">Meet_id</td><td><input type="TEXT" name="Meet_id61" id="Meet_id61"></td>
	</tr>
	<tr>
		<td title="This para is first/last? type '1' for FIRST, '3' for LAST, '13' for both, '2' for neither">para_F_L</td><td><input type="TEXT" name="para_F_L61" id="para_F_L61"></td>
	</tr>
	<tr>
		<td title="Enter the order of the para">para_ord</td><td><input type="TEXT" name="para_ord61" id="para_ord61"></td>
	</tr>
	<tr>
		<td title="Enter the title for the report with date">Title</td><td><textarea name="Title61" id="Title61" cols="50" rows="2"></textarea></td>
	</tr>
	<tr>
		<td title="Enter class for article">Artcl_class</td><td><input type="TEXT" name="Artcl_class61" id="Artcl_class61"></td>
	</tr>
	<tr>
		<td title="Enter the subtitle">subtitle</td><td><input type="TEXT" name="subtitle61" id="subtitle61"></td>
	</tr>
	<tr>
		<td title="Details about the speaker">Speaker</td><td><input type="TEXT" name="Speaker61" id="Speaker61"></td>
	</tr>
		<tr>
		<td title="Name of the Image">img_nam</td><td><input type="TEXT" name="img_nam61" id="img_nam61"></td>
	</tr>
	<tr>
		<td title="Image format for the image">imtype</td><td><input type="TEXT" name="imtype61" id="imtype61"></td>
	</tr>
	<tr>
		<td title="Position of image (right/left)">im_float</td><td><input type="TEXT" name="im_float61" id="im_float61"></td>
	</tr>
	<tr>
		<td title="Enter the para of report here">Para</td><td><textarea name="Para61" id="Para61" cols="50" rows="15"></textarea></td>
	</tr>
	<tr>
		<td><input onclick="insrtreport(1);" type="button" value="Insert" id="submit" name="submit"></td>
		<td> <input onclick="insrtreport(2);" type="button" value="Update" id="Update" name="Update"></td>
	</tr>
	<tr>
		<td><input onclick="insrtreport(3);" type="button" value="Delete" id="Delte" name="Delte"></td>
		<td>Be happy</td>
	</tr>
</table>
</form>
<script>
function insrtreport(xy){
	var xidno = document.getElementById("idno61").value;
	var xMeet_id = document.getElementById("Meet_id61").value;
	var xpara_F_L = document.getElementById("para_F_L61").value;
	var xpara_ord = document.getElementById("para_ord61").value;
	var xTitle = document.getElementById("Title61").value;
	var xArtcl_class = document.getElementById("Artcl_class61").value;
	var xsubtitle = document.getElementById("subtitle61").value;
	var xSpeaker = document.getElementById("Speaker61").value;
	var ximg_nam = document.getElementById("img_nam61").value;
	var ximtype = document.getElementById("imtype61").value;
	var xim_float = document.getElementById("im_float61").value;
	var xPara = document.getElementById("Para61").value;
	var data = new FormData;
	data.append('XID', xy);
	if(xy == 2 || xy == 3 ) {
	data.append('ID', xidno);
	};
	if(xy == 1 || xy == 2 ) {
	data.append('Meet_id', xMeet_id);
	data.append('para_F_L', xpara_F_L);
	data.append('para_ord', xpara_ord);
	data.append('Title', xTitle);
	data.append('Artcl_class', xArtcl_class);
	data.append('subtitle', xsubtitle);
	data.append('Speaker', xSpeaker);
	data.append('img_nam', ximg_nam);
	data.append('imtype', ximtype);
	data.append('im_float', xim_float);
	data.append('Para', xPara);
	};
	var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        };
    };
	xhr.open("POST", "meet_report_change.php", true);
	xhr.send(data);
};
</script>