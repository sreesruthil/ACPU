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
<h3 onclick="swaphid();">Insert details of News</h3>
<form id="form0" name="form0" enctype="multipart/form-data">
<table>
	<tr>
	<td title="Enter ID to update/delete a news">ID</td><td><input type="TEXT" name="idno0" id="idno0"></td>
	</tr>
		<td title="Enter News">News</td><td><input type="TEXT" name="news0" id="news0"></td>
	</tr>
		<td title="Target page on clicking the news">Link</td><td><input type="TEXT" name="link0" id="link0"></td>
	</tr>
	<tr>
		<td><input onclick="insrtnews(1);" type="button" value="Insert" id="submit" name="submit"></td>
		<td> <input onclick="insrtnews(2);" type="button" value="Update" id="Update" name="Update"></td>
	</tr>
	<tr>
		<td><input onclick="insrtnews(3);" type="button" value="Delete" id="Delte" name="Delte"></td>
		<td>Be happy</td>
	</tr>
</table>
</form>
<script>
function insrtnews(xy){
	var xidno = document.getElementById("idno0").value;
	var xnews = document.getElementById("news0").value;
	var xlink = document.getElementById("link0").value;
	var data = new FormData;
	data.append('XID', xy);
	if(xy == 2 || xy == 3 ) {
	data.append('ID', xidno);
	};
	if(xy == 1 || xy == 2 ) {
	data.append('news', xnews);		
	data.append('link', xlink);
	};
	var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        };
    };
	xhr.open("POST", "news_change.php", true);
	xhr.send(data);
};
</script>