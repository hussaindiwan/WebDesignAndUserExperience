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
						<li class="menu-item"><a href="login.html">Home</a></li>
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
						<?php
							error_reporting(0);
							session_start();
							$co_brand=100;
							$co_ram=100;
							$co_color=100;
							$co_os=100;
							$co_hdd=100;
							$co_grap=100;
							$co_proc=100;
							$max=0;
							$max_id=0;
							$connect=mysql_connect("localhost","root","root") or die("Could not connect");
							mysql_select_db("phpregister") or die("Could not find database");
							$uname=$_SESSION['username'];
							$pswd=$_SESSION['password'];
							$query2=mysql_query("SELECT * FROM users WHERE username='$uname' AND password='$pswd'");
							$person_id = mysql_result($query2, 0, "uid");
							$id = $_GET['id'];
							$typ=$_GET['type']."_db";
							$query=mysql_query("SELECT * FROM $typ WHERE mbid=0 AND pid='$person_id' AND cid=$id");
							for($l=0;$l<5;$l++)
							{
								$sum[$l]=0;
							}
							$mid=mysql_result($query,0,"cid");
							$query1=mysql_query("SELECT * FROM comp_db WHERE mbid='$mid'");
							$nn=mysql_num_rows($query1);
							for($j=0;$j<$nn;$j++)
							{
								if(mysql_result($query1,$j,"cbrand")==mysql_result($query,$i,"cbrand"))
									$co_brand+=100;	
								if(mysql_result($query1,$j,"processor")==mysql_result($query,$i,"processor"))
								{
									$co_proc+=100;	
								}
								else
								{
								$co_proc+=25;
								}
								if(mysql_result($query1,$j,"color")==mysql_result($query,$i,"color"))
								{
									$co_color+=100;	
								}
								else
								{
									$co_color+=25;
								}	
								if(mysql_result($query1,$j,"os")==mysql_result($query,$i,"os"))
								{
									$co_os+=100;		
								}
								else
								{
									$co_os+=25;
								}
								if(mysql_result($query1,$j,"ram")==mysql_result($query,$i,"ram"))
								{
									$co_ram+=100;		
								}
								else
								{
									$co_ram+=25;
								}
								if(mysql_result($query1,$j,"graphic")==mysql_result($query,$i,"graphic"))
								{
									$co_grap+=100;			
								}
								else
								{
									$co_grap+=25;	
								}
								
								if(mysql_result($query1,$j,"hdd")==mysql_result($query,$i,"hdd"))
								{
									$co_hdd+=100;		
								}
								else
								{
									$co_hdd+=25;
								}
								$sum[$j]+=$co_brand+$co_ram+$co_color+$co_os+$co_hdd+$co_proc+$co_grap;
								if(mysql_result($query1,$j,"cbase")<=mysql_result($query,$i,"cbase"))
								{
									$sum[$j]+=200;
								}
								else
								{
									$sum[$j]-=200;
								}
								if($sum[$j]>=$max)
								{
									$max=$sum[$j];
									$max_id=$j;
								}
								$co_brand=100;
								$co_ram=100;
								$co_color=100;
								$co_os=100;
								$co_hdd=100;
								$co_grap=100;
								$co_proc=100;
							}
							$pname=mysql_result($query1,$max_id,"pid");
							$ppname=mysql_query("SELECT * FROM users WHERE uid=$pname");
							$pppname=mysql_result($ppname,0,"fullname");
							if($nn!=0)
							{
								echo "<font face='Comic Sans MS' size='+1'>";  
								echo "The Seller with the best bid is: ";
								echo $pppname;
								echo "<a href='creditcard.html'>(Payment)</a>";
								echo "<br/>";
								echo "<font color='red'>";
								echo mysql_result($query1,$max_id,"cbrand")." ";
								echo mysql_result($query1,$max_id,"os")." ";
								echo mysql_result($query1,$max_id,"color")." ";
								echo mysql_result($query1, $max_id, "ram")." ";
								echo mysql_result($query1, $max_id, "processor")." ";
								echo mysql_result($query1, $max_id, "hdd")." ";
								echo mysql_result($query1, $max_id, "graphic")." ";
								echo mysql_result($query1, $max_id, "cbase")." ";
								echo "</font>";
								echo "<br/>";
								echo "</font>";
							}
							else
							{
								echo "<font face='Comic Sans MS' size='+1'>";
								echo "No bids available so no automated results";
								echo "</font>";
							}
							echo "<br/><br/>";
						?>
					</div>
					<div id="sidebar" class="widget-area" role="complementary">
						<aside class="widget">
							<?php
								echo "<h3 class='widget-title'><a href='member.php'>Back</a></h3>";
							?>
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