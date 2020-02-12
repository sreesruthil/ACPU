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
	
	    <link rel="stylesheet" type="text/css" href="styles/meeting_accordion_demo.css" />
        <link rel="stylesheet" type="text/css" href="styles/meeting_accordion_style.css" />
		<script type="text/javascript" src="jscript/modernizr.custom.29473.js"></script>

	<!--- For Ubuntu Fonts  --
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Arimo|Lato|Open+Sans" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
	<!--================== Cascaded Style Ends=====================-->
	<script type="text/javascript" src="jscript/jquery-2.js"></script>
	<script type="text/javascript" src="jscript/magicNav.js"></script>
	
	
	
	
	<!---articles for Vertical News ticker-->	
<link rel="stylesheet" href="styles/style__vertical_newsticker.css" type="text/css" media="screen" />
<script src="jscript/jquery-vertical_newsticker.js" type="text/javascript"></script>
<script src="jscript/jcarousellite_vertical_newsticker.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$(".newsticker-jcarousellite").jCarouselLite({
		vertical: true,
		hoverPause:true,
		visible: 3,
		auto:500,
		speed:1000
	});
});
</script>
</head>
<body style="background-image: url('Images/astrophotogrphy_orion.jpg');background-attachment:fixed";>
	<?php include('headerdiv.php'); ?>
	<!---==================Horizontal Navigation Bar Begins =====================--->
	<div id="nav-wrap" class="nav-wrap">
		<ul class="group" id="example-two">
			<li><a rel="#fe4902" href="index.php">Home</a></li>
			<li><a rel="#A41322" href="about.php">About</a></li>
			<li> <a rel="#C6AA00" href="activities.php">Activities</a></li>
			<li class="current_page_item_two"><a rel="#900" href="#">Meetings</a></li>
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
				<!--div id="leftsidemenu">
					<!--?php $pg_select= $pag_down_link; include('home_downlinkdiv.php'); ?>
				</div-->
				<div id="newsticker-demo">    
					<div class="title">Upcoming Meetings</div>
					<div class="newsticker-jcarousellite">
						<?php
						$sql = "SELECT * FROM meetings_futur order by ID";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							echo"<ul>";
							while($row = $result->fetch_assoc()) {
								echo "<li>
									<div class=\"thumbnail\">
										<img src=\"Images/".$row["img_nam"].".".$row["imtype"]."\">
									</div>
									<div class=\"info\">
										<a href=\"".$row["a_href"]."\">".$row["a_name"]."</a>
										<span class=\"cat\">".$row["categry"]."</span>
									</div>
									<div class=\"clear\"></div>
								</li>";
							}
							echo"</ul>";
						}
						?>
					</div>
				</div>	
			</div>
			<div id="rightcontent_meetings"> <!--?php if(empty($pg_select)){echo "style=\"width: 1000px;\"";};?-->
				<!--?php $rgt_cnt_info = $pag_right_content; require_once('right_cntntdiv.php');?-->
				<h2>List of Weekly Meetings</h2>				
				<?php
				$sql = "SELECT * FROM meet_report order by Meet_id desc, para_ord asc";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					$para_id=1;
					// output data of each row
					echo"<section class=\"ac-container\">";
					while($row = $result->fetch_assoc()) {
						if(1==$row["para_F_L"] || 13==$row["para_F_L"]){
							echo"<div>
								<input id=\"ac-".$row["Meet_id"]."\" name=\"accordion-1\" type=\"radio\" "; if(1==$para_id){echo "checked";$para_id++;}; echo "/>
								<label for=\"ac-".$row["Meet_id"]."\">".$row["Title"]."</label>
								<article class=\"ac-".$row["Artcl_class"]."\">";
						}
						if(""!=$row["subtitle"]){echo"<h3 style=\"padding-left:20px; padding-top:10px;\">".$row["subtitle"]."</h3>";}
						if(""!=$row["Speaker"]){echo "<h4 style=\"padding-left:20px; padding-top:0px;\">".$row["Speaker"]."</h4>";}
						if(""!=$row["Para"] || ""!=$row["img_nam"]){echo "<p>";
							if(""!=$row["img_nam"]){echo "<img src=\"Images/".$row["img_nam"].".".$row["imtype"]."\" style=\"float: ".$row["im_float"]."; padding:10px;\" width=\"180px\"; height=\"120\">";}
						echo $row["Para"]."</p>";}
								
						if(3==$row["para_F_L"] || 13==$row["para_F_L"]){
							echo"</article>
							</div>";
						}
					
					}
					echo"</section>";
				}
				?>
			</div>
		</div>
		<!--==================footer and joining form=====================--> 
		<?php //include('joinform_form.php');?>  
	</div>
	<?php include('footer.php');?>  
</body>
</html>