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
<h3 onclick="swaphid();">Insert details of Base Page</h3>
<form id="form8" name="form8" enctype="multipart/form-data">
<table>
	<tr>
		<td title="Enter ID to update/delete an entry">ID</td><td><input type="TEXT" name="idno8" id="idno8"></td>
	</tr>
	<tr>
		<td title="Title of the page to be produced">Title</td><td><input type="TEXT" name="title8" id="title8"></td>
	</tr>
	<tr>
		<td title="Keyword to select info from home_info table for the introductory part just below the navigation bar">Home_info</td><td><input type="TEXT" name="home_info8" id="home_info8"></td>
	</tr>
	<tr>
		<td title="Keyword to select vertical Nav links from home_link_down table">Down_link</td><td><input type="TEXT" name="down_link8" id="down_link8"></td>
	</tr>
	<tr>
		<td title="Keyword to select right content from right_cntnt table">Right_content</td><td><input type="TEXT" name="right_content8" id="right_content8"></td>
	</tr>
	<tr>
		<td><input onclick="insrtBasePage(1);" type="button" value="Insert" id="submit" name="submit"></td>
		<td> <input onclick="insrtBasePage(2);" type="button" value="Update" id="Update" name="Update"></td>
	</tr>
	<tr>
		<td><input onclick="insrtBasePage(3);" type="button" value="Delete" id="Delte" name="Delte"></td>
		<td>Be happy</td>
	</tr>
</table>
</form>
<script>
function insrtBasePage(xy){
	var xidno = document.getElementById("idno8").value;
	var xtitle = document.getElementById("title8").value;
	var xhome_info = document.getElementById("home_info8").value;
	var xdown_link = document.getElementById("down_link8").value;
	var xright_content = document.getElementById("right_content8").value;
	var data = new FormData;
	data.append('XID', xy);
	if(xy == 2 || xy == 3 ) {
	data.append('ID', xidno);
	};
	if(xy == 1 || xy == 2 ) {
	data.append('title', xtitle);		
	data.append('home_info', xhome_info);
	data.append('down_link', xdown_link);
	data.append('right_content', xright_content);
	};
	var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        };
    };
	xhr.open("POST", "Base_page_change.php", true);
	xhr.send(data);
};
</script>