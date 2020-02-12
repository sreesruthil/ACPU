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
<h3 onclick="swaphid();">Insert details of Event Calender</h3>
<form id="form91" name="form91" enctype="multipart/form-data">
<table>
	<tr>
		<td title="Enter ID to update/delete an entry">ID</td><td><input type="TEXT" name="idno91" id="idno91"></td>
	</tr>
	<tr>
		<td title="Id of the Event">e_id</td><td><input type="TEXT" name="e_id91" id="e_id91"></td>
	</tr>
	<tr>
		<td title="Index of ul">ul_ind</td><td><input type="TEXT" name="ul_ind91" id="ul_ind91"></td>
	</tr>
	<tr>
		<td title="ul is first/last? 1 for 1st, 3 for last, 13 for both, 2 for none">ul_F_L</td><td><input type="TEXT" name="ul_F_L91" id="ul_F_L91"></td>
	</tr>
	<tr>
		<td title="Type either future or past">e_time</td><td><input type="TEXT" name="e_time91" id="e_time91"></td>
	</tr>
	<tr>
		<td title="Name of the event(usually date and heading)">e_name</td><td><input type="TEXT" name="e_name91" id="e_name91"></td>
	</tr>
	<tr>
		<td title="Heading above list">e_head</td><td><input type="TEXT" name="e_head91" id="e_head91"></td>
	</tr>
	<tr>
		<td title="Name of the image">img_nam</td><td><input type="TEXT" name="img_nam91" id="img_nam91"></td>
	</tr>
	<tr>
		<td title="Format of image">imtype</td><td><input type="TEXT" name="imtype91" id="imtype91"></td>
	</tr>
	<tr>
		<td title="Float position of image(right/left)">e_flot</td><td><input type="TEXT" name="e_flot91" id="e_flot91"></td>
	</tr>
	<tr>
		<td title="Padding for image(right/left)">e_pad</td><td><input type="TEXT" name="e_pad91" id="e_pad91"></td>
	</tr>
	<tr>
		<td title="List item No.1 (description)">e_li1</td><td><input type="TEXT" name="e_li191" id="e_li191"></td>
	</tr>
	<tr>
		<td title="List item No.2 (description)">e_li2</td><td><input type="TEXT" name="e_li291" id="e_li291"></td>
	</tr>
	<tr>
		<td title="List item No.3 (description)">e_li3</td><td><input type="TEXT" name="e_li391" id="e_li391"></td>
	</tr>
	<tr>
		<td title="List item No.4 (description)">e_li4</td><td><input type="TEXT" name="e_li491" id="e_li491"></td>
	</tr>
	<tr>
		<td><input onclick="insrteventcal(1);" type="button" value="Insert" id="submit" name="submit"></td>
		<td> <input onclick="insrteventcal(2);" type="button" value="Update" id="Update" name="Update"></td>
	</tr>
	<tr>
		<td><input onclick="insrteventcal(3);" type="button" value="Delete" id="Delte" name="Delte"></td>
		<td>Be happy</td>
	</tr>
</table>
</form>
<script>
function insrteventcal(xy){
	var xidno = document.getElementById("idno91").value;
	var xe_id = document.getElementById("e_id91").value;
	var xul_ind = document.getElementById("ul_ind91").value;
	var xul_F_L = document.getElementById("ul_F_L91").value;
	var xe_time = document.getElementById("e_time91").value;
	var xe_name = document.getElementById("e_name91").value;
	var xe_head = document.getElementById("e_head91").value;
	var ximg_nam = document.getElementById("img_nam91").value;
	var ximtype = document.getElementById("imtype91").value;
	var xe_flot = document.getElementById("e_flot91").value;
	var xe_pad = document.getElementById("e_pad91").value;
	var xe_li1 = document.getElementById("e_li191").value;
	var xe_li2 = document.getElementById("e_li291").value;
	var xe_li3 = document.getElementById("e_li391").value;
	var xe_li4 = document.getElementById("e_li491").value;
	var data = new FormData;
	data.append('XID', xy);
	if(xy == 2 || xy == 3 ) {
	data.append('ID', xidno);
	};
	if(xy == 1 || xy == 2 ) {
	data.append('e_id', xe_id);
	data.append('ul_ind', xul_ind);
	data.append('ul_F_L', xul_F_L);
	data.append('e_time', xe_time);
	data.append('e_name', xe_name);
	data.append('e_head', xe_head);
	data.append('img_nam', ximg_nam);
	data.append('imtype', ximtype);
	data.append('e_flot', xe_flot);
	data.append('e_pad', xe_pad);
	data.append('e_li1', xe_li1);
	data.append('e_li2', xe_li2);
	data.append('e_li3', xe_li3);
	data.append('e_li4', xe_li4);
	};
	var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        };
    };
	xhr.open("POST", "event_cal_change.php", true);
	xhr.send(data);
};
</script>