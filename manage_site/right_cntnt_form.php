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
<h3 onclick="swaphid();">Insert details of Right Content</h3>
<form id="form9" name="form9" enctype="multipart/form-data">
<table>
	<tr>
		<td title="Enter ID to update/delete an entry">ID</td><td><input type="TEXT" name="idno9" id="idno9"></td>
	</tr>
	<tr>
		<td title="H1 sized Title">Title_h1</td><td><input type="TEXT" name="title_h19" id="title_h19"></td>
	</tr>
	<tr>
		<td title="H3 sized Title">Title_h3</td><td><input type="TEXT" name="title_h39" id="title_h39"></td>
	</tr>
	<tr>
		<td title="Name of image to be shown in para">Img_nam</td><td><input type="TEXT" name="img_nam9" id="img_nam9"></td>
	</tr>
	<tr>
		<td title="Format of the image">Imtype</td><td><input type="TEXT" name="imtype9" id="imtype9"></td>
	</tr>
	<tr>
		<td title="Position of float for image(left/right)">Float_pos</td><td><input type="TEXT" name="float_pos9" id="float_pos9"></td>
	</tr>
	<tr>
		<td title="Para to be shown">para</td><td><textarea name="para9" id="para9" cols="50" rows="9"></textarea></td>
	</tr>
	<tr>
		<td title="Keyword to select entries for a particular page">Cont Index</td><td><input type="TEXT" name="rgt_cnt_ind9" id="rgt_cnt_ind9"></td>
	</tr>
	<tr>
		<td title="order of retrieving the data if multiple entries are available for a page">Cont order</td><td><input type="TEXT" name="rgt_cnt_ord9" id="rgt_cnt_ord9"></td>
	</tr>
	<tr>
		<td><input onclick="insrtrightcnt(1);" type="button" value="Insert" id="submit" name="submit"></td>
		<td> <input onclick="insrtrightcnt(2);" type="button" value="Update" id="Update" name="Update"></td>
	</tr>
	<tr>
		<td><input onclick="insrtrightcnt(3);" type="button" value="Delete" id="Delte" name="Delte"></td>
		<td>Be happy</td>
	</tr>
</table>
<h2>Note: To add multipe para, insert multiple rows.</h2>
</form>
<script>
function insrtrightcnt(xy){
	var xidno = document.getElementById("idno9").value;
	var xtitle_h1 = document.getElementById("title_h19").value;
	var xtitle_h3 = document.getElementById("title_h39").value;
	var ximg_nam = document.getElementById("img_nam9").value;
	var ximtype = document.getElementById("imtype9").value;
	var xfloat_pos = document.getElementById("float_pos9").value;
	var xpara = document.getElementById("para9").value;
	var xrgt_cnt_ind = document.getElementById("rgt_cnt_ind9").value;
	var xrgt_cnt_ord = document.getElementById("rgt_cnt_ord9").value;
	var data = new FormData;
	data.append('XID', xy);
	if(xy == 2 || xy == 3 ) {
	data.append('ID', xidno);
	};
	if(xy == 1 || xy == 2 ) {
	data.append('title_h1', xtitle_h1);
	data.append('title_h3', xtitle_h3);
	data.append('Img_nam', ximg_nam);
	data.append('Imtype', ximtype);
	data.append('float_pos', xfloat_pos);
	data.append('para', xpara);
	data.append('rgt_cnt_ind', xrgt_cnt_ind);
	data.append('rgt_cnt_ord', xrgt_cnt_ord);
	};
	var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        };
    };
	xhr.open("POST", "right_cntnt_change.php", true);
	xhr.send(data);
};
</script>