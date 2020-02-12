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
	$sql = "SELECT * FROM base_page where home_info = 'resinfo'";
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
	<link rel="stylesheet" type="text/css" href="styles/our_assets.css">
	

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
			<li><a rel="#900" href="meetings.php">Meetings</a></li>
			<!--li><a rel="#900" href="gallery.php">Gallery</a></li-->
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
			<div id="rightcontent_our_resources" style="width: 800px;" <?php if(empty($pg_select)){echo "style=\"width: 1000px;\"";};?>
				<!--?php $rgt_cnt_info = $pag_right_content; require_once('right_cntntdiv.php');?-->
				<ul class="our_assets">
					<li class="asset_item">Konusky-8 in Motorized Newtonian Telescope</li>
					<br>
					<img style="width:300px;height:160px;float:right;padding-left:10px;" src="Images/telescope_assembly.JPG" />
					<p class="asset_desc">&nbsp;&nbsp;Specifications:
					<div style="height:2px;font-size:1px;">&nbsp;</div>
					<ul style="padding-left:40px;">
					<li>Recommended for planetary observations and astrophotography</li>
					<li> Newtonian telescope with multicoated optics</li>
					<li>Diameter 200 mm (8"), focal lenght 1000 mm (40"), focal ratio f/5</li>
					<li>Equatorial mount with RA and Dec motors, Tracker enabled</li>
					<li>Metal tripod 73÷121 cm (2.4÷4.0 ft.)</li>
					<li>7x50 achromatic finderscope</li>
					<li>45° erecting prism and lunar filter</li>
					<li>Eyepieces Plossl 10 mm and Plossl 25 mm, diam. 31.8 mm (1".25)</li>
					<li>Magnification with supplied eyepieces 100x and 40x</li>
					</ul>
					</p>
					<br>
					<li class="asset_item">Nikon 3400D SLR Camera </li>
					<br>
					<!--img style="width:300px;height:160px;float:right;padding-left:10px;" src="Images/telescope_assembly.JPG" /-->
					<p class="asset_desc">The camera is in general used by coupling it to the telescope. By doing this we are 
					increasing the effective light collection area and the resolving power of the telescope. The camera has the following specifications
					<div style="height:2px;font-size:1px;">&nbsp;</div>
					<ul style="padding-left:40px;">
					<li>Entry Level DSLR Camera</li>
					<li> Effective Pixels: 18 Megapixels</li>
					<li> Image Sensor Type: CMOS</li>
					<li> Shutter Speed: 1/4000 to 30 seconds</li>
					<li>ISO Sensitivity: 100 to 25600</li>
					</ul>
					</p>
					<br>
					<li class="asset_item">LED Projector </li>
					<br>
					<!--img style="width:300px;height:160px;float:right;padding-left:10px;" src="Images/telescope_assembly.JPG" /-->
					<p class="asset_desc"> The projector is during weekly meetings for presentations. In addition to that it is of great use while we 
					organise events like Lunar eclipse, solar eclipse observations where a lot of curious minds turn up for our events en-masse. We can directly projet 
					the output of the camera to the projector enabling everyone to witness the event without the troubles of being on long queue.
					<div style="height:2px;font-size:1px;">&nbsp;</div>
					<ul style="padding-left:40px;">
					<li>Native Resolution: 600 by 480</li>
					<li> Suitable for projecting onto 120 inch screens</li>
					</ul>
					</p>
				</ul>
			</div>
		</div>
		<!--==================footer and joining form=====================--> 
		<?php //include('joinform_form.php');?>  
	</div>
	<?php include('footer.php');?>  
</body>
</html>