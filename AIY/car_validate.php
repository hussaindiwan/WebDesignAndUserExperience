<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="keywords" content="" />
		<meta name="Gestured" content="" />
		<meta name="generator" content="WordPress 4.0" />
		<meta name="viewport" content="width=device-width">
		
		<title>Auction it yourself</title>
		
		<link rel="shortcut icon" href="http://learn.jquery.com/jquery-wp-content/themes/learn.jquery.com/i/favicon.ico">
		<link rel="stylesheet" href="http://jqueryui.com/jquery-wp-content/themes/jquery/css/base.css?v=1">
		<link rel="stylesheet" href="http://jqueryui.com/jquery-wp-content/themes/jqueryui.com/style.css">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
		
		<style>
			body{
				background: url(http://jqueryui.com/jquery-wp-content/themes/jquery/images/bg-footer-noise.jpg) repeat !important;
			}
		</style>

		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		<script src="http://learn.jquery.com/jquery-wp-content/themes/jquery/js/modernizr.custom.2.6.2.min.js"></script>
		<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
		<script>window.jQuery || document.write(unescape('%3Cscript src="//learn.jquery.com/jquery-wp-content/themes/jquery/js/jquery-1.9.1.min.js"%3E%3C/script%3E'))</script>
		<script src="http://learn.jquery.com/jquery-wp-content/themes/jquery/js/plugins.js"></script>
		<script src="http://learn.jquery.com/jquery-wp-content/themes/jquery/js/main.js"></script>
		<script src="http://use.typekit.net/wde1aof.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>	
	</head>
	<body class="jquery-learn home page page-id-17 page-template page-template-home-php page-slug-index single-author singular">
		<header>
		</header>
		<div id="container">
			<nav id="main" class="constrain clearfix">
				<div class="menu-top-container">
					<ul id="menu-top" class="menu">
						<li class="menu-item"><a href="AboutUs.php">About Us</a></li>
						<li class="menu-item"><a href="contact.php">Contact Us</a></li>
						<li class="menu-item"><a href="help.php">HELP</a></li>
						<li class="menu-item"><a href="whatorc.php">What is reverse auctioning?</a></li>
						<li class="menu-item"><a href="steps.php">Steps in reverse auctioning</a></li>
					</ul>
				</div>
			</nav>
			<div id="logo-events" class="constrain clearfix">
				<h2 class="logo"><a href="/" title="jQuery Learning Center">jQuery Learning Center</a></h2>
				<aside><div id="broadcast"></div></aside>
			</div>
			<!--<div id="logo-events" class="constrain clearfix">
				<h1 class="logo"><a href="/" title="auction it yourself">auction it yourself</a><h1>
				<p>reverse auctioning re-engineered</p>
				<aside><div id="broadcast"></div></aside>
			</div>-->
			<div id="content-wrapper" class="clearfix row">
				<div class="content-right twelve columns">
					<div id="content">
						 <p>
							<?php
								session_start();
								error_reporting(0);
								$carbrand=$_POST['carbrand'];
								$model=$_POST['model'];
								$carcolor=$_POST['carcolor'];
								$carbase=$_POST['carbase'];
								$comments=$_POST['comments'];
								$flag=0;
								if($carbrand&&$model&&$carcolor&&$carbase)
								{
									if(!ctype_alnum(str_replace(array(' ',"'",'-'),'',$carbrand)) && (!is_numeric($carbrand[0])))
									{
										$flag+=1;			
										echo "<font face='Courier New' size='+1' color='red'>";
										echo "Type of Car Brand is not accepted.<br/>";
										echo "</font>";
									}
									if(!ctype_alnum(str_replace(array(' ',"'",'-'),'',$model)))
									{
										$flag+=1;
										echo "<font face='Courier New' size='+1' color='red'>";
										echo "Enter valid car model<br/>";
										echo "</font>";
									}
									if(!ctype_alnum(str_replace(array(' ',"'",'-'),'',$carcolor)) && (!is_numeric($carcolor[0])))
									{
										$flag+=1;
										echo "<font face='Courier New' size='+1' color='red'>";
										echo "Enter valid car color<br/>";
										echo "</font>";
									}
									if(!is_numeric($carbase))
									{
										$flag+=1;
										echo "<font face='Courier New' size='+1' color='red'>";
										echo "Enter a valid base price<br/>";
										echo "</font>";				
									}
									if ( strlen ($comments)  == 0 )
									{
										$flag+=1;
										echo "<font face='Courier New' size='+1' color='red'>";
										echo "Post some additional delivery details<br/>";
										echo "</font>";
									}
								}
								else
								{
									$flag+=1;
									echo "<font face='Courier New' size='+1' color='red'>";
									echo "Please enter all the details<br/>";
									echo "</font>";
								}
							?>
							<?php
								//open database
								$connect=mysql_connect("localhost","root","root");
								mysql_select_db("phpregister");	
								if(!$connect)
								{
									echo "<font face='Courier New' size='+1' color='red'>";
									die('could not connect:'.mysql_error());
									echo "</font>";
								}
								//This code runs if the form has been submitted
								$uname = $_SESSION['username'];
								$pswd = $_SESSION['password'];
								$query=mysql_query("SELECT * FROM users WHERE username='$uname' AND password='$pswd'");
								$numrows=mysql_num_rows($query);
								$pid = mysql_result($query, 0, "uid");
								$ptype = mysql_result($query, 0, "type");
								$mbid = $_POST['mbid'];
								if($flag==0)
								{
									echo "<font face='Courier New' size='+1' color='red'>";
									echo "Your bid has been submitted successfully";
									echo "</font>";
									mysql_query("INSERT INTO car_db (`brand`, `model`, `color`, `basep`,`mbid`, `pid`, `comments`) VALUES ('$carbrand', '$model', '$carcolor', '$carbase', '$mbid', '$pid', '$comments');");	
								}
								else
								{
									echo "<font face='Courier New' size='+1' color='red'>";
									echo " Could not update database";
									echo "</font>";
								}
							?>
						</p>
					</div>
					<div id="sidebar" class="widget-area" role="complementary">
						<aside class="widget">
							<?php
								if($ptype==1)
									echo "<h3 class='widget-title'><a href='member.php'>Back</a></h3>";
								else
									echo "<h3 class='widget-title'><a href='member1.php'>Back</a></h3>";
							?>
							<h3 class='widget-title'><a href='logout.php'>Logout</a></h3>
						</aside>
					</div>
				</div>
			</div>
		</div>
		<footer class="clearfix simple">
			<div class="constrain">
				<div id="legal">
					<p class="copyright">Copyright 2014 Designed by Amey Kelekar</p>
				</div>
			</div>
		</footer>
	</body>
</html>