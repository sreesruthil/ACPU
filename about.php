<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>ACPU | About Us</title>
	<link rel="icon" href="Images/favicon.png" type="image/png" sizes="20x21">
	<!--================== Cascaded Style Begins=====================-->
	<link rel="stylesheet" type="text/css" href="styles/style_magic_line_home.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/title.css">
	<link rel="stylesheet" type="text/css" href="styles/slider.css">
	<link rel="stylesheet" type="text/css" href="styles/bottomContainer.css">
	<link rel="stylesheet" type="text/css" href="styles/footer.css">
	<link rel="stylesheet" type="text/css" href="styles/join.css" >
	<link rel="stylesheet" type="text/css" href="styles/Dropdown.css">
	<link rel="stylesheet" type="text/css" href="styles/accordion.css">
	<!--link rel="stylesheet" type="text/css" href="styles/normalize.min.css"/-->
	<!--- For Ubuntu Fonts  --
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Arimo|Lato|Open+Sans" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
	<!--================== Cascaded Style Ends=====================-->
	<script type="text/javascript" src="jscript/jquery-2.js"></script>
	<script type="text/javascript" src="jscript/preefixfree.min.js"></script>
	<script src="jscript/magicNav.js"></script>
</head>
<body style="background-image: url('Images/astrophotogrphy_orion.jpg');background-attachment: fixed;">
	<?php include('headerdiv.php'); ?>
<!---==================Horizontal Navigation Bar Begins =====================--->
<div id="nav-wrap" class="nav-wrap">
  <ul class="group" id="example-two">
    <li ><a  rel="#fe4902" href="index.php">Home</a></li>
    <li class="current_page_item_two"><a  rel="#A41322" href="about.php">About</a></li>
    <li> <a  rel="#C6AA00" href="activities.php">Activities</a>
      <!--?php $keyword_pg="activity"; include('ActDropdowndiv.php'); ?-->
    </li>
    <li><a rel="#900" href="meetings.php">Meetings</a></li>
    <li><a  rel="#D40229" href="contact.php">Contact</a></li>
    <!--li><a  rel="#98CEAA" a="" href="#login_form">Join</a></li-->
    <li id="magic-line-two" style="width: 73px; height: 40px; left: 0px;"></li>
  </ul>
</div>
	<!---==================Horizontal Navigation Bar Ends =====================---> 
	<div id="pagecontent">
		<div id="contentwrapper">
			<?php $keyword_info = 'aboutinfo'; require_once('homeinfo.php'); ?>
			<div id="leftwrapper">
				<div id="leftsidemenu">
					<?php $pg_select="about"; include('home_downlinkdiv.php'); ?>
				</div>
			</div>
			<div id="rightcontent">
				<?php require_once('overviewdiv.php'); ?>
			</div> 
		</div>
		<!--==================footer and joining form=====================--> 
		<?php //include('joinform_form.php'); ?>
	</div>
	<?php include('footer.php'); ?>
</body>
</html>