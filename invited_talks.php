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
	$sql = "SELECT * FROM base_page where home_info = 'meetinginfo'";
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
			<div id="rightcontent" <?php if(empty($pg_select)){echo "style=\"width: 900px;\"";};?>
				<!--?php $rgt_cnt_info = $pag_right_content; require_once('right_cntntdiv.php');?-->
			<h3 style="color:white">A peek into the Legends Universe </h3>
					&nbsp
				<ul class="meeting_agenda">
					<li class="agenda_item">04.10.2013 &nbsp;&nbsp;   Surface Photometry of Galaxies</li>
					<div style="height:10px;font-size:1px;">&nbsp;</div>
					<img style="width:260px;height:180px;float:left;padding-right:10px;" src="Images/alok_talk.png" />
					<p class="agenda_desc">Speaker: Dr.Alok Sharan </p>
			<div style="height:10px;font-size:1px;">&nbsp;</div>
					<p class="agenda_desc">About the Speaker: Assistant Professor at Dept of Physics Pondicherry University,he is also the coordinator of the astroclub.</p>
					<div style="height:10px;font-size:1px;">&nbsp;</div>
					<p>Summary of the Talk: He familiarized us with various analysis techniques of images acquired using telescopes in laymans terms.He also elucidated about the detection techniques used to identify various radiations and how analyze at various frequency specturms to understand a variety of information.  

</p>
			<div style="height:10px;font-size:1px;">&nbsp;</div>
<li class="agenda_item">13.12.2013 &nbsp;&nbsp;   Adaptive Optics</li>
					<div style="height:10px;font-size:1px;">&nbsp;</div>
					<img style="width:260px;height:180px;float:right;padding-left:10px;" src="Images/rps_talk.png" />
					<p class="agenda_desc">Speaker:Mr. Kalyan Kumar RPS</p>
			<div style="height:10px;font-size:1px;">&nbsp;</div>
					<p class="agenda_desc">About the Speaker: Alumni of Pondicherry University who is presently doing his PhD in Max Planck Research Institute, Hedelberg </p>
					<div style="height:10px;font-size:1px;">&nbsp;</div>
					<p>Summary of the Talk:He gave a talk on Introductory Adaptive optics his area of specialization and the prposed advancements possible in the field of astronomy with reduction of atmospheric noise using adaptive optics . He also interacted with the club members and gave valuable insights regarding the science of Astronomy.
 

</p>
			<div style="height:10px;font-size:1px;">&nbsp;</div>
<li class="agenda_item">27.02.2014 &nbsp;&nbsp;   Astronomy 101</li>
					<div style="height:10px;font-size:1px;">&nbsp;</div>
					<img style="width:260px;height:180px;float:left;padding-right:10px;" src="Images/karthick_talk.png" />
					<p class="agenda_desc">Speaker:Dr. Chrisphin Karthick </p>
			<div style="height:10px;font-size:1px;">&nbsp;</div>
					<p class="agenda_desc">About the Speaker:  Former faculty in the Dept. of Astrophysics, Pondicherry University</p>
					<div style="height:10px;font-size:1px;">&nbsp;</div>
					<p>Summary of the Talk:He explained about basic astronomic techniques and methods like identification of the constellations etc.He also gave a short speech on differentiating stars and planets that we see on our night sky and various astrnomical phenomenons and their importance.
 

					</p>
			<div style="height:10px;font-size:1px;">&nbsp;</div>
<li class="agenda_item">17.10.14 &nbsp;&nbsp;   Low light level detectors in Astronomy</li>
					<div style="height:10px;font-size:1px;">&nbsp;</div>
					<img style="width:250px;height:160px;float:right;padding-left:10px;" src="Images/paranjpye_talk.png" />
					<p class="agenda_desc">Speaker:Mr. Arvind Paranjpye</p>
			<div style="height:10px;font-size:1px;">&nbsp;</div>
					<p class="agenda_desc">About the Speaker: Director Nehru Planetarium, Nehru Centre, Mumbai</p>
					<div style="height:10px;font-size:1px;">&nbsp;</div>
					<p>Summary of the Talk:He mainly talked about Low Level Light detectors in the field of astronomy and its applications in the same.He also took a workshop on mirror grinding which proved to be great value inspiring us is to start our own mirror grinding sessions.
					</p>
					<div style="height:10px;font-size:1px;">&nbsp;</div>
<li class="agenda_item">16.12.16: &nbsp;&nbsp;   Mars Orbiter Mission 	</li>
					<div style="height:10px;font-size:1px;">&nbsp;</div>
					<!--img style="width:240px;height:180px;float:right;padding-left:10px;" src="Images/astrophotogrphy_orion.jpg" /-->
					<p class="agenda_desc">Speaker:Dr. S.M.Ahmed</p>
			<div style="height:10px;font-size:1px;">&nbsp;</div>
					<p class="agenda_desc">About the Speaker:Former scientist at ISRO, Part of the Chandrayan Project</p>
					<div style="height:10px;font-size:1px;">&nbsp;</div>
					<p>Summary of the Talk:He elucidated on the problems faced in space travel and the huge expenses incurred in the launch of satellites and how India came to the forefront of space exploration by the ingenious utiliztion of resources. He enthralled us with the details about the discovery of traces of water and methane and the impact that it would be having on the scientific community across the globe.</p>
			<div style="height:10px;font-size:1px;">&nbsp;</div>
<li class="agenda_item">24.08.18 &nbsp;&nbsp;   Spectro Photometery</li>
			<div style="height:10px;font-size:1px;">&nbsp;</div>
					<img style="width:240px;height:180px;float:left;padding-right:10px;" src="Images/paranjpye_talk.png" />
					<p class="agenda_desc">Speaker:</p>
			<div style="height:10px;font-size:1px;">&nbsp;</div>
					<p class="agenda_desc">About the Speaker:Faculty Indian Institute Of Astrophysics ,Banglore</p>
					<div style="height:10px;font-size:1px;">&nbsp;</div>
					<p>Summary of the Talk:Being an expert hailing from the Indian Institute Of Astronomy he was able to provide us with a deep insight into various image detection and modelling techniques used in Photometery enabling us to get a deep understanding into nuances present in the area, he enthralled us many seemingly simple but extremely effective methods to analyse a astrophotograph using our naked eyes. He suggested various open source softwares which can be used for Photometry and image analysis. He was more than happy to clear our queries and doubts.
					</p>
			<div style="height:10px;font-size:1px;">&nbsp;</div>
				</ul>
			</div>
			
		</div>
		<!--==================footer and joining form=====================--> 
		<?php //include('joinform_form.php');?>  
	</div>
	<?php include('footer.php');?>  
</body>
</html>