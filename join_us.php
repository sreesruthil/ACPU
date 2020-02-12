<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!--?php 
	require_once('dbconfig.php');
	/*function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}*/
	/*if (empty($_GET["page"])) {
		die("Some error occured in parsing, Try again later.1");
		exit;
	} else {*/
		//$key_base_page = meetinginfo;
		/*// check if key_base_page only contains letters and underscore
		if (!preg_match("/^[a-zA-Z_]*$/",$key_base_page)) {
			die("Some error occured in parsing, Try again later.2"); 
			exit;
		}
	}*/
	// $sql = "SELECT * FROM base_page where home_info = 'meetinginfo'";
	// $result = $conn->query($sql);
	// if($result->num_rows == 1) {
		// // output data of each row
		// while($row = $result->fetch_assoc()) {
			// $pag_title =$row["title"];
			// $pag_homeinfo = $row["home_info"];
			// $pag_down_link = $row["down_link"];
			// $pag_right_content = $row["right_content"];
		// }
	// } else {
		// echo "0 results";
	// }
	// ?-->
	



	<title>ACPU | Join Us</title>
	<link rel="icon" href="Images/favicon.png" type="image/png" sizes="20x21">
	<!--================== Cascaded Style Begins=====================-->
	<link rel="stylesheet" type="text/css" href="styles/style_magic_line_home.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/title.css">
	<link rel="stylesheet" type="text/css" href="styles/bottomContainer.css">
	<link rel="stylesheet" type="text/css" href="styles/footer.css">
	<link rel="stylesheet" type="text/css" href="styles/join.css" >
	<link rel="stylesheet" type="text/css" href="styles/Dropdown.css">
	<link rel="stylesheet" type="text/css" href="styles/activity_portfolio.css">
		<link rel="stylesheet" type="text/css" href="styles/join_form.css">
	<link rel="stylesheet" type="text/css" href="styles/join_form_style.css">

	<!--- For Ubuntu Fonts  --
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Arimo|Lato|Open+Sans" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
	<!--================== Cascaded Style Ends=====================-->
	<script type="text/javascript" src="jscript/jquery-2.js"></script>
	<script type="text/javascript" src="jscript/magicNav.js"></script>

</script>
</head>
<body style="background-image: url('Images/M42.jpg');background-attachment:fixed";>
	<?php include('headerdiv.php'); ?>
	<!---==================Horizontal Navigation Bar Begins =====================--->
	<div id="nav-wrap" class="nav-wrap">
		<ul class="group" id="example-two">
			<li><a rel="#fe4902" href="index.php">Home</a></li>
			<li><a rel="#A41322" href="about.php">About</a></li>
			<li> <a rel="#C6AA00" href="activities.php">Activities</a></li>
			<li><a rel="#900" href="meetings.php">Meetings</a></li>
			<!--li><a rel="#900" href="gallery.php">Gallery</a></li-->
			<li class="current_page_item_two"><a rel="#D40229" href="contact.php">Contact</a></li>
			<!--li><a rel="#98CEAA" a="" href="#login_form">Join</a></li-->
			<li id="magic-line-two" style="width: 73px; height: 40px; left: 0px;"></li>
		</ul>
	</div>
	<!---==================Horizontal Navigation Bar Ends =====================---> 
	<div id="pagecontent">
		<div id="contentwrapper">
			<!--?php $keyword_info = $pag_homeinfo; require_once('homeinfo.php');?-->
			<!--div id="leftwrapper">
				<!--div id="leftsidemenu">
					<!--?php $pg_select= $pag_down_link; include('home_downlinkdiv.php'); ?>
				</div-->

			</div-->
			<div id="rightcontent" style="box-shadow: 0 0 0 0 inset;"> <!--?php if(empty($pg_select)){echo "style=\"width: 1000px;\"";};?-->
				<!--?php $rgt_cnt_info = $pag_right_content; require_once('right_cntntdiv.php');?-->
			<?php include('form_process.php'); ?>
			<div id="contact_container">  
				<form id="contact" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
					<h3>Join Us now !!!</h3>
					<h4 style="color:black;">Please furnish the following information to enroll in our mailing list.</h4>
					<fieldset>
						<input placeholder="Your name" type="text" name="name" value="<?= $name ?>" tabindex="1"><br><br>
						<span class="error">*<?= $name_error ?></span>
					</fieldset>
					<fieldset>
						<input placeholder="Your Email Address" type="text" name="email" value="<?= $email ?>" tabindex="2"><br><br>
						<span class="error">*<?= $email_error ?></span>
					</fieldset>
					<fieldset>
						<input placeholder="Your Phone Number" type="text" name="mobile" value="<?= $mobile ?>" tabindex="3"><br><br>
						<span class="error">*<?= $mobile_error ?></span>
					</fieldset>
					<fieldset>
						<textarea placeholder="How you are going to benifit by joining ACPU? " class="message" value="<?= $message ?>" name="message" tabindex="5"></textarea>
						<span class="error" style="position:relative; left: -130px; top:-30px;">*<?= $message_error ?></span>
					</fieldset>
					<fieldset>
						<button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
					</fieldset>
					<span class="success" style="position:relative; left: 250px; top:-170px;"><?= $message_success ?></span>
					<!--div class="success">< ?= $success ?></div-->
				</form>
			</div>
		</div>
	</div>
<!--==================footer and joining form=====================-->
<div>
			</div>
		</div>
		<!--==================footer and joining form=====================--> 
		<?php //include('joinform_form.php');?>  
	</div>
	<?php include('footer.php');?>  
</body>
</html>