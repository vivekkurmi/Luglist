<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>																	<!-- head starts here-->
	<title>LugList</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>


<body>
	<div id="top">	
	
	
													<!--Container for logo and seacrh bar-->
		<div id="head">
					<div id="logo">
						LugList
					</div>
			<div class="clear"></div>
		</div>
	
	</div>
	<div id="post_middle">
		
		
		
		<div id="menu">
					<div id="menu_inner">
						<a href="index.php"><div id="browse" class="menuicon"><span>Home</span>
						<br>Back to home page
						</div></a>
						<a href="browse.php"><div id="post" class="menuicon"><span>Browse</span>
						<br>Classified by category
						</div></a>
						<div class="clear"></div>
					</div>
		</div>
		<div id="content">
			<div id="ribbion">
				<div id="error">
						</div>
			</div>
					<div id="post_container">
							<div class="post">
								<?php
								require "init.php";
								$id = $_GET['id']; // I got this from the URL
								$res = mysqli_query($con,"Select * from post where post_id = ".$id);
								$row= mysqli_fetch_array($res);
								date_default_timezone_set('Asia/Kolkata');
								$unix=strtotime($row['time']."GMT");
								$tim=date("jS \of F Y",$unix);
								echo  '<span style="font-size:40px;color:black">'.$row['title'].'</span><p style="font-size:32px;color:0f0f0f">'.$row['description'].'</p>
										<p style="font-size:25px"><u>Contact details:</u><br><br>Contact no:'.$row['contact'].'<br>Email ID:'.$row['email'].'</p>
										<p style="font-size:18px">
										<u>posted on</u>:'.$tim.' at '.date('H:i:s', $unix).'&nbsp<u>under</u>:'.$row['category'].'</p>
										</div></a>';
								?>
						</div>
					<div class="clear"></div>
					</div>
		<div id="footer">
		&#169 Lug Labs 2013 
	
	
	
	</div>
		
	</div>
	



</body>
</html>

