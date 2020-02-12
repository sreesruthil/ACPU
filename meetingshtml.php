<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<?php 
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
	$sql = "SELECT * FROM base_page where home_info = 'meet_annou_info'";
	$result = $conn->query($sql);
	if($result->num_rows == 1) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$pag_title =$row["title"];
			$pag_homeinfo = $row["home_info"];
			$pag_down_link = $row["down_link"];
			$pag_right_content = $row["right_content"];
		}
	} else {
		echo "0 results";
	}
	?>
	



	<title>ACPU | <?php echo $pag_title; ?></title>
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
	<link rel="stylesheet" type="text/css" href="styles/meeting_announcement.css">
	

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
			<li class="current_page_item_two"> <a rel="#C6AA00" href="activities.php">Activities</a></li>
			<!--li><a rel="#900" href="gallery.php">Gallery</a></li-->
			<li><a rel="#900" href="meetings.php">Meetings</a></li>
			<li><a rel="#D40229" href="contact.php">Contact</a></li>
			<!--li><a rel="#98CEAA" a="" href="#login_form">Join</a></li-->
			<li id="magic-line-two" style="width: 73px; height: 40px; left: 0px;"></li>
		</ul>
	</div>
	<!---==================Horizontal Navigation Bar Ends =====================---> 
	<div id="pagecontent">
		<div id="contentwrapper">
			<br>
			<?php $keyword_info = $pag_homeinfo; require_once('homeinfo.php');?>
			<div id="leftwrapper">
				<div id="leftsidemenu">
					<?php $pg_select= $pag_down_link; include('home_downlinkdiv.php'); ?>
				</div>

			</div>
			<div id="rightcontent" <?php if(empty($pg_select)){echo "style=\"width: 1000px;\"";};?>>
				<!--?php $rgt_cnt_info = $pag_right_content; require_once('right_cntntdiv.php');?-->
			<h3 style="color:white">We have on this week's meeting</h3>
					&nbsp
				<ul class="meeting_agenda">
					<li class="agenda_item">Video Screening: Roving Mars</li>
					<div style="height:10px;font-size:1px;">&nbsp;</div>
					<p class="agenda_desc">Roving Mars is an IMAX documentary film about the development, launch, and operation of the Mars Exploration Rovers, Spirit and Opportunity. The film uses few actual photographs from Mars, opting to use computer generated animation based on the photographs and data from the rovers and other Mars probes.  [-Wikipedia]</p>
					<div style="height:10px;font-size:1px;">&nbsp;</div>
					<li class="agenda_item">Talk on “Interplanetary Missions” </li>
					<div style="height:10px;font-size:1px;">&nbsp;</div>
					Speaker: Ms. Gauri Varma, Integrated M.sc ( 1st Year ), Dept Of Physics 
					<div style="height:10px;font-size:1px;">&nbsp;</div>
					<p>Summary of the Talk:
The talk explores the various aspects of some of the major interplanetary missions taken up by NASA, ESA, ISRO or various agencies in collaboration. Missions like Juno, New Horizons and Mangalyaan would be mentioned in detail. This talk and the discussion that follows would give us a glimpse on how we are able to plan and execute long term missions with utmost precision and its most exciting aspects.
</p>
					<div style="height:10px;font-size:1px;">&nbsp;</div>	
					<li class="agenda_item">Evening Sky Observation and Astrophotography</li>
					<div style="height:10px;font-size:1px;">&nbsp;</div>
					<p>Weather permitting, we will have an observation session with our motorized Newtonian telescope. We would also be capturing astrophotographs with our newly acquired DSLR camera. </p>
				
				</ul>
				<div style="height:20px;font-size:1px;">&nbsp;</div>
				<h3 style="text-align: center" >All are Welcome...! </h3>
			</div>
			
		</div>
		<!--==================footer and joining form=====================--> 
		<?php //include('joinform_form.php');?>  
	</div>
	<?php include('footer.php');?>  
</body>
</html>