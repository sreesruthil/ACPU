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
<h3 onclick="swaphid();">Insert details of Home info</h3>
<form id="form2" name="form2" enctype="multipart/form-data">
<table>
	<tr>
	<td title="Enter ID to update/delete an entry">ID</td><td><input type="TEXT" name="idno2" id="idno2"></td>
	</tr>
	<tr>
		<td title="Heading that comes under navigation bar">Heading</td><td><input type="TEXT" name="heading2" id="heading2"></td>
	</tr>
	<tr>
		<td title="id for above Heading">head_id</td><td><input type="TEXT" name="head_id2" id="head_id2"></td>
	</tr>
	<tr>
		<td title="class for above Heading">head_class</td><td><input type="TEXT" name="head_class2" id="head_class2"></td>
	</tr>
	<tr>
		<td title="Paragraph that comes under above Heading">para</td><td><textarea name="para2" id="para2" cols="50" rows="10"></textarea></td>
	</tr>
	<tr>
		<td title="id for above para">para_id</td><td><input type="TEXT" name="para_id2" id="para_id2"></td>
	</tr>
	<tr>
		<td title="class for above para">para_class</td><td><input type="TEXT" name="para_class2" id="para_class2"></td>
	</tr>
	<tr>
		<td title="Target page address for link given at end of above para">a_href</td><td><input type="TEXT" name="a_href2" id="a_href2"></td>
	</tr>
	<tr>
		<td title="Link name for link at end of above para">a_name</td><td><input type="TEXT" name="a_name2" id="a_name2"></td>
	</tr>
	<tr>
		<td title="Keyword to recognize this entry(should be unique keyword in this table)">keyword</td><td><input type="TEXT" name="keyword2" id="keyword2"></td>
	</tr>
	<tr>
		<td><input onclick="insrtupinfo(1);" type="button" value="Insert" id="submit" name="submit"></td>
		<td> <input onclick="insrtupinfo(2);" type="button" value="Update" id="Update" name="Update"></td>
	</tr>
	<tr>
		<td><input onclick="insrtupinfo(3);" type="button" value="Delete" id="Delte" name="Delte"></td>
		<td>Be happy</td>
	</tr>
</table>
</form>
<script>
function insrtupinfo(xy){
	var xidno = document.getElementById("idno2").value;
	var xheading = document.getElementById("heading2").value;
	var xhead_id = document.getElementById("head_id2").value;
	var xhead_class = document.getElementById("head_class2").value;
	var xpara = document.getElementById("para2").value;
	var xpara_id = document.getElementById("para_id2").value;
	var xpara_class = document.getElementById("para_class2").value;
	var xa_href = document.getElementById("a_href2").value;
	var xa_name = document.getElementById("a_name2").value;
	var xkeyword = document.getElementById("keyword2").value;
	var data = new FormData;
	data.append('XID', xy);
	if(xy == 2 || xy == 3 ) {
	data.append('ID', xidno);
	};
	if(xy == 1 || xy == 2 ) {
	data.append('heading', xheading);
	data.append('head_id', xhead_id);
	data.append('head_class', xhead_class);
	data.append('para', xpara);
	data.append('para_id', xpara_id);
	data.append('para_class', xpara_class);
	data.append('a_href', xa_href);
	data.append('a_name', xa_name);
	data.append('keyword', xkeyword);
	};
	var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        };
    };
	xhr.open("POST", "homeinfo_change.php", true);
	xhr.send(data);
};
</script>