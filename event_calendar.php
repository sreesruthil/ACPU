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
	$sql = "SELECT * FROM base_page where home_info = 'event_cal_info'";
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
	<link rel="stylesheet" type="text/css" href="styles/event_calendar_tooltip.css">
	
<!--For Vetical Event Timeline-->
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="styles/event_timeline_style.css"> <!-- Resource style -->
 
  	

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
<body style="background-image: url('Images/astrophotogrphy_orion.jpg');background-attachment:fixed";>
	<?php include('headerdiv.php'); ?>
	<!---==================Horizontal Navigation Bar Begins =====================--->
	<div id="nav-wrap" class="nav-wrap">
		<ul class="group" id="example-two">
			<li><a rel="#fe4902" href="index.php">Home</a></li>
			<li><a rel="#A41322" href="about.php">About</a></li>
			<li class="current_page_item_two"> <a rel="#C6AA00" href="activities.php">Activities</a></li>
			<li><a rel="#900" href="meetings.php">Meetings</a></li>
			<li><a rel="#D40229" href="contact.php">Contact</a></li>
			<!--li><a rel="#98CEAA" a="" href="#login_form">Join</a></li-->
			<li id="magic-line-two" style="width: 73px; height: 40px; left: 0px;"></li>
		</ul>
	</div>
0	<!---==================Horizontal Navigation Bar Ends =====================---> 
	<div id="pagecontent">
		<div id="contentwrapper">
			<br>
			<?php $keyword_info = $pag_homeinfo; require_once('homeinfo.php');?>
			<!--div id="leftwrapper">
				<!--div id="leftsidemenu">
					<!--?php $pg_select= $pag_down_link; include('home_downlinkdiv.php'); ?>
				</div-->
			<div id="rightcontent"> <!--?php if(empty($pg_select)){echo "style=\"width: 1000px;\"";};?-->
			<!--?php $rgt_cnt_info = $pag_right_content; require_once('right_cntntdiv.php');?-->
				<?php
				$sql = "SELECT * FROM event_cal where e_time='future' order by e_id desc, ul_ind asc";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					echo"<h3 style=\"color:white\">Upcoming Events</h3>
						<ul class=\"event_list\">";
					while($row = $result->fetch_assoc()) {
						if(1==$row["ul_F_L"] || 13==$row["ul_F_L"]){
						echo "<li>
							<div id=\"event_name\" class=\"tooltip\">".$row["e_name"]."
								<div class=\"right_tooltip\">
									<div class=\"text-content\">";
						}
						echo"
										<h3>".$row["e_head"]."</h3>
										<ul class=\"event_desc\">";
										if(""!=$row["img_nam"]){echo"
											<img style=\"width:140px;height:100px;float:".$row["e_flot"].";padding-".$row["e_pad"].":10px;\" src=\"Images/".$row["img_nam"].".".$row["imtype"]."\" />";
										}
											if(""!=$row["e_li1"]){echo"<li class=\"event_details\">".$row["e_li1"]."</li>";}
											if(""!=$row["e_li2"]){echo"<li class=\"event_details\">".$row["e_li2"]."</li>";}
											if(""!=$row["e_li3"]){echo"<li class=\"event_details\">".$row["e_li3"]."</li>";}
											if(""!=$row["e_li4"]){echo"<li class=\"event_details\">".$row["e_li4"]."</li>";}
										echo"</ul>";
										
										
						if(3==$row["ul_F_L"] || 13==$row["ul_F_L"]){	
									echo "</div>
									<i></i>
								</div>	
							</div>
						</li>";
						}
					}
					echo"</ul>
					<br>";
				}
				?>
				<?php
				$sql = "SELECT * FROM event_cal where e_time='past' order by e_id desc, ul_ind asc";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					$event_id=1;
					// output data of each row
					echo"<h3 style=\"color:white\">Past Events</h3>
						<ul class=\"event_list\">";
					while($row = $result->fetch_assoc()) {
						if(1==$row["ul_F_L"] || 13==$row["ul_F_L"]){
						echo "<li>
							<div id=\"event_name\" class=\"tooltip\">".$row["e_name"]."
								<div class=\"right_tooltip\">
									<div class=\"text-content\">";
						}
						echo"
										<h3>".$row["e_head"]."</h3>
										<ul class=\"event_desc\">";
										if(""!=$row["img_nam"]){echo"
											<img style=\"width:140px;height:100px;float:".$row["e_flot"].";padding-".$row["e_pad"].":10px;\" src=\"Images/".$row["img_nam"].".".$row["imtype"]."\" />";
										}
											if(""!=$row["e_li1"]){echo"<li class=\"event_details\">".$row["e_li1"]."</li>";}
											if(""!=$row["e_li2"]){echo"<li class=\"event_details\">".$row["e_li2"]."</li>";}
											if(""!=$row["e_li3"]){echo"<li class=\"event_details\">".$row["e_li3"]."</li>";}
											if(""!=$row["e_li4"]){echo"<li class=\"event_details\">".$row["e_li4"]."</li>";}
										echo"</ul>";
										
										
						if(3==$row["ul_F_L"] || 13==$row["ul_F_L"]){	
									echo "</div>
									<i></i>
								</div>	
							</div>
						</li>";
						}
					}
					echo"</ul>";
				}
				?>
				
		</div>
	</div>
		<!--==================footer and joining form=====================--> 
		<?php //include('joinform_form.php');?>  
	<?php include('footer.php');?>  
</body>
</html>