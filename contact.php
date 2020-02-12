<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>ACPU | Contact Us</title>
	<link rel="icon" href="Images/favicon.png" type="image/png" sizes="20x21">
	<!--================== Cascaded Style Begins=====================-->
	<link rel="stylesheet" type="text/css" href="styles/style_magic_line_home.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/title.css">
	<!--link rel="stylesheet" type="text/css" href="styles/bottomContainer.css"-->
	<link rel="stylesheet" type="text/css" href="styles/footer.css">
	<link rel="stylesheet" type="text/css" href="styles/join.css" >
	<link rel="stylesheet" type="text/css" href="styles/Dropdown.css">
	<link rel="stylesheet" type="text/css" href="styles/contact_form.css">
	<link rel="stylesheet" type="text/css" href="styles/contactstyle.css">
	<!--link rel="stylesheet" type="text/css" href="styles/contrctstyle.css">
	<!--================== Cascaded Style Ends=====================-->
	<script type="text/javascript" src="jscript/jquery-2.js"></script>
	<script type="text/javascript" src="jscript/magicNav.js"></script>
</head>
<body style="background-image: url('Images/astrophotogrphy_orion.jpg');background-attachment: fixed;">
	<?php include('headerdiv.php'); ?>
	<!---==================Horizontal Navigation Bar Begins =====================--->
	<div id="nav-wrap" class="nav-wrap">
		<ul class="group" id="example-two">
			<li><a rel="#fe4902" href="index.php">Home</a></li>
			<li><a rel="#A41322" href="about.php">About</a></li>
			<li><a rel="#C6AA00" href="activities.php">Activities</a></li>
			<li><a rel="#900" href="meetings.php">Meetings</a></li>
			<li class="current_page_item_two"><a rel="#D40229" href="contact.php">Contact</a></li>
			<!--li><a rel="#98CEAA" a="" href="#login_form">Join</a></li-->
			<li id="magic-line-two" style="width: 73px; height: 40px; left: 0px;"></li>
		</ul>
	</div>
	<!---==================Horizontal Navigation Bar Ends =====================---> 
	<div id="pagecontent">
		<div id="contentwrapper">
			<div id="contactnote">
				<?php $keyword_info = 'contactinfo'; require_once('homeinfo.php'); ?>
				<?php include('contactinfo_updiv.php'); ?>
			</div>
			<?php include('form_process.php'); ?>
			<div id="contact_container">  
				<form id="contact" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
					<h3>Contact</h3>
					<h4>Please use the form below to get intouch with us</h4>
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
						<textarea class="message" value="<?= $message ?>" name="message" tabindex="5"></textarea>
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
<?php //include('joinform_form.php'); ?>
</div>
<?php include('footer.php'); ?>
</body>
</html>