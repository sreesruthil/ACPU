<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ACPU | Home</title>
<link rel="icon" href="Images/favicon.png" type="image/png" sizes="20x21"> 
<!--================== Cascaded Style Begins=====================-->
<link rel="stylesheet" type="text/css" href="styles/style_magic_line_home.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/title.css">
<link rel="stylesheet" type="text/css" href="styles/slider.css">
<link rel="stylesheet" type="text/css" href="styles/bottomContainer.css">
<link rel="stylesheet" type="text/css" href="styles/footer.css">
<link rel="stylesheet" type="text/css" href="styles/newsticker.css">
<link rel="stylesheet" type="text/css" href="styles/join.css" >
<link rel="stylesheet" type="text/css" href="styles/Dropdown.css">
<!--================== Cascaded Style Ends=====================-->
<script type="text/javascript" src="jscript/jquery-2.js"></script>
<script type="text/javascript" src="jscript/jquery_002i.js"></script>
<script type="text/javascript">
	$('#slider').cycle({
		timeout:		1000,
		next:			'#next',
		prev:		'#previous',
		pager:			'#pager',
		pause: 		1
	});
</script>
<script type="text/javascript">
$(document).ready(function() {
	$('.standard').hover(
		function(){
			$(this).find('.caption').show();
		},
		function(){
			$(this).find('.caption').hide();
		}
	);
	$('.fade').hover(
		function(){
			$(this).find('.caption').fadeIn(250);
		},
		function(){
			$(this).find('.caption').fadeOut(250);
		}
	);
	$('.slide').hover(
		function(){
			$(this).find('.caption').slideDown(250);
		},
		function(){
			$(this).find('.caption').slideUp(250);
		}
	);
});
</script>
<script src="jscript/magicNav.js"></script>
</head>
<body style="opacity:1; background-image: url('Images/astrophotogrphy_orion.jpg');background-attachment:fixed";opacity:0.9>
<?php include('headerdiv.php'); ?>
<!---==================Horizontal Navigation Bar Begins =====================--->
<div id="nav-wrap" class="nav-wrap">
  <ul class="group" id="example-two">
    <li class="current_page_item_two"><a rel="#fe4902" href="#">Home</a></li>
    <li><a rel="#A41322" href="about.php">About</a></li>
    <li class="dropdown"> <a rel="#C6AA00" href="activities.php">Activities</a>
      <!--?php $keyword_pg="activity"; include('ActDropdowndiv.php'); ?-->
    </li>
    <li><a rel="#900" href="meetings.php">Meetings</a></li>
    <li><a rel="#D40229" href="contact.php">Contact</a></li>
    <!--li><a rel="#98CEAA" a="" href="#login_form">Join</a></li-->
    <li id="magic-line-two" style="width: 73px; height: 40px; left: 0px;"></li>
  </ul>
</div>
<!---==================Horizontal Navigation Bar Ends =====================---> 
<!--================== Image Slider and Notification area begins =====================-->
<div id="pagecontent">
<script>
   $(document).ready(function(){
	   $(window).bind('scroll', function() {
	   var navHeight = $( window ).height() - 70;
			 if ($(window).scrollTop() > navHeight) {
				 $('nav').addClass('fixed');
			 } 
			 else {
				 $('nav').removeClass('fixed');
			 }
		});
	});
</script>
<?php require_once('newsdiv.php'); ?>
<!---=======Script for News ticker begins -->
<script src="jscript/jqueryi.js"></script>
<script>
$(function(){
		$('.newsticker').easyTicker({
		visible: 1,
		interval:3000
	});
});
</script>
<div id="contentwrapper">
	<div id="sliderbox">  <!--opening Slderbox-->
		<?php require_once('imsliderdiv.php'); ?>
		<?php $keyword_info = 'homeinfo'; require_once('homeinfo.php'); ?>
		<a href="about.php"><button class="button_home" style="vertical-align:middle"><span>Explore More </span></button></a>
	
	</div>
  <!--================== closing Image slider and notification area end =====================--> 
  <!--================== Second Row of Home page =====================-->
  <div class="bottomcontainer">  <!--open bottom container-->
    <!---opening vertical navigation menu--->
	<?php $pg_select="home"; include('home_downlinkdiv.php'); ?>
	<!---Closing vertical navigation menu--->
    
     <!---=========Opening bottom image containers=====--->
	<div id="bottomwrapper">
		<div class="grid-block-container">
			<?php include('gridsliddiv.php'); ?>
		</div>
	</div>
   </div>
  </div>
</div>
<?php
//include('joinform_form.php');
?>
</div>
<?php include('footer.php');?>
</body></html>