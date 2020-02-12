<?php
	ob_start();
	session_start();
	// if session is not set this will redirect to login page
	if(!isset($_SESSION['user'])){
		header("Location: index.php");
		exit;
	}
	// if session not for acpu this will redirect to login page
	if(!isset($_SESSION['web_pg_nam'])){
		unset($_SESSION['user']);
		session_unset();
		session_destroy();
		header("Location: index.php");
		exit;
	} else if ($_SESSION['web_pg_nam']!='acpu'){
		//this ensures that session is for acpu
		unset($_SESSION['user']);
		unset($_SESSION['web_pg_nam']);
		session_unset();
		session_destroy();
		header("Location: index.php");
		exit;
	}
	// if session timed out this will redirect to login page
	if (!isset($_SESSION['created'])){
		unset($_SESSION['user']);
		unset($_SESSION['web_pg_nam']);
		session_unset();
		session_destroy();
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
	// select loggedin users detail
	require_once('../dbconfig.php');
	$sql = "SELECT * FROM users WHERE USERID='".$_SESSION['user']."';";
	$result = $conn->query($sql);
	$count = $result->num_rows; // if uname/pass correct it returns must be 1 row
	if($count == 1){$row = $result->fetch_assoc();
		if ($row['active'] != 1){
			unset($_SESSION['user']);
			session_unset();
			session_destroy();
			die("Account is not activated, contact the admin");
			header("Location: index.php");
			exit;
		};
	}else{
		unset($_SESSION['user']);
		session_unset();
		session_destroy();
		header("Location: index.php");
		exit;};
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome | <?php echo $row['USERNAME']; ?></title>
	<script type="text/javascript">
		function swaphid() {
			var a= document.getElementById('shformtd');
			if(a.style.display == ''){
				a.style.display = 'none';
			} else {
				a.style.display = '';
			};
		}; 
	</script>
</head>
<body>
    <div class="container">
		Welcome&nbsp; |&nbsp; 
		<a href="#"><span><?php echo $row['USERNAME']." ".$_SESSION['created']; ?><span></a>&nbsp; |&nbsp;
		<a href="logout.php?logout">Sign Out</a>
    </div>
	<div align="center"><h1>ADMIN'S PANEL - <a href="instructions.php">User Guide</a></h1></div>
	<div>|-----___0_________1____------2----home---____3_________4___--|--5-About--|--_____-6-_______-61-_-Activities-_-7_--____-8-________-9-___---|-_event91_-|--__10__-Contact-11___--|
	<?php if($row['ISDEFAULT']=='T'){
		echo "-_14_--|";
	};?></div>
	<div>
	<input type="submit" onclick="showpage(0, 'showform0');" value="News Sticker">
	<input type="submit" onclick="showpage(1, 'showform1');" value="Image slider">
	<input type="submit" onclick="showpage(2, 'showform2');" value="Home info">
	<input type="submit" onclick="showpage(3, 'showform3');" value="Vertical Nav">
	<input type="submit" onclick="showpage(4, 'showform4');" value="Grid slider">
	<input type="submit" onclick="showpage(5, 'showform5');" value="Overview">
	<input type="submit" onclick="showpage(6, 'showform6');" value="Future Meeting">
	<input type="submit" onclick="showpage(61, 'showform61');" value="Meet_Reports">
	<input type="submit" onclick="showpage(7, 'showform7');" value="Actbox">
	<input type="submit" onclick="showpage(8, 'showform8');" value="Base page">
	<input type="submit" onclick="showpage(9, 'showform9');" value="Right content">
	<input type="submit" onclick="showpage(91, 'showform91');" value="Event cal">
	<input type="submit" onclick="showpage(10, 'showform10');" value="Messages">
	<input type="submit" onclick="showpage(11, 'showform11');" value="Contact info">
	<!input type="submit" onclick="showpage(12, 'showform12');" value="Join details" disabled>
	<!input type="submit" onclick="showpage(13, 'showform13');" value="Articles" disabled>
	<?php if($row['ISDEFAULT']=='T'){
		echo "<input type=\"submit\" onclick=\"showpage(14, 'showform14');\" value=\"Users\">";
	};?>
	</div>
	<div>
		<table cellpadding="5" border="1" style="display: none;" id="shfrom_table">
			<tbody>
				<tr>
					<td valign="top" id="shformtd">
						<div class="shform" id="showform0" style="display: none;"><?php require_once('news_form.php'); ?></div>
						<div class="shform" id="showform1" style="display: none;"><?php require_once('imgslid_form.php'); ?></div>
						<div class="shform" id="showform2" style="display: none;"><?php require_once('homeinfo_form.php'); ?></div>
						<div class="shform" id="showform3" style="display: none;"><?php require_once('homedownlink_form.php'); ?></div>
						<div class="shform" id="showform4" style="display: none;"><?php require_once('gridslid_form.php'); ?></div>
						<div class="shform" id="showform5" style="display: none;"><?php require_once('overview_form.php'); ?></div>
						<div class="shform" id="showform6" style="display: none;"><?php require_once('meeting_form.php'); ?></div>
						<div class="shform" id="showform61" style="display: none;"><?php require_once('meet_report_form.php'); ?></div>
						<div class="shform" id="showform7" style="display: none;"><?php require_once('actbox_form.php'); ?></div>
						<div class="shform" id="showform8" style="display: none;"><?php require_once('Base_page_form.php'); ?></div>
						<div class="shform" id="showform9" style="display: none;"><?php require_once('right_cntnt_form.php'); ?></div>
						<div class="shform" id="showform91" style="display: none;"><?php require_once('event_cal_form.php'); ?></div>
						<div class="shform" id="showform10" style="display: none;"><?php require_once('msg_form.php'); ?></div>
						<div class="shform" id="showform11" style="display: none;"><?php require_once('contactinfo_form.php'); ?></div>
						<div class="shform" id="showform12" style="display: none;"><?php //require_once('join_form.php'); ?></div>
						<div class="shform" id="showform13" style="display: none;"><?php  ?></div>
						<div class="shform" id="showform14" style="display: none;"><?php if($row['ISDEFAULT']=='T'){require_once('Admins_form.php');}; ?></div>
					</td>
					<td valign="top">
						<div id="pgshw">
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		1. Security (change, message, join)<br>
		2. Contact upper info<br>
		3. Cleansing<br>
		4. Mailto<br>
		5. base_page line 25<br>
	</div>
	<script>
	var x, y;
	function showpage(x, y){
		var array_shform = document.getElementsByClassName("shform");
		var i;
		for (i = 0; i < array_shform.length; i++) {
			array_shform[i].style.display = "none";
		}
		document.getElementById(y).style.display = "block";
		document.getElementById("shfrom_table").style.display = "";
		var data = new FormData;
		data.append('pgcode', x+1);
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("pgshw").innerHTML = this.responseText;
				};
			};
		xmlhttp.open("POST", "showpg.php", true);
		xmlhttp.send(data);
	}
	</script>
	<?php require_once('change_entry.php'); ?>
</body>
</html>
<?php ob_end_flush(); $conn->close();?>